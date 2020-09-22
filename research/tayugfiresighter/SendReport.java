package com.example.user.tayugfiresighter;

import android.app.ProgressDialog;
import android.content.Context;
import android.content.Intent;
import android.graphics.Bitmap;
import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.telephony.TelephonyManager;
import android.util.Base64;
import android.view.View;
import android.widget.Button;
import android.widget.EditText;
import android.widget.ImageView;
import android.widget.TextView;
import android.widget.Toast;

import com.android.volley.AuthFailureError;
import com.android.volley.Request;
import com.android.volley.RequestQueue;
import com.android.volley.Response;
import com.android.volley.VolleyError;
import com.android.volley.toolbox.StringRequest;
import com.android.volley.toolbox.Volley;
import com.kosalgeek.android.photoutil.CameraPhoto;
import com.kosalgeek.android.photoutil.ImageLoader;

import java.io.ByteArrayOutputStream;
import java.io.FileNotFoundException;
import java.io.IOException;
import java.util.Hashtable;
import java.util.Map;

public class SendReport extends AppCompatActivity {

    private String REPORT_URL=Config.URL +"/research/Admin/mobile/report_incident.php";
    private final String TAG = this.getClass().getName();
    EditText report, contact, fullname;

    ImageView camera, ivImage;
    Button sendreport;
    CameraPhoto cameraPhoto;
    Bitmap bitmap;
    final int CAMERA_REQUEST = 13323;
    double latitude=0.0, longitude=0.0;


    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_send_report);



        //gps tracker
        GPSTracker gps = new GPSTracker(SendReport.this);
        if(gps.canGetLocation){
            latitude=gps.getLatitude();
            longitude=gps.getLongitude();

        }else{
            gps.showSettingsAlert();
        }

        cameraPhoto = new CameraPhoto(getApplicationContext());

        contact = (EditText) findViewById(R.id.cn);
        TelephonyManager tManager = (TelephonyManager) getSystemService(Context.TELEPHONY_SERVICE);
        contact.setText(tManager.getLine1Number());

        fullname = (EditText) findViewById(R.id.fullname);
        report = (EditText) findViewById(R.id.txtreport);
        ivImage = (ImageView)findViewById(R.id.ivImage);
        camera = (ImageView)findViewById(R.id.camera);

        sendreport = (Button)findViewById(R.id.btnreport);


        camera.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {

                try {
                    startActivityForResult(cameraPhoto.takePhotoIntent(), CAMERA_REQUEST);
                    cameraPhoto.addToGallery();
                } catch (IOException e) {
                    Toast.makeText(getApplicationContext(),
                            "Something wrong while taking a picture", Toast.LENGTH_SHORT).show();
                }

            }
        });


        sendreport.setOnClickListener(new View.OnClickListener() {

            @Override
            public void onClick(View v) {

                uploadReport();

            }
        });
    }

    @Override
    protected void onResume(){
        super.onResume();
        //gps tracker
        GPSTracker gps = new GPSTracker(SendReport.this);
        if(gps.canGetLocation){
            latitude=gps.getLatitude();
            longitude=gps.getLongitude();

        }else{
            gps.showSettingsAlert();
        }
    }
    @Override
    protected void onActivityResult(int requestCode, int resultCode, Intent data) {
        if (resultCode == RESULT_OK) {
            if (requestCode == CAMERA_REQUEST){
                String photoPath = cameraPhoto.getPhotoPath();
                try {
                    bitmap = ImageLoader.init().from(photoPath).requestSize(256, 312).getBitmap();
                    ivImage.setImageBitmap(bitmap);
                }catch (FileNotFoundException e){
                    Toast.makeText(getApplicationContext(),
                            "Something wrong while loading the picture", Toast.LENGTH_SHORT).show();

                }

            }

        }
    }

    public String getStringImage(Bitmap bmp){
        ByteArrayOutputStream baos = new ByteArrayOutputStream();
        bmp.compress(Bitmap.CompressFormat.JPEG, 70, baos);
        byte[] imageBytes = baos.toByteArray();
        String encodedImage = Base64.encodeToString(imageBytes, Base64.DEFAULT);
        return encodedImage;
    }

    private void uploadReport(){
        final ProgressDialog ploading = ProgressDialog.show(this, null, "Sending Report...Please wait...", false, false);
        StringRequest stringRequest = new StringRequest(Request.Method.POST,REPORT_URL, new Response.Listener<String>() {
            @Override
            public void onResponse(String response) {
                ploading.dismiss();
                Toast.makeText(SendReport.this, response, Toast.LENGTH_SHORT).show();
                Toast.makeText(SendReport.this, String.valueOf(latitude)+","+String.valueOf(longitude), Toast.LENGTH_SHORT).show();
                Intent i = new Intent(SendReport.this, SendReport.class);
                startActivity(i);
                finish();
            }
        },
                new Response.ErrorListener(){
                    @Override
                    public void onErrorResponse(VolleyError volleyError){
                        ploading.dismiss();
                        Toast.makeText(SendReport.this, "Cannot connect to the server", Toast.LENGTH_SHORT).show();
                        Toast.makeText(SendReport.this, String.valueOf(latitude)+","+String.valueOf(longitude), Toast.LENGTH_SHORT).show();
                    }
                }){
            @Override
            protected Map<String,String> getParams() throws AuthFailureError {
                String image = getStringImage(bitmap);
                String info = report.getText().toString();
                String ffname = fullname.getText().toString();
                String contactno = contact.getText().toString();
                Map<String,String>params = new Hashtable<String,String>();
                params.put("image",image);
                params.put("contactno",contactno);
                params.put("ffname",ffname);
                params.put("info",info);
                params.put("lat",String.valueOf(latitude));
                params.put("lng",String.valueOf(longitude));

                return params;
            }
        };
        RequestQueue requestQueue  = Volley.newRequestQueue(this);

        requestQueue.add(stringRequest);
    }


}