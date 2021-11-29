package com.example.reserveat

import android.content.Context
import android.content.Intent
import android.util.Log
import android.view.LayoutInflater
import android.view.View
import android.view.ViewGroup
import android.widget.TextView
import androidx.recyclerview.widget.RecyclerView

class resListAdapter (private val items: Array<String?>, private val items2:Array<String?>,
                      private val items3: Array<String?>, private val user: String, private val userid: String, private val context: Context): RecyclerView.Adapter<NewsViewHolder>(){
    override fun onCreateViewHolder(parent: ViewGroup, viewType: Int): NewsViewHolder {
        val view = LayoutInflater.from(parent.context).inflate(R.layout.reslistrow, parent, false)
        return NewsViewHolder(view)
    }

    override fun onBindViewHolder(holder: NewsViewHolder, position: Int) {
        val curname = items[position]
        val curloc = items2[position]
        val curid = items3[position]

        holder.name.text = curname
        holder.location.text = curloc
        holder.itemView.setOnClickListener {
            var intent = Intent(context, ResMenu::class.java)
            intent.putExtra("userid", userid)
            intent.putExtra("id", curid)
            intent.putExtra("name", curname)
            intent.putExtra("email", user)
            intent.putExtra("status", "1")

            intent.flags = Intent.FLAG_ACTIVITY_NEW_TASK
            context.startActivity(intent)
        }
    }

    override fun getItemCount(): Int {
        return items.size
    }

}

class NewsViewHolder(itemView: View): RecyclerView.ViewHolder(itemView){

    val name: TextView = itemView.findViewById(R.id.txtresname)
    val location: TextView = itemView.findViewById(R.id.txtresloc)



}