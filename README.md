# E_store-safe
EITF05 project. Safe version of E_store.


## CSRF Attack
Open localhost/e_store-safe/bad-site.php in the browser and click on the button named "attack". This sends an HTTP request to the login page which will be denied and an HTTP 405 error will be displayed. 

## SQL Injection and XSS attack
Due to the web application using prepared statements for SQL queries and sanitization of all user input displayed on the site any SQL query or php script inputted by the client will do nothing. 