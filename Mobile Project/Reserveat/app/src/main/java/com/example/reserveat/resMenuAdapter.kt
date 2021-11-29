package com.example.reserveat

import android.view.LayoutInflater
import android.view.View
import android.view.ViewGroup
import android.widget.TextView
import androidx.recyclerview.widget.RecyclerView

class resMenuAdapter (private val items: Array<String?>,
                     private val money: Array<String?>): RecyclerView.Adapter<MenusViewHolder>() {
    override fun onCreateViewHolder(parent: ViewGroup, viewType: Int): MenusViewHolder {
        val view = LayoutInflater.from(parent.context).inflate(R.layout.menu_item, parent, false)
        return MenusViewHolder(view)
    }

    override fun onBindViewHolder(holder: MenusViewHolder, position: Int) {
        val menuitems = items[position]
        val pricess = money[position]

        holder.titlee.text = menuitems
        holder.prices.text = pricess + "Php"
    }

    override fun getItemCount(): Int {
        return items.size
    }
}

class MenusViewHolder(itemView: View): RecyclerView.ViewHolder(itemView){
    val titlee: TextView = itemView.findViewById(R.id.txtitemname)
    val prices: TextView = itemView.findViewById(R.id.txtprice)
}