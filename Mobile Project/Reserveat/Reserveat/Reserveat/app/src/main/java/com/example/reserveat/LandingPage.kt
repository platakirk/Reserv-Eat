package com.example.reserveat

import android.content.Intent
import androidx.appcompat.app.AppCompatActivity
import android.os.Bundle
import android.util.Log
import com.example.reserveat.databinding.ActivityLandingPageBinding

class LandingPage : AppCompatActivity() {
    private lateinit var binding: ActivityLandingPageBinding

    override fun onCreate(savedInstanceState: Bundle?) {
        super.onCreate(savedInstanceState)
        binding = ActivityLandingPageBinding.inflate(layoutInflater)
        setContentView(binding.root)

        var userid = intent.getStringExtra("userid").toString()
        var usernam = intent.getStringExtra("username").toString()
        var email = intent.getStringExtra("email").toString()
        var status = intent.getStringExtra("status").toString()

        if(status != "1"){
            val intent = Intent(this, MainActivity::class.java)
            startActivityForResult(intent, 1)
        }

        binding.btnsearch.setOnClickListener{
            val intent = Intent(this, SearchPage::class.java)
            intent.putExtra("userid", userid)
            intent.putExtra("username", usernam)
            intent.putExtra("email", email)
            intent.putExtra("status", status)
            startActivity(intent)
        }

        binding.btnreserve.setOnClickListener{
            val intent = Intent(this, ReservationsList::class.java)
            intent.putExtra("userid", userid)
            intent.putExtra("username", usernam)
            intent.putExtra("email", email)
            intent.putExtra("status", status)
            startActivity(intent)
        }

        binding.btnaccount.setOnClickListener{
            val intent = Intent(this, Account::class.java)
            intent.putExtra("userid", userid)
            intent.putExtra("username", usernam)
            intent.putExtra("email", email)
            intent.putExtra("status", status)
            startActivity(intent)
        }

        binding.btnsetting.setOnClickListener {
            val intent = Intent(this, SettingPage::class.java)
            intent.putExtra("userid", userid)
            intent.putExtra("username", usernam)
            intent.putExtra("email", email)
            intent.putExtra("status", status)
            startActivity(intent)
        }

        binding.btnqr.setOnClickListener {
            val intent = Intent(this, qrscanner::class.java)
            intent.putExtra("userid", userid)
            intent.putExtra("username", usernam)
            intent.putExtra("email", email)
            intent.putExtra("status", status)
            startActivity(intent)
        }


    }
}