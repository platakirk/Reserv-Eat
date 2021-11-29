package com.example.reserveat

import android.os.Binder
import androidx.appcompat.app.AppCompatActivity
import android.os.Bundle
import android.util.Log
import androidx.recyclerview.widget.LinearLayoutManager
import com.example.reserveat.databinding.ActivityReservationsListBinding
import com.google.android.material.snackbar.Snackbar
import org.json.JSONArray

class ReservationsList : AppCompatActivity() {
    private lateinit var binding: ActivityReservationsListBinding
    override fun onCreate(savedInstanceState: Bundle?) {
        super.onCreate(savedInstanceState)
        binding = ActivityReservationsListBinding.inflate(layoutInflater)
        setContentView(binding.root)

        val userid = intent.getStringExtra("userid").toString()
        val email = intent.getStringExtra("email").toString()
        val status = intent.getStringExtra("status").toString()

        var pastlist = HttpRequests().pastreserve(userid)
        var curlist = HttpRequests().curreserve(userid)

        if (curlist != "[{\"success\":\"0\",\"message\":\"Failed\"}]"){

            binding.recyclercur.layoutManager = LinearLayoutManager(this)

            var ja = JSONArray(curlist)
            var i =0;
            var k = 0;
            Log.i("Data", curlist)
            Log.i("items", ja.length().toString())
            var items = arrayOfNulls<String>(ja.length())
            var items2 = arrayOfNulls<String>(ja.length())
            var items3 = arrayOfNulls<String>(ja.length())
            var items4 = arrayOfNulls<String>(ja.length())
            var items5 = arrayOfNulls<String>(ja.length())


            while (k<ja.length()){
                var f = ja.getJSONObject(k)
                items[k] = f.getString("restaurantName")

                items2[k] = f.getString("date")

                items3[k] = f.getString("time")
                items4[k] = f.getString("seats")
                items5[k] = f.getString("id")
                k++
            }
            val adapter: CurResAdapter = CurResAdapter(
                    items,
                    items2,
                    items3,
                    items4,
                    items5,
                    email,
                    userid,
                    status,
                    applicationContext
            )
            binding.recyclercur.adapter = adapter
        }else{
            Snackbar.make(binding.root, "No Reservations", Snackbar.LENGTH_LONG).show()
        }


        if (pastlist != "[{\"success\":\"0\",\"message\":\"Failed\"}]"){
            binding.recyclerpast.layoutManager = LinearLayoutManager(this)
            var ja = JSONArray(pastlist)
            var i =0;
            var k = 0;
            Log.i("Data", pastlist)
            var items = arrayOfNulls<String>(ja.length())
            var items2 = arrayOfNulls<String>(ja.length())
            var items3 = arrayOfNulls<String>(ja.length())
            var items4 = arrayOfNulls<String>(ja.length())

            while (k<ja.length()){
                var f = ja.getJSONObject(k)
                items[k] = f.getString("restaurantName")

                items2[k] = f.getString("date")

                items3[k] = f.getString("time")
                items4[k] = f.getString("seats")
                k++
            }

            val adapter: pastresAdapter = pastresAdapter(
                    items,
                    items2,
                    items3,
                    items4
            )
            adapter.notifyDataSetChanged()
            binding.recyclerpast.adapter = adapter
        }else{
            Snackbar.make(binding.root, "No Reservations", Snackbar.LENGTH_LONG).show()
        }
    }
}