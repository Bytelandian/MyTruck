package com.CSL458.mytruckclient;

import java.util.ArrayList;
import org.json.JSONArray;
import org.json.JSONException;
import org.json.JSONObject;
import android.app.ListActivity;
import android.content.Intent;
import android.net.Uri;
import android.os.Bundle;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.ListView;
import android.widget.TextView;

// ListActivity To Display the Results of The Query

public class MyListActivity extends ListActivity {
	
	TextView tv;
	JSONArray jArray;
	ArrayList<Details> data;
	Details[] dataArray;
	
	
    @Override
    public void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        
        // Setting The Layout, Layout's header 
        
        setContentView(R.layout.list_iew);
        ListView l = getListView();
        LayoutInflater inflater = getLayoutInflater();
        ViewGroup header = (ViewGroup)inflater.inflate(R.layout.header, l, false);
        l.addHeaderView(header, null, false);
        
        
        data=new ArrayList<Details>();
        
        // Retrieval of the Server's Response Which is a JSON
        
        Intent intent=getIntent();
        String response=intent.getStringExtra("json");
        
        // Parsing The JSON and Saving the Results in a ArrayList
        
        try {
            	 jArray = new JSONArray(response);
            	 for(int i=0;i<jArray.length();i++){
            		 JSONObject object = jArray.getJSONObject(i);
            		 String phone=object.getString("Phone Number");
            		 String name=object.getString("Name");
            		 String time=object.getString("Time Left in Departure");
            		 Details d=new Details(name,phone,time);
            		 data.add(d);
            	 }            	 
        }
        catch (JSONException e) {
		// TODO Auto-generated catch block
		e.printStackTrace();
        }
        
        // Setting The ListView's Adapter with the Parsed Data
        
        dataArray= (Details[])data.toArray(new Details[ data.size() ]);
        setListAdapter(new MyAdapter(this,R.layout.list_item ,dataArray));
    }
    
    // Call the Phone Number When That Person's Details Are Clicked
    
    @Override
	protected void onListItemClick(ListView l, View v, int position, long id) {
 
		//get selected items
    	Details d=(Details) getListAdapter().getItem(position-1);
		String phoneNumber = d.phoneNumber;
		Intent callIntent = new Intent(Intent.ACTION_CALL);
	    callIntent.setData(Uri.parse("tel:+91"+phoneNumber));
	    startActivity(callIntent);

    } 
    
}
