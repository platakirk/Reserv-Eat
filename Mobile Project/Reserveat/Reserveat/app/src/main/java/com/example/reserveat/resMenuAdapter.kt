package com.example.reserveat

import android.view.LayoutInflater
import android.view.View
import android.view.ViewGroup
import android.widget.TextView
import androidx.core.view.isInvisible
import androidx.core.view.isVisible
import androidx.recyclerview.widget.RecyclerView

class resMenuAdapter (private val items: Array<String?>,
                     private val money: Array<String?>, private val catt: Array<String?>): RecyclerView.Adapter<MenusViewHolder>() {
    private var strongg:String = ""

    override fun onCreateViewHolder(parent: ViewGroup, viewType: Int): MenusViewHolder {
        val view = LayoutInflater.from(parent.context).inflate(R.layout.menu_item, parent, false)
        return MenusViewHolder(view)
    }

    override fun onBindViewHolder(holder: MenusViewHolder, position: Int) {
        val menuitems = items[position]
        val pricess = money[position]
        val cattegg = catt[position]
        if(position == 0){
            if (cattegg != null) {
                strongg = cattegg
                holder.cattegory.text = cattegg
            }
        }else{
            if(strongg==cattegg){
                holder.cattegory.text = ""
            }else{
                if (cattegg != null) {
                    strongg = cattegg
                }
                holder.cattegory.text=cattegg
            }
        }


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
    val cattegory: TextView = itemView.findViewById(R.id.txtcateg)
}