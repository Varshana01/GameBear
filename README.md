## DGT 2034Y - Internet Technologies and Web Services

- Project by:
    - *Varshana Gopal - 2210199*
    - *Hemshikha Nundloll - 2210593*
## Table of Contents

- [Intro](#Intro)
- [Creating the database](#creating-the-database)
- [Filling the database](#filling-database)
- [Accessing the Website](#Accessing-the-Website)
- [Admin](#Admin)
- [Accessing Review Page](#Review)

### Intro
This is our 2nd year project for semester 1 of module 2034Y - Internet Technologies and Web Services at University of Mauritius. We have created a gaming  website. '*GameBear*' where we provide the games we created and also buying products from our store. This project is a mix of various technologies learned throughout the course and self learn.

## Creating the database 

We have used MySQL to create the database and support the project.
We recommend using MySQL to avoid any code incompatibility issues 
when continuing further.

1. To access MySQL, you can use phpMyAdmin from your webserver.
2. Create a new database named 'gamebear' with the following tables:
    > adminlogin
    > users

## Filling database
1. Navigate to the php folder and run the database.php file
2. You should see something like this:
    > "Tables created. Insertion successful"

3. Fill the "userlogin" table with the following values in the image below:
![Image1](../Gamebear/Images/ReadMe_File/loginValues.png)

4. The "users" table will be filled as you will register/ create users on the website


## Accessing the Website
Access the website via the home page 'home.php'
You can find it using the link below:
http://127.0.0.1:8080/GameBear/

## Admin
To access our admin page on http://127.0.0.1:8080/Gamebear/admin.html, you will need the following credentials:

Username : Varshana
Password : 1234

We used xml language on the "Manage Products" database where data is stored in store.xml file. 

## Review

To be able to view the review page, the user should log in and hence will be able to view the review page and add a review and view review of other users. When the user is viewing the review page, the log out button is unaccessible.