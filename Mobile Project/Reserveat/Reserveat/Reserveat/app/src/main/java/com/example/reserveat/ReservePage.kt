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
        val usernam = intent.getStringExtra("username").toString()
        val email = intent.getStringExtra("email").toString()
        val name = intent.getStringExtra("name").toString()
        val id = intent.getStringExtra("id").toString()
        val userid = intent.getStringExtra("userid").toString()
        val tables = intent.getStringExtra("tables").toString()
        var seats = "4";


        var c = Calendar.getInstance()
        binding.editdate.updateDate(c.get(Calendar.YEAR), c.get(Calendar.MONTH), c.get(Calendar.DAY_OF_MONTH))
        var x = binding.spinner1
        var fff = binding.spinner2

        Log.i("ekkk", seats)

        if(seats.toString()==null){
            seats= "3"
        }

        if((seats.toString().toInt()<=0)||(seats.toString()=="")||(seats.toString()==null)){
            seats = "4"
        }

        Log.i("ekkk", seats)

        ArrayAdapter.createFromResource(
                this,
                R.array.hours,
                android.R.layout.simple_spinner_item
        ).also { adapter ->
            adapter.setDropDownViewResource(android.R.layout.simple_spinner_dropdown_item)
            x.adapter = adapter
        }
        Log.i("ekkk", "notoo")
        ArrayAdapter.createFromResource(
                this,
                R.array.ampm,
                android.R.layout.simple_spinner_item
        ).also { adapter ->
            adapter.setDropDownViewResource(android.R.layout.simple_spinner_dropdown_item)
            fff.adapter = adapter
        }

        Log.i("ekkk", "netotot")

        binding.btnreserveseat.setOnClickListener {
            var hors = 0;
            var y = binding.editdate

            if (fff.selectedItem.toString() == "PM"){
                hors = x.selectedItem.toString().toInt() + 12;
            }else{
                hors = x.selectedItem.toString().toInt()
            }



            var timechosen = hors.toString() + ":00:00"
            var datechosen =y.year.toString() + "-" + y.month.toString() + "-" + y.dayOfMonth
            var people = seats

            Log.i("kek", userid)
            Log.i("wek", datechosen)
            Log.i("hook", timechosen)
            Log.i("kelp", people)






            val jo = JSONObject(HttpRequests().ReserveSeats(userid, id, datechosen, timechosen, people))
            if (jo.getString("Success") == "1"){
                var intent = Intent(this, LandingPage::class.java)
                intent.putExtra("userid", userid)
                intent.putExtra("username", usernam)
                intent.putExtra("email", email)
                intent.putExtra("status", "1")
                intent.flags = Intent.FLAG_ACTIVITY_CLEAR_TOP
                Toast.makeText(applicationContext, "Reservation Successful", Toast.LENGTH_LONG).show()
                startActivity(intent)
            }else{
                Snackbar.make(binding.root, "Failed to Reserve", Snackbar.LENGTH_LONG).show()
            }

        }
    }
}