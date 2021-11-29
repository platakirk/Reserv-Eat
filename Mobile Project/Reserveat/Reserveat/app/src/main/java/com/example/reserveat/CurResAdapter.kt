package com.example.reserveat

import android.content.Context
import android.content.Intent
import android.view.LayoutInflater
import android.view.View
import android.view.ViewGroup
import android.widget.Button
import android.widget.TextView
import android.widget.Toast
import androidx.recyclerview.widget.RecyclerView
import com.google.android.material.snackbar.Snackbar

class CurResAdapter (private val name: Array<String?>,
                     private val date: Array<String?>,
                     private val time: Array<String?>,
                     private val seats: Array<String?>,
                     private val id: Array<String?>,
                     private val email: String,
                     private val uid: String,
                     private val status: String,
                     private val context: Context): RecyclerView.Adapter<HelloViewHolder>() {
    override fun onCreateViewHolder(parent: ViewGroup, viewType: Int): HelloViewHolder {
        val view = LayoutInflater.from(parent.context).inflate(R.layout.curitem, parent, false)
        return HelloViewHolder(view)
    }

    override fun onBindViewHolder(holder: HelloViewHolder, position: Int) {
        val namen = name[position]
        val daten = date[position]
        val timen = time[position]
        val peoplen = seats[position]
        val idd = id[position]

        holder.name1.text = namen
        holder.date1.text = daten
        holder.time1.text = timen
        holder.people1.text = peoplen
        holder.btncancel.setOnClickListener {
            var k = HttpRequests().cancelCancel(idd)
            if(k != "{'Success' = '0'}"){
                var intent = Intent(context, ReservationsList::class.java)
                intent.putExtra("userid", uid)
                intent.putExtra("email", email)
                intent.putExtra("status", "1")
                intent.flags = Intent.FLAG_ACTIVITY_NEW_TASK
                context.startActivity(intent)
            }else{
                Toast.makeText(context, "Oops! Something went wrong", Toast.LENGTH_LONG).show()
            }

        }


    }

    override fun getItemCount(): Int {
        return name.size
    }
}

class HelloViewHolder(itemView: View): RecyclerView.ViewHolder(itemView){
    val name1: TextView = itemView.findViewById(R.id.txttrescur)
    val date1: TextView = itemView.findViewById(R.id.txtdatecur)
    val time1: TextView = itemView.findViewById(R.id.txttimecur)
    val people1: TextView = itemView.findViewById(R.id.txtnocur)
    val btncancel: Button = itemView.findViewById(R.id.btncncl)
}