package com.example.reserveat

import android.content.Intent
import androidx.appcompat.app.AppCompatActivity
import android.os.Bundle
import android.util.Log
import androidx.recyclerview.widget.LinearLayoutManager
import androidx.recyclerview.widget.RecyclerView
import com.example.reserveat.databinding.ActivityResMenuBinding
import org.json.JSONArray

class ResMenu : AppCompatActivity() {
    private lateinit var binding: ActivityResMenuBinding
    override fun onCreate(savedInstanceState: Bundle?) {
        super.onCreate(savedInstanceState)
        binding = ActivityResMenuBinding.inflate(layoutInflater)
        setContentView(binding.root)

        val userid = intent.getStringExtra("userid").toString()
        var usernam = intent.getStringExtra("username").toString()
        val email = intent.getStringExtra("email").toString()
        val status = intent.getStringExtra("status").toString()
        val name = intent.getStringExtra("name").toString()
        val id = intent.getStringExtra("id").toString()
        val resid = intent.getStringExtra("resid").toString()

        binding.recyclerview2.layoutManager = LinearLayoutManager(this)
        binding.txtresnamemenu.text = name

        Log.i("Working", resid)

        var itemlist = HttpRequests().restmenu(id)

        if(itemlist != "[{\"success\":\"0\",\"message\":\"Failed\"}]"){
            var ja = JSONArray(itemlist)
            var i =0;
            var cattegory = arrayOfNulls<String>(ja.length())
            var items = arrayOfNulls<String>(ja.length())
            var price = arrayOfNulls<String>(ja.length())
            while(i<ja.length()){
                var f = ja.getJSONObject(i)
                items[i] = f.getString("name")
                price[i] = f.getString("price")
                cattegory[i]=f.getString("category")
                i++
            }
            val adapter: resMenuAdapter = resMenuAdapter(items, price,cattegory)
            binding.recyclerview2.adapter = adapter
        }


        binding.btnreservreserve.setOnClickListener {
            val intent = Intent(this, tableselect::class.java)

            intent.putExtra("userid", userid)
            intent.putExtra("username", usernam)
            intent.putExtra("email", email)
            intent.putExtra("status", status)
            intent.putExtra("name", name)
            intent.putExtra("id", id)
            intent.putExtra("resid", resid)

            Log.i("Working", "Definiteley Worked")
            startActivity(intent)
        }

    }
}