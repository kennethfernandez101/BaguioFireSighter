package com.example.user.tayugfiresighter;

import android.app.AlertDialog;
import android.content.Context;
import android.os.AsyncTask;
import android.view.View;

import java.io.BufferedReader;
import java.io.BufferedWriter;
import java.io.IOException;
import java.io.InputStream;
import java.io.InputStreamReader;
import java.io.OutputStream;
import java.io.OutputStreamWriter;
import java.net.HttpURLConnection;
import java.net.MalformedURLException;
import java.net.URL;
import java.net.URLEncoder;

/**
 * Created by User on 11/23/2016.
 */
public class backgroundworker extends AsyncTask <String, Void, String> {
    Context contex;
    AlertDialog alertDialog;
    backgroundworker (Context ctx){
        contex = ctx;
    }

    @Override
    protected String doInBackground(String... params) {
        String type = params[0];
        String LOGIN_url ="http://192.168.8.101/research/Admin/mobile/login.php";
        if (type.equals("login")){
            try {
                String username = params[1];
                String password = params[2];
                URL url = new URL(LOGIN_url);
                HttpURLConnection httpURLConnection = (HttpURLConnection)url.openConnection();
                httpURLConnection.setRequestMethod("POST");
                httpURLConnection.setDoOutput(true);
                httpURLConnection.setDoInput(true);
                OutputStream outputStream = httpURLConnection.getOutputStream();
                BufferedWriter bufferedWriter = new BufferedWriter(new OutputStreamWriter(outputStream, "UTF-8"));
                String post_data = URLEncoder.encode("username","UTF-8")+ "+"+URLEncoder.encode(username, "UTF-8")+"&"
                        + URLEncoder.encode("password","UTF-8")+ "+"+URLEncoder.encode(password, "UTF-8");
                bufferedWriter.write(post_data);
                bufferedWriter.flush();
                bufferedWriter.close();
                outputStream.close();
                InputStream inputStream = httpURLConnection.getInputStream();
                BufferedReader bufferedReader = new BufferedReader(new InputStreamReader(inputStream,"iso-8859-1"));
                String result = "";
                String line = "";
                while ((line = bufferedReader.readLine())!= null){
                    result += line;
                }
                bufferedReader.close();
                inputStream.close();
                httpURLConnection.disconnect();
                return result;
            } catch (MalformedURLException e) {
                e.printStackTrace();
            } catch (IOException e) {
                e.printStackTrace();
            }
        }
        return null;
    }

    @Override
    protected void onPreExecute() {
       alertDialog = new AlertDialog.Builder(contex).create();
        alertDialog.setTitle(" Login Status");
    }

    @Override
    protected void onPostExecute(String result) {
       alertDialog.setMessage(result);
        alertDialog.show();
    }

    @Override
    protected void onProgressUpdate(Void... values) {
        super.onProgressUpdate(values);
    }
}
