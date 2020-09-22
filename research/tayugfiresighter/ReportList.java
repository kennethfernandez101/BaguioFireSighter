package com.example.user.tayugfiresighter;

/**
 * Created by Admin on 17/12/2016.
 */

public class ReportList {

String contno, reportdesc, datereport, timereport, llat, llong;

    public ReportList (String contno, String reportdesc, String datereport, String timereport, String llat, String llong)
    {
        this.contno = contno;
        this.reportdesc = reportdesc;
        this.datereport = datereport;
        this.timereport = timereport;
        this.llat = llat;
        this.llong = llong;
    }

    public String getContno() {
        return contno;
    }

    public void setContno(String contno) {
        this.contno = contno;
    }

    public String getReportdesc() {
        return reportdesc;
    }

    public void setReportdesc(String reportdesc) {
        this.reportdesc = reportdesc;
    }

    public String getDatereport() {
        return datereport;
    }

    public void setDatereport(String datereport) {
        this.datereport = datereport;
    }

    public String getTimereport() {
        return timereport;
    }

    public void setTimereport(String timereport) {
        this.timereport = timereport;
    }

    public String getLlat() {
        return llat;
    }

    public void setLlat(String llat) {
        this.llat = llat;
    }

    public String getLlong() {
        return llong;
    }

    public void setLlong(String llong) {
        this.llong = llong;
    }
}
