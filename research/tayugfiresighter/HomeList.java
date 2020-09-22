package com.example.user.tayugfiresighter;

/**
 * Created by User on 11/13/2016.
 */
public class HomeList {
    String title, dateandtime, caption,image_path;

    public HomeList(String title, String dateandtime, String caption, String image_path){
        this.title = title;
        this.dateandtime=dateandtime;
        this.caption = caption;
        this.image_path = image_path;


    }


    public String getTitle() {
        return title;
    }

    public void setTitle(String title) {
        this.title = title;
    }

    public String getCaption() {

        return caption;
    }

    public void setDateandtime(String dateandtime) {
        this.dateandtime = dateandtime;
    }

    public String getDateandtime() {
        return dateandtime;
    }

    public void setCaption(String caption) {
        this.caption = caption;
    }

    public String getImage_path() {

        return image_path;
    }

    public void setImage_path(String image_path) {
        this.image_path = image_path;
    }
}
