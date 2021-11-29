package com.example.reserveat

import android.os.Bundle
import android.util.Log
import androidx.appcompat.app.AppCompatActivity
import androidx.recyclerview.widget.LinearLayoutManager
import com.example.reserveat.databinding.ActivitySearchPageBinding
import com.google.android.material.snackbar.Snackbar
import org.json.JSONArray

class SearchPage : AppCompatActivity() {
    private lateinit var binding: ActivitySearchPageBinding

    override fun onCreate(savedInstanceState: Bundle?) {
        super.onCreate(savedInstanceState)
        binding = ActivitySearchPageBinding.inflate(layoutInflater)
        setContentView(binding.root)

        val status = intent.getStringExtra("status").toString()
        var usernam = intent.getStringExtra("username").toString()
        val email = intent.getStringExtra("email").toString()
        val userid= intent.getStringExtra("userid").toString()



        binding.editsearch.setOnEditorActionListener { v, actionId, event ->
            var name = binding.editsearch.text.toString()
            var reslist = HttpRequests().reslist(name)


            if (reslist != "[{\"success\":\"0\",\"message\":\"Failed\"}]"){
                binding.recyclerview1.layoutManager = LinearLayoutManager(this)
                var ja = JSONArray(reslist)
                var i =0;
                var k = 0;
                Log.i("Data", reslist)
                var items = arrayOfNulls<String>(ja.length())
                var items2 = arrayOfNulls<String>(ja.length())
                var items3 = arrayOfNulls<String>(ja.length())
                var items4 = arrayOfNulls<String>(ja.length())

                while (k<ja.length()){
                    var f = ja.getJSONObject(k)
                    items[k] = f.getString("restaurantName")

                    items2[k] = f.getString("address1") +
                            ", " + f.getString("barangay") +
                            ", " + f.getString("city") +
                            ", " + f.getString("province")

                    items3[k] = f.getString("id")
                    items4[k] = f.getString("restLoginId")
                    k++
                }
                val adapter: resListAdapter = resListAdapter(
                        items,
                        items2,
                        items3,
                        items4,
                        email,
                        userid,
                        usernam,
                        applicationContext
                )
                adapter.notifyDataSetChanged()
                binding.recyclerview1.adapter = adapter
            }else{
                Snackbar.make(binding.root, "could not find you restaurant", Snackbar.LENGTH_LONG).show()
            }


            false
        }



    }
}