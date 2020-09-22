package com.example.user.tayugfiresighter;

/**
 * Created by User on 12/1/2016.
 */
public class EventsList {

    String etitle, edateandtime, ecaption, eimage_path;

    public EventsList(String etitle, String edateandtime, String ecaption, String eimage_path){
        this.etitle = etitle;
        this.edateandtime=edateandtime;
        this.ecaption = ecaption;
        this.eimage_path = eimage_path;


    }


    public String getetitle() {
        return etitle;
    }

    public void setetitle(String title) {
        this.etitle = title;
    }

    public String getecaption() {

        return ecaption;
    }

    public void setedateandtime(String dateandtime) {
        this.edateandtime = edateandtime;
    }

    public String getedateandtime() {
        return edateandtime;
    }

    public void setecaption(String ecaption) {
        this.ecaption = ecaption;
    }

    public String geteimage_path() {

        return eimage_path;
    }

    public void seteimage_path(String eimage_path) {
        this.eimage_path = eimage_path;
    }
}


