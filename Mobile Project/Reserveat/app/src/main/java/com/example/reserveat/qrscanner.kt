package com.example.reserveat

import android.content.Intent
import android.content.pm.PackageManager
import androidx.appcompat.app.AppCompatActivity
import android.os.Bundle
import android.util.Log
import android.widget.Toast
import androidx.core.app.ActivityCompat
import androidx.core.content.ContextCompat
import com.budiyev.android.codescanner.AutoFocusMode
import com.budiyev.android.codescanner.CodeScanner
import com.budiyev.android.codescanner.DecodeCallback
import com.budiyev.android.codescanner.ErrorCallback
import com.budiyev.android.codescanner.ScanMode
import com.example.reserveat.databinding.ActivityQrscannerBinding
import com.google.android.material.snackbar.Snackbar
import org.json.JSONArray
import org.json.JSONObject

private const val CAMERA_REQUEST_CODE = 101

class qrscanner : AppCompatActivity() {
    private lateinit var binding: ActivityQrscannerBinding
    private var cameraSource = null
    private var barccodeDetector = null
    private var surfaceView = null
    private lateinit var codeScanner: CodeScanner

    override fun onCreate(savedInstanceState: Bundle?) {
        super.onCreate(savedInstanceState)
        binding = ActivityQrscannerBinding.inflate(layoutInflater)
        setContentView(binding.root)

        val status = intent.getStringExtra("status").toString()
        val email = intent.getStringExtra("email").toString()
        val userid= intent.getStringExtra("userid").toString()

        setupPermission()
        codeScanner(email, userid)


    }

    private fun codeScanner(email: String, userid: String){
        codeScanner = CodeScanner(this, binding.scannerView)

        codeScanner.apply {
            camera = CodeScanner.CAMERA_BACK
            formats = CodeScanner.ALL_FORMATS

            autoFocusMode = AutoFocusMode.SAFE
            scanMode = ScanMode.CONTINUOUS
            isAutoFocusEnabled = true
            isFlashEnabled = false
            decodeCallback = DecodeCallback {
                runOnUiThread{
                    binding.textViewCamera.text = it.text
                    var k = it.text.toString()
                    Log.i("url:", k)
                    val q = HttpRequests().qrAnswer(k)
                    if (q != "{'Success'='0'}"){
                        val ja = JSONArray(q)
                        val jo = ja.getJSONObject(0)
                        var intent = Intent(applicationContext, ResMenu::class.java)
                        var idd = jo.getString("id")
                        var kk = jo.getString("restaurantName")
                        intent.putExtra("userid", userid)
                        intent.putExtra("id", idd)
                        intent.putExtra("name", kk)
                        intent.putExtra("email", email)
                        intent.putExtra("status", "1")
                        Snackbar.make(binding.root, "Success", Snackbar.LENGTH_LONG).show()
                        startActivity(intent)
                    }else{
                        Snackbar.make(binding.root, "An Error occured", Snackbar.LENGTH_LONG).show()
                    }
                }
            }
            errorCallback = ErrorCallback {
                runOnUiThread {
                    Log.e("Main", "Camera initializartion error: ${it.message}")
                }
            }
        }

        binding.scannerView.setOnClickListener{
            codeScanner.startPreview()
        }

    }

    override fun onResume() {
        super.onResume()
        codeScanner.startPreview()
    }

    override fun onPause() {
        codeScanner.releaseResources()
        super.onPause()
    }

    private fun setupPermission() {
        val permission = ContextCompat.checkSelfPermission(this, android.Manifest.permission.CAMERA)

        if (permission != PackageManager.PERMISSION_GRANTED){
            makeRequest()
        }
    }

    private fun makeRequest() {
        ActivityCompat.requestPermissions(this,
            arrayOf(android.Manifest.permission.CAMERA), CAMERA_REQUEST_CODE)
    }

    override fun onRequestPermissionsResult(
        requestCode: Int,
        permissions: Array<out String>,
        grantResults: IntArray
    ) {
        super.onRequestPermissionsResult(requestCode, permissions, grantResults)
        when (requestCode) {
            CAMERA_REQUEST_CODE -> {
                if (grantResults.isEmpty() || grantResults[0] != PackageManager.PERMISSION_GRANTED){
                    Toast.makeText(this, "You need camera permission to be able to use the QR Scanner", Toast.LENGTH_SHORT)
                }else{
                    //successful
                }
            }
        }
    }


}