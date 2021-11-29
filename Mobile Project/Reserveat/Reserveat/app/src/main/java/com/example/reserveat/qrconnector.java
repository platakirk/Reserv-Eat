package com.example.reserveat;

import android.os.AsyncTask;
import android.util.Log;

import java.io.BufferedReader;
import java.io.IOException;
import java.io.InputStreamReader;
import java.net.HttpURLConnection;
import java.net.MalformedURLException;
import java.net.URL;

public class qrconnector extends AsyncTask<String, Integer, String> {
    @Override
    protected String doInBackground(String... strings) {
        String qrurl = strings[0];
        String constrs = "https://isproj2b.benilde.edu.ph/ReservEat/welcome.php?rest";
        int equal = qrurl.indexOf("=");
        int equalid=equal+1;
        String concompare = qrurl.substring(0,equal);
        String id = qrurl.substring(equalid);
        Log.i("Data",id);

        if(concompare.equals(constrs)){
            String constr = "https://isproj2b.benilde.edu.ph/ReservEat/mobileResData.php?rest=";
            URL url = null;
            HttpURLConnection con = null;
            BufferedReader re = null;
            String line = "";

            String finalstr =constr + id;
            Log.i("Here",finalstr);


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
                    return "{'Success'='0'}";
                }
                return line;
            }

            try {
                re.close();
            } catch (IOException e) {
                e.printStackTrace();
            }

            con.disconnect();
        }



        return "{'Success'='0'}";
    }
}
