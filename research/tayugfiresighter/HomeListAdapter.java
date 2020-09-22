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
 * Created by User on 11/13/2016.
 */
public class HomeListAdapter extends RecyclerView.Adapter<HomeListAdapter.MyViewHolder> {

    private List<HomeList> homeLists;
    ImageLoader imageLoader;
    Context context;


    public class MyViewHolder extends RecyclerView.ViewHolder {
        public TextView  title, datetime,  caption;
        public ImageView ImgContainer;

        public MyViewHolder(View view) {
            super(view);
            title = (TextView) view.findViewById(R.id.textViewTitle);
            datetime = (TextView) view.findViewById(R.id.textViewDateTime);
            caption = (TextView) view.findViewById(R.id.textViewCaption);
            ImgContainer = (ImageView) view.findViewById(R.id.imageView);


        }
    }


    public HomeListAdapter(Context context, List<HomeList> homeLists) {
        this.homeLists = homeLists;
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

        final HomeList homeList = homeLists.get(position);
        holder.title.setText(homeList.getTitle());
        holder.datetime.setText(homeList.getDateandtime());
        holder.caption.setText(homeList.getCaption());
        imageLoader.DisplayImage(homeList.getImage_path(), holder.ImgContainer);

    }

    @Override
    public int getItemCount() {
        return homeLists.size();
    }
}
