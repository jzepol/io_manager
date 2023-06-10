<?php  

	#Data base access config
	define('DB_MANAGEMENT', 'pgsql');		     # Put the system data base management to use
	define('DB_HOST', 'localhost'); 	 		 	 # Put the name of the host
	define('DB_PORT','5432');					 # Put the port if you use postgresql
	define('DB_USER', 'postgres'); 	 		 		 # Put the username
	define('DB_PASSWORD', '121194'); 					 # Put the password
	define('DB_NAME', 'guarani3');		 # Put the data base name
	
	# App route
	define('APP_ROUTE', dirname(dirname(dirname(__FILE__))));

	# URL route
	define('URL_ROUTE', 'http://localhost/IO_MANAGER/'); # Put the url route of your site
	//define('URL_ROUTE', 'http://172.0.16.14/vigilancia/'); # Put the url route of your site

	# Site name
	define('SITENAME', 'Entradas - Salidas');  # Put the name of the site
