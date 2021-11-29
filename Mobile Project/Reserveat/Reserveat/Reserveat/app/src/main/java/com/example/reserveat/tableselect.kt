package com.example.reserveat

import android.content.Intent
import androidx.appcompat.app.AppCompatActivity
import android.os.Bundle
import android.util.Log
import androidx.recyclerview.widget.LinearLayoutManager
import com.example.reserveat.databinding.ActivityTableselectBinding
import org.json.JSONArray

class tableselect : AppCompatActivity() {
    private lateinit var binding: ActivityTableselectBinding

    override fun onCreate(savedInstanceState: Bundle?) {
        super.onCreate(savedInstanceState)
        binding = ActivityTableselectBinding.inflate(layoutInflater)
        setContentView(binding.root)

        val status = intent.getStringExtra("status").toString()
        var usernam = intent.getStringExtra("username").toString()
        val email = intent.getStringExtra("email").toString()
        val name = intent.getStringExtra("name").toString()
        val id = intent.getStringExtra("id").toString()
        val resid = intent.getStringExtra("resid").toString()
        val userid = intent.getStringExtra("userid").toString()
        Log.i("wrokingsssss","zytablelist")
        Log.i("wrokingsssss",id)
        Log.i("wrokingsssss",resid)
        binding.recyclerViewtable.layoutManager = LinearLayoutManager(this)

        var tablelist = HttpRequests().tableList(resid)
        Log.i("wrokingsssss",tablelist)


        if(tablelist != "[{\"success\":\"0\",\"message\":\"Failed\"}]"){
            Log.i("wrokingsssss","puta oo")
            var ja = JSONArray(tablelist)
            var i =0;
            var idd = arrayOfNulls<String>(ja.length())
            var namee = arrayOfNulls<String>(ja.length())
            var seats = arrayOfNulls<String>(ja.length())
            while(i<ja.length()){
                var f = ja.getJSONObject(i)
                idd[i] = f.getString("id")
                namee[i] = f.getString("name")
                seats[i]=f.getString("seats")
                i++
            }


            val adapter: tableListAdapter = tableListAdapter(idd, namee, seats, userid, usernam, email,id, name, applicationContext)
            binding.recyclerViewtable.adapter = adapter
        }




    }
}