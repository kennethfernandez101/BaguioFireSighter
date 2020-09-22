package com.example.user.tayugfiresighter;

import android.content.Intent;
import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.view.View;
import android.widget.Button;
import android.widget.EditText;

import org.json.JSONObject;

public class Login extends AppCompatActivity {


    EditText uname, pword;

    Button login,createacc;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_login);

        login = (Button) findViewById(R.id.login);
        createacc = (Button) findViewById(R.id.createacc);


        uname = (EditText) findViewById(R.id.uname);
        pword = (EditText) findViewById(R.id.pword);

        login.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                Intent log = new Intent(Login.this, Navigation.class);
                startActivity(log);
            }
        });

        createacc.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                Intent cracc = new Intent(Login.this, CreateAccount.class);
                startActivity(cracc);
            }
        });

    }
   public void onLogin (View view){
        String username = uname.getText().toString();
        String password = pword.getText().toString();
        String type = "login";
       backgroundworker  backgroundworker = new backgroundworker(this);
       backgroundworker.execute(type, username, password);

    }


    }
