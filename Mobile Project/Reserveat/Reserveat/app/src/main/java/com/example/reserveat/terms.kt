package com.example.reserveat

import androidx.appcompat.app.AppCompatActivity
import android.os.Bundle
import com.example.reserveat.databinding.ActivityTermsBinding

class terms : AppCompatActivity() {
    private lateinit var binding: ActivityTermsBinding
    override fun onCreate(savedInstanceState: Bundle?) {
        super.onCreate(savedInstanceState)
        binding = ActivityTermsBinding.inflate(layoutInflater)
        setContentView(binding.root)
    }
}