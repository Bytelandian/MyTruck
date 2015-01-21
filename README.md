My truck My client

#BRIEF DESCRIPTION

Problem Description: Truck going from city A to city B charges for both sides, it comes back empty , leading to wastage of fuel. Their may be another citizen who needs to transport goods from city B to city A , so he will use another truck , paying him for both sides and then this truck will come back empty. So, there is enormous wastage of fuel and money , which can be saved if the citizen going from city B to city A instead of a new truck uses the same truck as that going empty.

Provided solution: We are making an Android application and a Web application for Clients and an Android application for truck drivers, by the means of which clients can make queries for available truck drivers according to their pick-up location and destination. Truck drivers can make entries giving their destination and waiting time.


#SYSTEM REQUIREMENTS

Server :

	Operating System : Ubuntu
	Php 5.5.6, Apache 2, Mysql 5.0.11, Crontab

Client :

	Web : any Javascript enabled browser
	Android : Android 2.2 [Froyo] or better

Truck driver: 

	Android : Android 2.3 [GingerBread] or better 

#SETUP

1.Setting up the server :

	First install xampp which automatically installs phpmyadmin and mysyl.

	Database :
		1.Make a new user in the mysql.
		2.Then make a new database named Transportation.
		3.Import the sql files Trucks_structure.sql and Clients_structure.sql to add the tables in the database.
	Crontab :
		1.Type the following command in the terminal :
			crontab -e
		2.Then add the following commang in the end of the crontab:
        		* * * * * /opt/lampp/bin/php /opt/lampp/htdocs/CSL458/hourly.php
		3.Save and exit
	Php :
		1. Just change the IP and the user credentials in the config.php file to the
         		IP of the system .
		2. Changing IP will made the php will work and then the server is SET UP.

	Running the server :
		1. Open the terminal.
		2. Type the following command :
        	  sudo /opt/lampp/lampp start
		3. Enter the password
		4. This will start the Apache and sql server both.

2.Setting up the Android Applications:

	First You need to change the Server’s Address in both the Applications . For this, Open MainActivity.java in the src folder of both the 	Application and change the server’s Address there. Then compile them to apk.

3.How to host the website:

	1. Open the file siteconfig.php, enter the server IP Address, database username and password.
	2. Go to line 75 of index.html and change the path to where the file clientregister.php is kept under the server folder.
                                         

#HOW TO RUN/SAMPLE RUN :

1. Driver side Application:
	When the driver is using the application for the first time, a dialogue box will appear asking for his details. that are name and 		mobile number. 
		
	After that, when the driver is free he can enter his destination and time left in departure in order to get costumers. There is a 		button named “got the costumer” which driver is supposed to click when he gets the costumer. Driver can also change his details when he 	needs to.

2. Client side Application:
	Client can make a query by entering his pick-up location and destination . the results will be displayed in a list alongwith their 		contact no. and availability details, he can make a call by directly clicking on the respective entry in the list. in case there is no 		truck currently available for his destined location he  can register his email to receive notifications when a truck is available for 		his destination within his given waiting time. 

3. Client side Web-Application:

	This website helps the client to find out about truck drivers that can help them transport their goods between their desired locations. 	
	There are different ways in which they can find such a driver.
	1. First of all they can fill in Both the Initial location and the Destination in the Query form and check whether there is a 			suitable driver or not.
	2. If not found, he can then fill in only one of the locations or even no location and simply click the query button. He can 			then search for his city in the search box. He can then check whether his desired city lies on the route that the Driver is 			covering by clicking on the map view button.
	3. If he still does not find any driver according to his choice, he can then Register on the website with his details and the 			locations between which he wants to transport his goods. He will be notified if any Driver according to his locations contacts 			us within the waiting time he registered with.
	4. He will automatically be unregistered after the waiting time he registered with.
