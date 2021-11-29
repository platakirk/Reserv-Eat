package com.example.reserveat;

import android.os.AsyncTask;

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

public class resmenuConnector extends AsyncTask<String, Integer, String> {
    @Override
    protected String doInBackground(String... strings) {
        String constr = "https://isproj2b.benilde.edu.ph/ReservEat/mobileRestaurantMenu.php";
        URL url = null;
        HttpURLConnection con = null;
        BufferedReader re = null;
        String line = "";

        String finalstr =constr + "?restaurant=" + strings[0];


        try {
            url = new URL(finalstr);
        } catch (MalformedURLException e) {
            e.printStackTrace();
        }

        try {
            con = (HttpURLConnection) url.openConnection();
            con.setRequestMethod("GET");
        } catch (IOException e) {
            e.printStackTrace();
        }

        try {
            re = new BufferedReader(new InputStreamReader(con.getInputStream()));
        } catch (IOException e) {
            e.printStackTrace();
        }

        while (true){
            try {
                if(!((line = re.readLine()) != null)){
                    break;
                }
            } catch (IOException e) {
                e.printStackTrace();
            }
            return line;
        }

        try {
            re.close();
        } catch (IOException e) {
            e.printStackTrace();
        }

        con.disconnect();
        return "{\"Success\"=\"0\"}";
    }
}
