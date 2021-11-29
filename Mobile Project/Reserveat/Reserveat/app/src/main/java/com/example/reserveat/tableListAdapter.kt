package com.example.reserveat

import android.content.Context
import android.content.Intent
import android.view.LayoutInflater
import android.view.View
import android.view.ViewGroup
import android.widget.Button
import android.widget.CheckBox
import android.widget.TextView
import androidx.recyclerview.widget.RecyclerView


class tableListAdapter (private val items: Array<String?>,
                        private val items2:Array<String?>,
                        private val items3: Array<String?>,
                        private val userid: String,
                        private val usernam: String,
                        private val email: String,
                        private val id: String,
                        private val name: String,
                        private val context: Context): RecyclerView.Adapter<ListsViewHolder>(){

    private var setas = 0
    private lateinit var halperList: MutableList<String>
    private var stronk = ""

    override fun onCreateViewHolder(parent: ViewGroup, viewType: Int): ListsViewHolder {
        val view = LayoutInflater.from(parent.context).inflate(R.layout.tablelist, parent, false)
        return ListsViewHolder(view)
    }

    override fun onBindViewHolder(holder: ListsViewHolder, position: Int) {
        val idd = items[position]
        val namee = items2[position]
        val seatss = items3[position]


        holder.choock.text = namee
        holder.seats.text = seatss
        if(holder.choock.isChecked()){
            if (seatss != null) {
                setas = setas + seatss.toInt()
                if(idd != null){
                    halperList.add(idd)
                    stronk = stronk + idd + ","
                }
            }
        }
        if(!holder.choock.isChecked() && setas > 0){
            if (seatss != null) {
                if((setas - seatss.toInt())<0){
                    setas = 0
                }else{
                    setas = setas - seatss.toInt()
                    halperList.remove(idd)
                    if (idd != null) {
                        var help = stronk.indexOf(idd+",")
                        var front = stronk.substring(0,help)
                        var back = stronk.substring(help+1)
                        stronk = front + back
                    }
                }
            }
        }

        holder.booton.setOnClickListener {
            var intent = Intent(context, ReservePage::class.java)
            intent.putExtra("userid", userid)
            intent.putExtra("username", usernam)
            intent.putExtra("email", email)
            intent.putExtra("status", "1")
            intent.putExtra("id", id)
            intent.putExtra("name", name)
            intent.putExtra("tables", stronk)
            intent.putExtra("seats", setas)

            intent.flags = Intent.FLAG_ACTIVITY_NEW_TASK
            context.startActivity(intent)
        }

    }

    override fun getItemCount(): Int {
        return items.size
    }
}


class ListsViewHolder(itemView: View): RecyclerView.ViewHolder(itemView){
    val choock: CheckBox = itemView.findViewById(R.id.cbx)
    val seats: TextView = itemView.findViewById(R.id.txtavails)
    val booton: Button = itemView.findViewById(R.id.btnctable)
}