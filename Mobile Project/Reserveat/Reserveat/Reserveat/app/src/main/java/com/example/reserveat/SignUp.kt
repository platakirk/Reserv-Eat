package com.example.reserveat

import android.content.Intent
import androidx.appcompat.app.AppCompatActivity
import android.os.Bundle
import android.widget.Toast
import com.example.reserveat.databinding.ActivitySignUpBinding
import com.google.android.material.snackbar.Snackbar
import org.json.JSONObject

class SignUp : AppCompatActivity() {
    private lateinit var binding:ActivitySignUpBinding
    override fun onCreate(savedInstanceState: Bundle?) {
        super.onCreate(savedInstanceState)
        binding = ActivitySignUpBinding.inflate(layoutInflater)
        setContentView(binding.root)


        binding.btnsignup.setOnClickListener {
            var email = binding.editemail.text.toString()
            var password = binding.editpassword.text.toString()
            var username = binding.editusername.text.toString()
            var signupstatus = HttpRequests().SignUp(email, password, username)
            var jo = JSONObject(signupstatus)
            if (jo.getString("Success") == "1"){
                Toast.makeText(applicationContext, "Successfully Created Account, Please Verify on Email", Toast.LENGTH_LONG).show()
                val intent = Intent(this, MainActivity::class.java)
                intent.flags = Intent.FLAG_ACTIVITY_NEW_TASK
                startActivity(intent)
            }else{
                Snackbar.make(binding.root,"Email or Username already exists!",Snackbar.LENGTH_LONG).show()
            }
        }
    }
}