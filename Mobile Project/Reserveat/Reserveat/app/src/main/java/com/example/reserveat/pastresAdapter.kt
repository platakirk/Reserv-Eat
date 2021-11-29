package com.example.reserveat

import android.view.LayoutInflater
import android.view.View
import android.view.ViewGroup
import android.widget.TextView
import androidx.recyclerview.widget.RecyclerView

class pastresAdapter (private val name: Array<String?>,
                      private val date: Array<String?>,
                      private val time: Array<String?>,
                      private val seats: Array<String?>): RecyclerView.Adapter<PastViewHolder>() {
    override fun onCreateViewHolder(parent: ViewGroup, viewType: Int): PastViewHolder {
        val view = LayoutInflater.from(parent.context).inflate(R.layout.pastitem, parent, false)
        return PastViewHolder(view)
    }

    override fun onBindViewHolder(holder: PastViewHolder, position: Int) {
        val namen = name[position]
        val daten = date[position]
        val timen = time[position]
        val peoplen = seats[position]

        holder.name1.text = namen
        holder.date1.text = daten
        holder.time1.text = timen
        holder.people1.text = peoplen

    }

    override fun getItemCount(): Int {
        return name.size
    }
}

class PastViewHolder(itemView: View): RecyclerView.ViewHolder(itemView){
    val name1: TextView = itemView.findViewById(R.id.txtres)
    val date1: TextView = itemView.findViewById(R.id.txtdate)
    val time1: TextView = itemView.findViewById(R.id.txttime)
    val people1: TextView = itemView.findViewById(R.id.txtpeople)
}