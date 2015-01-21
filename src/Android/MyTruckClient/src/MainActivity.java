package com.CSL458.mytruckclient;

import java.util.ArrayList;
import java.util.List;
import org.apache.http.HttpResponse;
import org.apache.http.NameValuePair;
import org.apache.http.client.HttpClient;
import org.apache.http.client.ResponseHandler;
import org.apache.http.client.entity.UrlEncodedFormEntity;
import org.apache.http.client.methods.HttpPost;
import org.apache.http.impl.client.BasicResponseHandler;
import org.apache.http.impl.client.DefaultHttpClient;
import org.apache.http.message.BasicNameValuePair;
import android.app.Activity;
import android.app.Dialog;
import android.app.ProgressDialog;
import android.content.Context;
import android.content.Intent;
import android.os.Bundle;
import android.view.View;
import android.view.View.OnClickListener;
import android.widget.Button;
import android.widget.CheckBox;
import android.widget.EditText;
import android.widget.TextView;
import android.widget.Toast;
 
public class MainActivity extends Activity {
    Button b;
    EditText et1,et2;
    TextView tv;
    CheckBox c;
    HttpPost httppost;
    StringBuffer buffer;
    HttpResponse response;
    HttpClient httpclient;
    List<NameValuePair> nameValuePairs;
    String email,waitingHours;
    
    // CHANGE SERVER'S ADDRESS HERE
    

    String query="http://10.1.9.117/CSL458/androidquery.php";
    String clientRegister="http://10.1.9.117/CSL458/clientregister.php";
    
    final Context context=this;
  
    @Override
    public void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        
        // Setting the Layout And Getting the References to Items 
        
        setContentView(R.layout.activity_main);
        b = (Button)findViewById(R.id.Button01);
        et1= (EditText)findViewById(R.id.EditText01);
        et2= (EditText)findViewById(R.id.EditText02);
        tv= (TextView)findViewById(R.id.tv);
        c=(CheckBox)findViewById(R.id.CheckBox01);
        
        // On Query Submission 
        
        b.setOnClickListener(new OnClickListener() {
            @Override
            public void onClick(final View v) {

               // If Notifications are Requested , Input Credentials
            	
            	if(c.isChecked()){
                	
            		// Dialog For input
            		
                	final Dialog dialog = new Dialog(context);
        			dialog.setContentView(R.layout.dialog);
        	    	final EditText input1 =(EditText)dialog.findViewById(R.id.ET1);
        	    	final EditText input2 =(EditText)dialog.findViewById(R.id.ET2);    	

        			dialog.setTitle("Enter Your Details");
        			Button dialogButton = (Button) dialog.findViewById(R.id.dialogButtonOK);
        			dialogButton.setOnClickListener(new OnClickListener() {
        				@Override
        				public void onClick(View v2) {
	        					dialog.dismiss();
	        					email=input1.getText().toString().trim();
	        					waitingHours=input2.getText().toString().trim();
	        					getData(v,true);
        				}
        			});
         
        			dialog.show();        			
        			c.setChecked(false);
                }
                else getData(v,false);
                
            }
        });
            	

    }
    		// Function To post request to Server and Process Response  
    
    void getData(View v,final boolean notification){
        new ProgressDialog(v.getContext());
		final ProgressDialog p = ProgressDialog.show(v.getContext(),"Waiting for Server", "Accessing Server");
        Thread thread = new Thread()
        {
            @Override
            public void run() {
                 try{
                     
                     httpclient=new DefaultHttpClient();
                     httppost= new HttpPost(query); 
                     
                     // Saving The Query In NumValue Pair To Send To Server
                     
                     nameValuePairs = new ArrayList<NameValuePair>();
                     nameValuePairs.add(new BasicNameValuePair("initial",et1.getText().toString().trim()));  
                     nameValuePairs.add(new BasicNameValuePair("final",et2.getText().toString().trim()));  
                     httppost.setEntity(new UrlEncodedFormEntity(nameValuePairs));
                     
                     // Execute HTTP Post Request
                     response=httpclient.execute(httppost);
                     
                     // If Notifications Are requested , Send Client's Credentials to Server
                     
                     if(notification){
                         HttpPost httppost2 = new HttpPost(clientRegister); 
                         nameValuePairs.add(new BasicNameValuePair("email",email));  
                         nameValuePairs.add(new BasicNameValuePair("time",waitingHours));  
                         httppost2.setEntity(new UrlEncodedFormEntity(nameValuePairs));
                         HttpClient httpclient2=new DefaultHttpClient();
                         httpclient2.execute(httppost2);

                     }
 
                     ResponseHandler<String> responseHandler = new BasicResponseHandler();
                     final String response = httpclient.execute(httppost, responseHandler);
                     
                     // Sending Server's Response to The List Activity To Display The Results
                     
                     runOnUiThread(new Runnable() {
                            public void run() {
                                p.dismiss();
                                Toast.makeText(getApplicationContext(),"Success", Toast.LENGTH_SHORT).show();
                                et1.setText("");
                                et2.setText("");
                                
                                Intent i=new Intent(MainActivity.this, MyListActivity.class);
                                i.putExtra("json", response);
                                MainActivity.this.startActivity(i);

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
    
}