package com.example.reserveat

import android.content.Intent
import android.os.Build
import androidx.appcompat.app.AppCompatActivity
import android.os.Bundle
import android.util.Log
import android.widget.ArrayAdapter
import android.widget.Toast
import androidx.annotation.RequiresApi
import com.example.reserveat.databinding.ActivityReservePageBinding
import com.google.android.material.snackbar.Snackbar
import org.json.JSONObject
import java.time.LocalDate
import java.util.*

class ReservePage : AppCompatActivity() {
    private lateinit var binding: ActivityReservePageBinding
    @RequiresApi(Build.VERSION_CODES.O)

    override fun onCreate(savedInstanceState: Bundle?) {
        super.onCreate(savedInstanceState)
        binding = ActivityReservePageBinding.inflate(layoutInflater)
        setContentView(binding.root)
        var f = intent.getStringExtra("name")
        binding.txtresnamerespage.text = f

        val status = intent.getStringExtra("status").toString()
        val email = intent.getStringExtra("email").toString()
        val name = intent.getStringExtra("name").toString()
        val id = intent.getStringExtra("id").toString()
        val userid = intent.getStringExtra("userid").toString()
        var c = Calendar.getInstance()
        binding.editdate.updateDate(c.get(Calendar.YEAR), c.get(Calendar.MONTH), c.get(Calendar.DAY_OF_MONTH))




        binding.btnreserveseat.setOnClickListener {
            var x = binding.editspinner
            var y = binding.editdate
            var timechosen = x.hour.toString() + ":" + x.minute.toString()
            var datechosen =y.year.toString() + "-" + y.month.toString() + "-" + y.dayOfMonth
            var people = binding.editPax.text.toString()
            val jo = JSONObject(HttpRequests().ReserveSeats(userid, id, datechosen, timechosen, people))
            if (jo.getString("Success") == "1"){
                var intent = Intent(this, ResMenu::class.java)
                intent.putExtra("userid", userid)
                intent.putExtra("id", id)
                intent.putExtra("name", name)
                intent.putExtra("email", email)
                intent.putExtra("status", "1")
                intent.flags = Intent.FLAG_ACTIVITY_NEW_TASK
                Toast.makeText(applicationContext, "Reservation Successful", Toast.LENGTH_LONG).show()
                startActivity(intent)
            }else{
                Snackbar.make(binding.root, "Failed to Reserve", Snackbar.LENGTH_LONG).show()
            }

        }
    }
}