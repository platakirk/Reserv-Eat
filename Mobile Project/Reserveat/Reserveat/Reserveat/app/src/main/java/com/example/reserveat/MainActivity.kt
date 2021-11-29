package com.example.reserveat

import android.content.Intent
import android.net.Uri
import android.os.Build
import android.os.Bundle
import android.os.StrictMode
import android.util.Log
import android.widget.Toast
import androidx.appcompat.app.AppCompatActivity
import com.example.reserveat.databinding.ActivityMainBinding
import com.google.android.material.snackbar.Snackbar
import org.json.JSONObject


class MainActivity : AppCompatActivity() {
    private lateinit var binding: ActivityMainBinding
    private lateinit var user: String
    private lateinit var pass: String

    override fun onCreate(savedInstanceState: Bundle?) {
        super.onCreate(savedInstanceState)
        binding = ActivityMainBinding.inflate(layoutInflater)
        setContentView(binding.root)

        if (Build.VERSION.SDK_INT > 9) {
            val policy = StrictMode.ThreadPolicy.Builder().permitAll().build()
            StrictMode.setThreadPolicy(policy)
        }



        binding.btnsign.setOnClickListener {
            user = binding.edituser.text.toString()
            pass = binding.editpass.text.toString()
            val jo = JSONObject(HttpRequests().SignIn(user, pass))
            Log.i("Answer", jo.toString())
            if (jo.getString("Success") == "1") {

                if(jo.getString("type").toString() == "restaurant"){
                    Toast.makeText(
                            applicationContext,
                            "Account is only for restaurant users!",
                            Toast.LENGTH_LONG
                    ).show()
                } else {
                    if (jo.getString("verified").toString() == "0") {
                        Toast.makeText(
                                applicationContext,
                                "Account has not been verified!",
                                Toast.LENGTH_LONG
                        ).show()
                    }

                    val intent = Intent(this, LandingPage::class.java)
                    intent.putExtra("userid", jo.getString("id").toString())
                    intent.putExtra("username", jo.getString("username").toString())
                    intent.putExtra("email", jo.getString("cEmail").toString())
                    intent.putExtra("status", jo.getString("Success").toString())
                    intent.flags = Intent.FLAG_ACTIVITY_NEW_TASK
                    startActivity(intent)
                }



            } else {
                Snackbar.make(
                    binding.root,
                    "Username or Password does not exist.",
                    Snackbar.LENGTH_LONG
                ).show()
            }
        }

        binding.noAccount.setOnClickListener {
            var url = "https://isproj2b.benilde.edu.ph/ReservEat/signin.php?type=customer";
            var uri = Uri.parse(url);
            val intent = Intent(Intent.ACTION_VIEW, uri);
            // Verify that the intent will resolve to an activity
            if (intent.resolveActivity(getPackageManager()) != null) {
                // Here we use an intent without a Chooser unlike the next example
                startActivity(intent);
            }


        }
    }
}