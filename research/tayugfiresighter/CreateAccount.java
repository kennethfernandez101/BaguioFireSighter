package com.example.user.tayugfiresighter;

import android.app.ProgressDialog;
import android.content.Intent;
import android.os.StrictMode;
import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.view.View;
import android.widget.ArrayAdapter;
import android.widget.Button;
import android.widget.EditText;
import android.widget.Spinner;
import android.widget.Toast;

import com.android.volley.AuthFailureError;
import com.android.volley.Request;
import com.android.volley.RequestQueue;
import com.android.volley.Response;
import com.android.volley.VolleyError;
import com.android.volley.toolbox.StringRequest;
import com.android.volley.toolbox.Volley;

import java.util.Hashtable;
import java.util.Map;

public class CreateAccount extends AppCompatActivity {

    private String REPORT_URL = Config.URL + "/research/Admin/mobile/jsonquery.php";

    EditText fname, lname, mname, street, houseno, uname, pword;
    Button createacc;
    Spinner spinner;
    ArrayAdapter<CharSequence> adapter;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);

        StrictMode.ThreadPolicy policy = new StrictMode.ThreadPolicy.Builder().permitAll().build();
        StrictMode.setThreadPolicy(policy);

        setContentView(R.layout.activity_create_account);

        fname = (EditText) findViewById(R.id.txtfn);
        lname = (EditText) findViewById(R.id.txtln);
        mname = (EditText) findViewById(R.id.txtmn);
        street = (EditText) findViewById(R.id.txtstrt);
        houseno = (EditText) findViewById(R.id.txthn);
        uname = (EditText) findViewById(R.id.txtun);
        pword = (EditText) findViewById(R.id.txtpw);

        spinner = (Spinner) findViewById(R.id.spinner);

        adapter = ArrayAdapter.createFromResource(this, R.array.barangay_names, android.R.layout.simple_spinner_item);
        adapter.setDropDownViewResource(android.R.layout.simple_spinner_item);
        spinner.setAdapter(adapter);

        createacc = (Button) findViewById(R.id.btnsubmit);

        createacc.setOnClickListener(new View.OnClickListener() {

            @Override
            public void onClick(View v) {

                uploadAcc();


            }
        });
    }

    private void uploadAcc(){
        final ProgressDialog ploading = ProgressDialog.show(this, null, "Creating an Account...Please wait...", false, false);
        StringRequest stringRequest = new StringRequest(Request.Method.POST,REPORT_URL, new Response.Listener<String>() {
            @Override
            public void onResponse(String response) {
                ploading.dismiss();
                Toast.makeText(CreateAccount.this, response, Toast.LENGTH_SHORT).show();
                Intent i = new Intent(CreateAccount.this, CreateAccount.class);
                startActivity(i);
                finish();
            }
        },
                new Response.ErrorListener(){
                    @Override
                    public void onErrorResponse(VolleyError volleyError){
                        ploading.dismiss();
                        Toast.makeText(CreateAccount.this, "Cannot connect to the server", Toast.LENGTH_SHORT).show();
                    }
                }){
            @Override
            protected Map<String,String> getParams() throws AuthFailureError {

                String firstname = fname.getText().toString();
                String middlename =  mname.getText().toString();
                String lastname = lname.getText().toString();
                String barangay = spinner.getSelectedItem().toString();
                String strt = street.getText().toString();
                String house_no =  houseno.getText().toString();
                String username =  uname.getText().toString();
                String password = pword.getText().toString();

                Map<String,String>params = new Hashtable<String,String>();
                params.put("firstname",firstname);
                params.put("middlename",middlename);
                params.put("lastname",lastname);
                params.put("barangay",barangay);
                params.put("strt",strt);
                params.put("house_no",house_no);
                params.put("username",username);
                params.put("password",password);


                return params;
            }
        };
        RequestQueue requestQueue  = Volley.newRequestQueue(this);

        requestQueue.add(stringRequest);
    }


}

