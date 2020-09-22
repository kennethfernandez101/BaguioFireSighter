package com.example.user.tayugfiresighter;

import android.content.Context;
import android.support.v7.widget.RecyclerView;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.ImageView;
import android.widget.TextView;

import java.util.List;

/**
 * Created by Admin on 17/12/2016.
 */

public class ReportListAdapter extends  RecyclerView.Adapter<ReportListAdapter.MyViewHolder> {


    private List<ReportList> reportLists;
    ImageLoader imageLoader;
    Context context;


    public class MyViewHolder extends RecyclerView.ViewHolder {
        public TextView  reportdesc,  firedate, firetime;

        public MyViewHolder(View view) {
            super(view);
            reportdesc = (TextView) view.findViewById(R.id.textReportDesc);
            firedate = (TextView) view.findViewById(R.id.textFireDate);
            firetime = (TextView) view.findViewById(R.id.textFireTime);
        }
    }


    public ReportListAdapter(Context context, List<ReportList> reportLists) {
        this.reportLists = reportLists;
        imageLoader = new ImageLoader(context);
        this.context = context;
    }

    @Override
    public MyViewHolder onCreateViewHolder(ViewGroup parent, int viewType) {
        View itemView = LayoutInflater.from(parent.getContext())
                .inflate(R.layout.list_report, parent, false);

        return new MyViewHolder(itemView);
    }

    @Override
    public void onBindViewHolder(ReportListAdapter.MyViewHolder holder, int position) {

        final ReportList reportList = reportLists.get(position);
        holder.reportdesc.setText(reportList.getReportdesc());
        holder.firedate.setText(reportList.getDatereport());
        holder.firetime.setText(reportList.getTimereport());

    }

    @Override
    public int getItemCount() {
        return reportLists.size();
    }


}
