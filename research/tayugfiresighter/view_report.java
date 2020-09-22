package com.example.user.tayugfiresighter;
import android.app.Notification;
import android.app.NotificationManager;
import android.app.PendingIntent;
import android.app.ProgressDialog;
import android.content.Intent;
import android.os.AsyncTask;
import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.support.v7.widget.LinearLayoutManager;
import android.support.v7.widget.RecyclerView;
import android.util.Log;
import android.view.GestureDetector;
import android.view.Menu;
import android.view.MotionEvent;
import android.view.View;
import android.widget.Button;
import android.widget.ListView;
import android.widget.Toast;

import org.json.JSONArray;
import org.json.JSONException;
import org.json.JSONObject;

import java.util.ArrayList;
import java.util.HashMap;
import java.util.List;

public class view_report extends AppCompatActivity {



    JSONObject myJSON;

    private static final String TAG_RESULTS="result";
    private static final String TAG_EVENTID = "event_id";
    private static final String TAG_REPORTDESC = "repdescription";
    private static final String TAG_CONTNO = "contactno";
    private static final String TAG_FIREDATE= "firedate";
    private static final String TAG_FIRETIME = "firetime";
    private static final String TAG_LLAT = "lat";
    private static final String TAG_LLONG= "lng";
    private static final String EIMAGE_PATH="http://firesighter.esy.es/research/Admin/";
    private static final String url_address="http://firesighter.esy.es/research/Admin/mobile/mobilemap.php";
    static ReportListAdapter listOfReportAdapter;
    static final List<ReportList> listOfReport= new ArrayList<>();
    ProgressDialog pDialog;
    JSONfunctions jsonParser=new JSONfunctions();

    JSONArray view_reports = null;


    ArrayList<HashMap<String, String>> reportList;

    ListView list;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_view_report);





        list = (ListView) findViewById(R.id.listView);
        reportList = new ArrayList<HashMap<String, String>>();

        RecyclerView recyclerView;
        recyclerView = (RecyclerView) findViewById(R.id.recyclerView);
        listOfReportAdapter = new ReportListAdapter(view_report.this, listOfReport);
        recyclerView.setHasFixedSize(true);
        RecyclerView.LayoutManager mLayoutManager = new LinearLayoutManager(view_report.this);
        recyclerView.setLayoutManager(mLayoutManager);
        recyclerView.setAdapter(listOfReportAdapter);
        final GestureDetector mGestureDetector = new GestureDetector(view_report.this, new GestureDetector.SimpleOnGestureListener() {

            @Override
            public boolean onSingleTapUp(MotionEvent e) {
                return true;
            }

        });


        recyclerView.addOnItemTouchListener(new RecyclerView.SimpleOnItemTouchListener() {
            @Override
            public boolean onInterceptTouchEvent(RecyclerView recyclerView, MotionEvent motionEvent) {
                View child = recyclerView.findChildViewUnder(motionEvent.getX(), motionEvent.getY());


                if (child != null && mGestureDetector.onTouchEvent(motionEvent)) {

                    final ReportList rList = listOfReport.get(recyclerView.getChildLayoutPosition(child));
                    Intent map = new Intent(getApplicationContext(), ReportMap.class);
                    map.putExtra(TAG_CONTNO, rList.getContno());
                    map.putExtra(TAG_REPORTDESC, rList.getReportdesc());
                    map.putExtra(TAG_FIREDATE, rList.getDatereport());
                    map.putExtra(TAG_FIRETIME, rList.getTimereport());
                    map.putExtra(TAG_LLAT, rList.getLlat());
                    map.putExtra(TAG_LLONG, rList.getLlong());
                    startActivity(map);
                    Toast.makeText(getApplicationContext(), "GETTING POSITION", Toast.LENGTH_LONG).show();


                    return true;

                }

                return false;
            }

            @Override
            public void onTouchEvent(RecyclerView recyclerView, MotionEvent motionEvent) {

            }


        });


        new getData().execute();
    }

    @Override
    public boolean onCreateOptionsMenu(Menu menu) {



        return true;
    }


    protected void showList() {
        try {
            view_reports = myJSON.getJSONArray(TAG_RESULTS);

            for (int i = 0; i < view_reports.length(); i++) {

                JSONObject c = view_reports.getJSONObject(i);
                String contno = c.getString(TAG_CONTNO);
                String reportdesc = c.getString(TAG_REPORTDESC);
                String fdate = c.getString(TAG_FIREDATE);
                String ftime = c.getString(TAG_FIRETIME);
                String llat = c.getString(TAG_LLAT);
                String llong = c.getString(TAG_LLONG);


                ReportList reportLists = new ReportList(contno, reportdesc, fdate, ftime, llat, llong);
                listOfReport.add(reportLists);

            }


        } catch (JSONException e) {
            e.printStackTrace();
        }

    }

    class getData extends AsyncTask<String, String, JSONObject> {


        @Override
        protected void onPreExecute() {
            pDialog = new ProgressDialog(view_report.this);
            pDialog.setMessage("Loading");
            pDialog.setCancelable(true);
            pDialog.show();
        }

        @Override
        protected JSONObject doInBackground(String... args) {

            try {

                HashMap<String, String> params = new HashMap<>();

                params.put("", "");
                Log.d("request", "starting");

                JSONObject json = jsonParser.makeHttpRequest(url_address, "POST", params);
                if (json != null) {
                    Log.d("JSON result", json.toString());

                    return json;
                }

            } catch (Exception e) {

                e.printStackTrace();
            }

            return null;
        }

        protected void onPostExecute(JSONObject json) {

            if (pDialog != null && pDialog.isShowing()) {
                pDialog.dismiss();
            }

            if (json != null) {
                myJSON = json;
                listOfReport.clear();
                showList();
                listOfReportAdapter.notifyDataSetChanged();
            }


        }

    }
}
