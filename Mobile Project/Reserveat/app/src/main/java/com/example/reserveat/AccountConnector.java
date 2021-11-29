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
import java.net.ProtocolException;
import java.net.URL;
import java.net.URLEncoder;

import javax.net.ssl.HttpsURLConnection;

public class AccountConnector extends AsyncTask<String, Integer, String> {
    @Override
    protected String doInBackground(String... strings) {
        String connstr2 = "https://isproj2b.benilde.edu.ph/ReservEat/mobileGetUser.php";
        URL url1 = null;
        StringBuilder data = new StringBuilder();
        int rsc = 0;

        try {
            data.append(URLEncoder.encode("user","UTF-8"));
            data.append("=");
            data.append(URLEncoder.encode(strings[0],"UTF-8"));
            data.append("&");
            data.append(URLEncoder.encode("status", "UTF-8"));
            data.append("=");
            data.append(URLEncoder.encode(strings[1], "UTF-8"));
        } catch (UnsupportedEncodingException e) {
            e.printStackTrace();
        }

        try {
            url1 = new URL(connstr2);
            Log.i("URL","WORKED");
            Log.i("URL",strings[0]);
        } catch (MalformedURLException e) {
            e.printStackTrace();
        }
        HttpsURLConnection con = null;
        try {
            con = (HttpsURLConnection) url1.openConnection();
            con.setReadTimeout(15000);
            con.setConnectTimeout(15000);
            con.setDoInput(true);
            con.setDoOutput(true);
            Log.i("Con","Opened");
        } catch (IOException e) {
            e.printStackTrace();
        }
        try {
            con.setRequestMethod("POST");
            Log.i("Method ","Set");
        } catch (ProtocolException e) {
            e.printStackTrace();
        }
        OutputStream out = null;
        try {
            out = new BufferedOutputStream(con.getOutputStream());
            BufferedWriter wr = new BufferedWriter(new OutputStreamWriter(out, "UTF-8"));
            wr.write(String.valueOf(data));
            wr.flush();
            wr.close();
            rsc = con.getResponseCode();
        } catch (IOException e) {
            e.printStackTrace();
        }

        BufferedReader in = null;
        try {
            in = new BufferedReader(new InputStreamReader(con.getInputStream()));
            Log.i("Buffer Reader","Opened");
        } catch (IOException e) {
            e.printStackTrace();
            Log.i("Buffer Reader","Failed");
        }
        String line = "";

        if(rsc == HttpURLConnection.HTTP_OK){
            while (true){
                try {
                    if (!((line = in.readLine())!= null)) break;
                } catch (IOException e) {
                    e.printStackTrace();
                }


                Log.i("Value", line);
                return line;
            }
        }

        try {
            in.close();
        } catch (IOException e) {
            e.printStackTrace();
        }
        con.disconnect();
        return "{'Success'='0'}";
    }
}
