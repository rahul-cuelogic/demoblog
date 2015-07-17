Sample blog application

Please refer composer.json for the correct versions of the symfony components being used.

Steps to set up application:
1) You can set up app by downloading the source code
2) Once you have the source code available on your system, set the appropriate permissions to following directories

 i] app/cache 
 ii] app/logs

set 777 permission to above mentioned directories

3) Edit the app/config/parameters.yml file to set the credentials for your database

4) To run the application in development mode use use the URL as:
 www.yourdomain.com/app_dev.php/

5) To run the application in production mode use use the URL as:
 www.yourdomain.com/app.php/

6) Once you are done with setting up the permissions, run the load fixtures command to get the default record in database.
  
