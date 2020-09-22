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
 * Created by User on 12/1/2016.
 */
public class EventsListAdapter extends RecyclerView.Adapter<EventsListAdapter.MyViewHolder> {

    private List<EventsList> eventsLists;
    ImageLoader imageLoader;
    Context context;


    public class MyViewHolder extends RecyclerView.ViewHolder {
        public TextView etitle, edatetime,  ecaption;
        public ImageView ImgContainer;

        public MyViewHolder(View view) {
            super(view);
            etitle = (TextView) view.findViewById(R.id.textViewTitle);
            edatetime = (TextView) view.findViewById(R.id.textViewDateTime);
            ecaption = (TextView) view.findViewById(R.id.textViewCaption);
            ImgContainer = (ImageView) view.findViewById(R.id.imageView);


        }
    }


    public EventsListAdapter(Context context, List<EventsList> eventsLists) {
        this.eventsLists = eventsLists;
        imageLoader = new ImageLoader(context);
        this.context = context;
    }

    @Override
    public MyViewHolder onCreateViewHolder(ViewGroup parent, int viewType) {
        View itemView = LayoutInflater.from(parent.getContext())
                .inflate(R.layout.list_item_home, parent, false);

        return new MyViewHolder(itemView);
    }

    @Override
    public void onBindViewHolder(MyViewHolder holder, int position) {

        final EventsList homeList = eventsLists.get(position);
        holder.etitle.setText(homeList.getetitle());
        holder.edatetime.setText(homeList.getedateandtime());
        holder.ecaption.setText(homeList.getecaption());
        imageLoader.DisplayImage(homeList.geteimage_path(), holder.ImgContainer);

    }

    @Override
    public int getItemCount() {
        return eventsLists.size();
    }

}
