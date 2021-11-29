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

        val status = intent.getStringExtra("status").toString()
        val email = intent.getStringExtra("email").toString()
        val name = intent.getStringExtra("name").toString()
        val id = intent.getStringExtra("id").toString()
        val userid = intent.getStringExtra("userid").toString()

        binding.recyclerview2.layoutManager = LinearLayoutManager(this)
        binding.txtresnamemenu.text = name

        var itemlist = HttpRequests().restmenu(id)

        if(itemlist != "[{\"success\":\"0\",\"message\":\"Failed\"}]"){
            var ja = JSONArray(itemlist)
            var i =0;
            var items = arrayOfNulls<String>(ja.length())
            var price = arrayOfNulls<String>(ja.length())
            while(i<ja.length()){
                var f = ja.getJSONObject(i)
                items[i] = f.getString("menuName")
                price[i] = f.getString("menuPrice")
                i++
            }
            val adapter: resMenuAdapter = resMenuAdapter(items, price)
            binding.recyclerview2.adapter = adapter
        }


        binding.btnreservreserve.setOnClickListener {
            val intent = Intent(this, ReservePage::class.java)
            intent.putExtra("email", email)
            intent.putExtra("name", name)
            intent.putExtra("id", id)
            intent.putExtra("status", status)
            intent.putExtra("userid", userid)
            Log.i("Working", "Definiteley Worked")
            startActivity(intent)
        }

    }
}