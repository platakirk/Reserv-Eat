package com.example.reserveat

import android.content.Intent
import androidx.appcompat.app.AppCompatActivity
import android.os.Bundle
import com.example.reserveat.databinding.ActivitySettingPageBinding

class SettingPage : AppCompatActivity() {
    private lateinit var binding:ActivitySettingPageBinding
    override fun onCreate(savedInstanceState: Bundle?) {
        super.onCreate(savedInstanceState)
        binding = ActivitySettingPageBinding.inflate(layoutInflater)
        setContentView(binding.root)

        val status = intent.getStringExtra("status").toString()
        val email = intent.getStringExtra("email").toString()
        val userid= intent.getStringExtra("userid").toString()

        binding.txtterms.setOnClickListener{
            val intent = Intent(this, terms::class.java)
            intent.putExtra("userid", userid)
            intent.putExtra("email", email)
            intent.putExtra("status", status)
            startActivity(intent)
        }
    }
}