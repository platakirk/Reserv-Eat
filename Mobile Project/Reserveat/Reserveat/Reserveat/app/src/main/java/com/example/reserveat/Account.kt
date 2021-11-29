package com.example.reserveat

import androidx.appcompat.app.AppCompatActivity
import android.os.Bundle
import com.example.reserveat.databinding.ActivityAccountBinding
import org.json.JSONObject
import java.lang.StringBuilder

class Account : AppCompatActivity() {
    private lateinit var binding: ActivityAccountBinding
    private var k = false
    override fun onCreate(savedInstanceState: Bundle?) {
        super.onCreate(savedInstanceState)
        binding = ActivityAccountBinding.inflate(layoutInflater)
        setContentView(binding.root)

        var userid = intent.getStringExtra("userid").toString()
        var usernam = intent.getStringExtra("username").toString()
        var email = intent.getStringExtra("email").toString()
        var status = intent.getStringExtra("status").toString()

        if(!k){
            var f = HttpRequests().profiledata(email, status)

            var jo = JSONObject(f)


            binding.txtacccname.text = jo.getString("username")
            binding.txtEmail.text = jo.getString("cEmail")
            k=true
        }


    }
}