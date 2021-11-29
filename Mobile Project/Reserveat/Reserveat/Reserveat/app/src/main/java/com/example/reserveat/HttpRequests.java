package com.example.reserveat;

import android.util.Log;

import java.util.concurrent.ExecutionException;

public class HttpRequests {
    public String SignIn(String user, String pass) throws ExecutionException, InterruptedException{
        LogInConnector log = new LogInConnector();
        String answer = log.execute(user, pass).get();
        return answer;
    }

    public String reslist(String data) throws  ExecutionException, InterruptedException{
        ResListConnector con = new ResListConnector();
        String a = con.execute(data).get();
        return a;
    }

    public String restmenu (String Data) throws ExecutionException, InterruptedException{
        resmenuConnector con = new resmenuConnector();
        String a = con.execute(Data).get();
        return a;
    }

    public String profiledata(String e, String s) throws ExecutionException, InterruptedException{
        AccountConnector con = new AccountConnector();
        String a = con.execute(e, s).get();
        return a;
    }

    public String ReserveSeats(String email, String id, String date, String time, String people) throws ExecutionException, InterruptedException{
        AddReservation con = new AddReservation();
        String a = con.execute(id, email, date, time, people).get();
        return a;
    }

    public String SignUp(String email, String password, String username) throws ExecutionException, InterruptedException{
        SignUpConnector con = new SignUpConnector();
        String a= con.execute(username,password,email).get();
        return a;
    }

    public String pastreserve(String id) throws ExecutionException, InterruptedException{
        PastConnector con = new PastConnector();
        String a = con.execute(id).get();
        return a;
    }

    public String curreserve(String id) throws ExecutionException, InterruptedException{
        CurConnectod con = new CurConnectod();
        String a = con.execute(id).get();
        return a;
    }
    public String qrAnswer(String urll) throws ExecutionException, InterruptedException{
        qrconnector con = new qrconnector();
        String a = con.execute(urll).get();
        return a;
    }
    public String cancelCancel(String id) throws ExecutionException, InterruptedException{
        ResereCancel con = new ResereCancel();
        String a = con.execute(id).get();
        return a;
    }
    public String tableList(String id) throws ExecutionException, InterruptedException{
        tableconnector con = new tableconnector();
        String a = con.execute(id).get();
        return a;
    }
    public String tablereservv(String tables, String id, String resId) throws  ExecutionException, InterruptedException{
        String a = "";
        return a;
    }
}
