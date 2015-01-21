
package com.CSL458.MyTruck;
import java.io.IOException;
import java.util.ArrayList;
import java.util.List;
import java.util.Locale;

import org.apache.http.NameValuePair;
import org.apache.http.client.HttpClient;
import org.apache.http.client.entity.UrlEncodedFormEntity;
import org.apache.http.client.methods.HttpPost;
import org.apache.http.impl.client.DefaultHttpClient;
import org.apache.http.message.BasicNameValuePair;
import com.CSL458.MyTruck.MyGPS;
import com.CSL458.MyTruck.MainActivity;
import com.CSL458.MyTruck.R;
import android.app.Activity;
import android.app.AlertDialog;
import android.app.ProgressDialog;
import android.content.Context;
import android.content.DialogInterface;
import android.content.SharedPreferences;
import android.location.Address;
import android.location.Geocoder;
import android.os.Bundle;
import android.view.LayoutInflater;
import android.view.Menu;
import android.view.MenuItem;
import android.view.View;
import android.view.View.OnClickListener;
import android.widget.Button;
import android.widget.EditText;
import android.widget.LinearLayout;
import android.widget.TextView;
import android.widget.Toast;
 
public class MainActivity extends Activity {
	
	// Variables Used
	static SharedPreferences prefs = null;
    Button btnShowLocation,b,b2;
    EditText et1,et2;
    TextView tv;
    HttpPost httppost;
    StringBuffer buffer;
    HttpClient httpclient;
    List<NameValuePair> nameValuePairs;
    MyGPS gps;
    double latitude;
	double longitude;
	static String phoneNumber=null;
    Geocoder geocoder;
    String city;
    static String name=null;
    List<Address> addresses;
    
    // CHANGE SERVER'S ADDRESS HERE
    

    String register="http://10.1.9.117/CSL458/truckregister.php";
    String delete="http://10.1.9.117/CSL458/deletetruck.php";

    
    @Override
    public void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        
        //Setting The Layout and getting the reference
        setContentView(R.layout.activity_main); 
        b = (Button)findViewById(R.id.Button01);
        b2 = (Button)findViewById(R.id.Button02);
        et1= (EditText)findViewById(R.id.EditText01);
        et2= (EditText)findViewById(R.id.EditText02);
        tv= (TextView)findViewById(R.id.tv);        
        prefs = getSharedPreferences("com.CSL458.MyTruck", MODE_PRIVATE);
        geocoder=new Geocoder(this, Locale.getDefault());

        
        if (prefs.getBoolean("firstrun", true)) {				//If First launch get the users credentials
        	setCredentials(this,true);
        	prefs.edit().putBoolean("firstrun", false).commit();
        }
        else {													// Else Retrieve them . 
        	  phoneNumber = prefs.getString("Phone Number", "Default");
        	  name=prefs.getString("Name", "Default");  	
        }
  
         
        // For Submit Button
        
        b.setOnClickListener(new OnClickListener() {
            @Override
            public void onClick(View v) {
            	
            	//Getting the User's Location
                
            	gps = new MyGPS(MainActivity.this);  
                if(gps.canGetLocation()){					
                    latitude = gps.getLatitude();
                    longitude = gps.getLongitude();
                }
                                
                //Getting User's City from its location
                
                if(Geocoder.isPresent()){		
                    try {
    					addresses = geocoder.getFromLocation(latitude, longitude, 1);
    				} catch (IOException e1) {
    					e1.printStackTrace();
    				}
                    
                    // If the Location is geocoded correctly
                	
                    if(addresses.size()!=0){	
                			city = addresses.get(0).getAddressLine(1);
                	}
                	else tv.setText("Not Able to Decode.Try Later ");
                }
                else{
                	city="null";
                	tv.setText("Geocoder Not Present.Please Restart your phone");
                }
                
                //Dialog box for Progress
                
                new ProgressDialog(v.getContext());
				final ProgressDialog p = ProgressDialog.show(v.getContext(),"Waiting for Server", "Accessing Server");
                
				
				// Sending values to the Server
				Thread thread = new Thread()
                {
                    @Override
                    public void run() {
                         try{          
                             httpclient=new DefaultHttpClient();
                             
                             // Server's IP here
                             
                             httppost= new HttpPost(register); 
                             
                             // Saving The values to be sent as Key-Value Pairs
                             
                             nameValuePairs = new ArrayList<NameValuePair>(5);
                             nameValuePairs.add(new BasicNameValuePair("name",name));
                             nameValuePairs.add(new BasicNameValuePair("phone",phoneNumber));
                             nameValuePairs.add(new BasicNameValuePair("initial",city));
                             nameValuePairs.add(new BasicNameValuePair("final",et1.getText().toString()));
                             nameValuePairs.add(new BasicNameValuePair("time",et2.getText().toString()));
                             
                             // Sending The Values
                             
                             httppost.setEntity(new UrlEncodedFormEntity(nameValuePairs));
                             httpclient.execute(httppost);
                             p.dismiss();
                             
                             // Resetting the Inputs and displaying success Message
                             
                             runOnUiThread(new Runnable() {
                                 public void run() {
                                     Toast.makeText(getApplicationContext(),"Success", Toast.LENGTH_SHORT).show();
                                     et1.setText("");
                                     et2.setText("");

                                 }
                             });


                         }catch(Exception e){
                             
                             runOnUiThread(new Runnable() {
                                public void run() {
                                    p.dismiss();
                                }
                            });
                             System.out.println("Exception : " + e.getMessage());
                         }
                    }
                };
 
                thread.start();
 
                
            }
        });
        
        // For Deleting The entry After getting the Customer
        
        b2.setOnClickListener(new OnClickListener() {
			
 			@Override
 			public void onClick(View v) {
                 new ProgressDialog(v.getContext());
 				final ProgressDialog p = ProgressDialog.show(v.getContext(),"Waiting for Server", "Accessing Server");
                 
 				
 				// Sending values to the Server
 				Thread thread = new Thread()
                 {
                     @Override
                     public void run() {
                          try{          
                              httpclient=new DefaultHttpClient();
                              
                              // Server's IP here
                              
                              httppost= new HttpPost(delete); 
                              
                              // Saving The values to be sent as Key-Value Pairs
                              
                              nameValuePairs = new ArrayList<NameValuePair>(1);
                              nameValuePairs.add(new BasicNameValuePair("phone",phoneNumber));
                              
                              // Sending The Values
                              
                              httppost.setEntity(new UrlEncodedFormEntity(nameValuePairs));
                              httpclient.execute(httppost);
                              p.dismiss();
                              
                              // Resetting the Inputs and displaying success Message
                              
                              runOnUiThread(new Runnable() {
                                  public void run() {
                                      Toast.makeText(getApplicationContext(),"Success", Toast.LENGTH_SHORT).show();
                                  }
                              });

                          }catch(Exception e){
                              
                              runOnUiThread(new Runnable() {
                                 public void run() {
                                     p.dismiss();
                                 }
                             });
                              System.out.println("Exception : " + e.getMessage());
                          }
                     }
                 };
  
                 thread.start();
 				
 			}
 		});

        
        
    }
    
    
    // Function to get The Credentials from the User

    public static void setCredentials(Context mcontext,boolean firstRun){
    	
    	// Getting the layout of The Dialog to Take user's credentials
    	
    	LayoutInflater li = LayoutInflater.from(mcontext);
    	LinearLayout L=(LinearLayout)li.inflate(R.layout.dialog, null);
    	final EditText input1 =(EditText)L.findViewById(R.id.ET1);
    	final EditText input2 =(EditText)L.findViewById(R.id.ET2);    	
    	AlertDialog.Builder alert = new AlertDialog.Builder(mcontext);

    	// Setting The Properties of the Alert Dialog Box

    	alert.setTitle("Welcome");
    	alert.setMessage("Enter Your details");
    	alert.setView(L);
    	alert.setPositiveButton("Ok", new DialogInterface.OnClickListener() {
    	public void onClick(DialogInterface dialog, int whichButton) {
    		
    		// Saving the values in user's preferences
 
    		name = input1.getText().toString();
    		phoneNumber=input2.getText().toString();
    		prefs.edit().putString("Phone Number", phoneNumber).commit();
    		prefs.edit().putString("Name", name).commit();
    	  }
    	
    	});

    	// Displaying The Dialog
    	
    	AlertDialog  alertBox=alert.create();
    	alertBox.setCancelable(!firstRun);
    	alertBox.show();

    }
    
    // For Menu
    
    @Override
    public boolean onCreateOptionsMenu(Menu menu) {
        getMenuInflater().inflate(R.menu.main, menu);
        return true;
    }
    
    // For The option of Change Credentials in Menu
    
    @Override
    public boolean onOptionsItemSelected(MenuItem item) {
    	
    	switch (item.getItemId()) {
        case R.id.set:
          setCredentials(this,false);
          return true;
        default:
            return super.onOptionsItemSelected(item);  
          
        }
     }  
    
    
}
