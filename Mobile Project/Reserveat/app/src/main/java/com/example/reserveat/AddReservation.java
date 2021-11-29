package com.example.reserveat;

import android.os.AsyncTask;
import android.util.Log;

import java.io.BufferedOutputStream;
import java.io.BufferedReader;
import java.io.BufferedWriter;
import java.io.IOException;
import java.io.InputStreamReader;
import java.io.OutputStream;
import java.io.OutputStreamWriter;
import java.io.UnsupportedEncodingException;
import java.net.HttpURLConnection;
import java.net.MalformedURLException;
import java.net.URL;
import java.net.URLEncoder;

public class AddReservation extends AsyncTask<String, Integer, String> {
    @Override
    protected String doInBackground(String... strings) {
        String constr = "https://isproj2b.benilde.edu.ph/ReservEat/mobilereservenew.php";
        URL url = null;
        StringBuilder postdata = new StringBuilder();
        int rsc = 0;
        HttpURLConnection con = null;
        OutputStream out = null;
        BufferedReader re = null;
        String line = "";
        Log.i("Date: ", strings[2]);
        Log.i("Time: ", strings[3]);

        try {
            postdata.append(URLEncoder.encode("userid","UTF-8"));
            postdata.append("=");
            postdata.append(URLEncoder.encode(strings[1],"UTF-8"));
            postdata.append("&");
            postdata.append(URLEncoder.encode("resid", "UTF-8"));
            postdata.append("=");
            postdata.append(URLEncoder.encode(strings[0], "UTF-8"));
            postdata.append("&");
            postdata.append(URLEncoder.encode("date", "UTF-8"));
            postdata.append("=");
            postdata.append(URLEncoder.encode(strings[2], "UTF-8"));
            postdata.append("&");
            postdata.append(URLEncoder.encode("time", "UTF-8"));
            postdata.append("=");
            postdata.append(URLEncoder.encode(strings[3], "UTF-8"));
            postdata.append("&");
            postdata.append(URLEncoder.encode("people", "UTF-8"));
            postdata.append("=");
            postdata.append(URLEncoder.encode(strings[4], "UTF-8"));
            Log.i("con", postdata.toString());
        } catch (UnsupportedEncodingException e) {
            e.printStackTrace();
        }

        try {
            url = new URL(constr);
        } catch (MalformedURLException e) {
            e.printStackTrace();
        }

        try {
            con = (HttpURLConnection) url.openConnection();
            con.setReadTimeout(15000);
            con.setConnectTimeout(15000);
            con.setRequestMethod("POST");
            con.setDoInput(true);
            con.setDoOutput(true);
            Log.i("con", "opened");
        } catch (IOException e) {
            e.printStackTrace();
        }

        try {
            out = new BufferedOutputStream(con.getOutputStream());
            BufferedWriter wr = new BufferedWriter(new OutputStreamWriter(out, "UTF-8"));
            wr.write(String.valueOf(postdata));
            wr.flush();
            wr.close();
            Log.i("write", "writen");
            rsc = con.getResponseCode();
        } catch (IOException e) {
            e.printStackTrace();
        }

        try {
            re = new BufferedReader(new InputStreamReader(con.getInputStream()));
            Log.i("read", "read");
        } catch (IOException e) {
            e.printStackTrace();
        }

        if(rsc == HttpURLConnection.HTTP_OK){
            while (true){
                try {
                    if(!((line = re.readLine()) != null)){
                        Log.i("data", line);
                        break;
                    }
                } catch (IOException e) {
                    e.printStackTrace();
                }
                return line;
            }
        }

        try {
            re.close();
        } catch (IOException e) {
            e.printStackTrace();
        }

        con.disconnect();
        return "{'Success' = '0'}";
    }
}
