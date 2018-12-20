## Steps
1. Go to **app/config->config.php**
2. Put your **DB_NAME, DB_USER, DB_PASSWORD, DB_HOST, URLROOT**.
        
        For example:
            DB_NAME = 'bloodbank' [this must be bloodbank for the sql file to work]
            DB_USER = 'root'
            DB_PASSWORD = '',
            DB_HOST = 'localhost'
            URLROOT = 'http://localhost/bloodbank'
   
3. Put the directory into htdocs folder of XAMPP, WAMP, MAMP, etc.
4. Go to **public/db** and **import the db file** to phpmyadmin directly. **No need to create new database**. Some inbuilt entries are there. Here's a detail:
    
        password: 123456 [for all receivers and hospitals]
        receivers: jane@gmail.com , johndoe@gmail.com [images taken from randomuser.me]
        hospitals: blood@brilliant.com, blood@excellence.com
    
    
5. Go to http://localhost/bloodbank/ to run the app.


## Note
 You will have to edit .htaccess file in public folder if you're deploying it anywhere else. Currently, Rewrite is /bloodbank/public which means it is accessing bloodbank/public folder of htdocs. Change it according to your server. 