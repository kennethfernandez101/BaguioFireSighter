package com.example.user.tayugfiresighter;

import android.app.Notification;
import android.app.NotificationManager;
import android.app.PendingIntent;
import android.content.Intent;
import android.graphics.Color;
import android.support.v4.app.FragmentActivity;
import android.os.Bundle;
import android.view.View;
import android.widget.Button;

import com.google.android.gms.maps.CameraUpdateFactory;
import com.google.android.gms.maps.GoogleMap;
import com.google.android.gms.maps.OnMapReadyCallback;
import com.google.android.gms.maps.SupportMapFragment;
import com.google.android.gms.maps.model.LatLng;
import com.google.android.gms.maps.model.Marker;
import com.google.android.gms.maps.model.MarkerOptions;
import com.google.android.gms.maps.model.PolygonOptions;

public class ReportMap extends FragmentActivity implements OnMapReadyCallback {

    private GoogleMap mMap;
    GPSTracker tracker;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_report_map);

        // Obtain the SupportMapFragment and get notified when the map is ready to be used.
        SupportMapFragment mapFragment = (SupportMapFragment) getSupportFragmentManager()
                .findFragmentById(R.id.map);
        mapFragment.getMapAsync(this);
    }


    /**
     * Manipulates the map once available.
     * This callback is triggered when the map is ready to be used.
     * This is where we can add markers or lines, add listeners or move the camera. In this case,
     * we just add a marker near Sydney, Australia.
     * If Google Play services is not installed on the device, the user will be prompted to install
     * it inside the SupportMapFragment. This method will only be triggered once the user has
     * installed Google Play services and returned to the app.
     */
    @Override
    public void onMapReady(GoogleMap googleMap) {
        mMap = googleMap;
        Bundle extras = getIntent().getExtras();
        String contactno = extras.getString("contactno");
        String repdesc = extras.getString("repdescription");
        String ffdate = extras.getString("firedate");
        String fftime = extras.getString("firetime");
        String loclat = extras.getString("lat");
        String loclong = extras.getString("lng");
        double latl = Double.parseDouble(loclat);
        double lngg = Double.parseDouble(loclong);

        // Add a marker for the Grave
        LatLng sydney = new LatLng(latl, lngg);
        Marker syd = mMap.addMarker(new MarkerOptions()
                .position(sydney)
                .title("Contact Number: "+contactno+"Report Description: "+repdesc)
                .snippet("Fire Date: "+ffdate+" Fire Time: "+fftime));
        syd.showInfoWindow();
        mMap.moveCamera(CameraUpdateFactory.newLatLng(sydney));
        // Add a marker in Sydney and move the camera

        mMap.setMapType(GoogleMap.MAP_TYPE_HYBRID);


        //Marker for the User
        tracker = new GPSTracker(ReportMap.this);
        double lat=tracker.getLatitude();
        double lng=tracker.getLongitude();
        LatLng user = new LatLng(lat, lng);
        Marker us= mMap.addMarker(new MarkerOptions()
                .position(user)
                .title("This is My Location")
                .snippet("Lat: "+lat+" Lng: "+lng));
        us.showInfoWindow();


      /*Intent intent = new
                Intent(Intent.ACTION_VIEW, Uri.parse("http://maps.google.com/maps?" +
                "saddr="+ lat + "," + lng + "&daddrm=16.041712, 120.586126" +"&daddr=" + latl + "," +
                lngg ));
        intent.setClassName("com.google.android.apps.maps","com.google.android.maps.MapsActivity");
        startActivity(intent);*/

        // Move the camera instantly to Sydney with a zoom of 15.
        mMap.moveCamera(CameraUpdateFactory.newLatLngZoom(sydney, 20));

// Zoom in, animating the camera.
        mMap.animateCamera(CameraUpdateFactory.zoomIn());

// Zoom out to zoom level 12, animating with a duration of 2 seconds.
        mMap.animateCamera(CameraUpdateFactory.zoomTo(11), 2000, null);
    }
}
