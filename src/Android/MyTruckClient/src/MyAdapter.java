package com.CSL458.mytruckclient;

import android.content.Context;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.ArrayAdapter;
import android.widget.TextView;

// Custom ArrayAdapter to Implement Custom ListView 

public class MyAdapter extends ArrayAdapter<Details>{

    Context context; 
    int layoutResourceId;    
    Details[] data = null;
    
    public MyAdapter(Context context, int layoutResourceId, Details[] data) {
        super(context, layoutResourceId, data);
        this.layoutResourceId = layoutResourceId;
        this.context = context;
        this.data = data;
    }
    
    // Overriding the getView Method To Properly Initialize Custom ListView Item

    @Override
    public View getView(int position, View convertView, ViewGroup parent) {
    	
    	LayoutInflater inflater = (LayoutInflater) context.getSystemService(Context.LAYOUT_INFLATER_SERVICE);
    	View rowView = inflater.inflate(R.layout.list_item, parent, false);
    	TextView t1 = (TextView) rowView.findViewById(R.id.name);
    	TextView t2 = (TextView) rowView.findViewById(R.id.time);
    	TextView t3 = (TextView) rowView.findViewById(R.id.mobile);
    	int a=Integer.parseInt(data[position].time);
    	
    	String s=" Minutes";
    	if(a>=60){
    		a=a/60;
    		s=" Hours";
    	}	
    	else if(a>=45)
    		a=45;
    	else if(a>=30)
    		a=30;
    	else a=15;
    	
    		
    	
    	t1.setText("Name : "+data[position].name);
    	t2.setText("Available for "+Integer.toString(a)+ s);
    	t3.setText("Call : "+data[position].phoneNumber);    	
    	return rowView;
    	
    	}

}