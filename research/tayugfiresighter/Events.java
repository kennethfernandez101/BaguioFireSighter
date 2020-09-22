package com.example.user.tayugfiresighter;

import android.app.ProgressDialog;
import android.os.AsyncTask;
import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.support.v7.widget.LinearLayoutManager;
import android.support.v7.widget.RecyclerView;
import android.util.Log;
import android.view.GestureDetector;
import android.view.MotionEvent;
import android.view.View;
import android.widget.ListView;
import android.widget.Toast;

import org.json.JSONArray;
import org.json.JSONException;
import org.json.JSONObject;

import java.util.ArrayList;
import java.util.HashMap;
import java.util.List;

public class Events extends AppCompatActivity {
    JSONObject myJSON;

    private static final String TAG_ERESULTS="result";
    private static final String TAG_EVENTID = "event_id";
    private static final String TAG_ETITLE = "etitle";
    private static final String TAG_EDATETIME = "edateandtime";
    private static final String TAG_ECAPTION = "ecaption";
    private static final String TAG_EIMGPATH = "eimage_path";
    private static final String EIMAGE_PATH="http://firesighter.esy.es/research/Admin/";
    private static final String url_address="http://firesighter.esy.es/research/Admin/mobile/events_json.php";
    static EventsListAdapter listOfHomeAdapter;
    static final List<EventsList> listOfHome = new ArrayList<>();
    ProgressDialog pDialog;
    JSONfunctions jsonParser=new JSONfunctions();

    JSONArray news_events = null;

    ArrayList<HashMap<String, String>> newsList;

    ListView list;
    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_events);

        //gps tracker
        GPSTracker gps = new GPSTracker(Events.this);
        if(gps.canGetLocation){
            gps.getLocation();

        }else{
            gps.showSettingsAlert();
        }

        list = (ListView) findViewById(R.id.listView);
        newsList = new ArrayList<HashMap<String,String>>();

        RecyclerView recyclerView;
        recyclerView = (RecyclerView) findViewById(R.id.recyclerView);
        listOfHomeAdapter = new EventsListAdapter(Events.this, listOfHome);
        recyclerView.setHasFixedSize(true);
        RecyclerView.LayoutManager mLayoutManager = new LinearLayoutManager(Events.this);
        recyclerView.setLayoutManager(mLayoutManager);
        recyclerView.setAdapter(listOfHomeAdapter);
        final GestureDetector mGestureDetector = new GestureDetector(Events.this, new GestureDetector.SimpleOnGestureListener() {

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

                    final EventsList eventList = listOfHome.get(recyclerView.getChildLayoutPosition(child));
                    Toast.makeText(getApplicationContext(), eventList.geteimage_path(), Toast.LENGTH_LONG).show();
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
    protected void showList(){
        try {
            news_events  = myJSON.getJSONArray(TAG_ERESULTS);

            for(int i=0;i<news_events.length();i++){

                JSONObject c = news_events.getJSONObject(i);
                String etitle = c.getString(TAG_ETITLE);
                String edateandtime = c.getString(TAG_EDATETIME);
                String ecaption = c.getString(TAG_ECAPTION);
                String img_url = c.getString(TAG_EIMGPATH);

               /* HashMap<String,String> persons = new HashMap<String,String>();

                persons.put(TAG_THREAD_NO,thread_no);
                persons.put(TAG_THREAD, thread);
                persons.put(TAG_TITLE, title);
                persons.put(TAG_CONTENT, content);

                newsList.add(persons);
                */
                EventsList homeList = new EventsList(etitle, edateandtime, ecaption,EIMAGE_PATH+img_url );
                listOfHome.add(homeList);
            }

           /* ListAdapter adapter = new SimpleAdapter(
                    home.this, newsList, R.layout.list_item,
                    new String[]{TAG_THREAD, TAG_TITLE, TAG_CONTENT},
                    new int[]{R.id.textView1, R.id.textView2, R.id.textView3}
            );

            list.setAdapter(adapter);
*/
        } catch (JSONException e) {
            e.printStackTrace();
        }

    }

    class getData extends AsyncTask<String, String, JSONObject> {


        @Override
        protected void onPreExecute() {
            pDialog= new ProgressDialog(Events.this);
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

                JSONObject json = jsonParser.makeHttpRequest( url_address, "POST", params);
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
                myJSON=json;
                listOfHome.clear();
                showList();
                listOfHomeAdapter.notifyDataSetChanged();
            }


        }

    }


}