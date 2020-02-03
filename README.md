# PHP_Javascript_Apache_Antique_Delivery
College Project 
A PHP/JavaScript project that interfaces with an Apache server via SQL queries to display info on an antique delivery company's orders. 

For each page, nn intial PDO query collates the data into PHP array(s).
This PHP arrays are then converted to javascript arrays, and the webpage is manipulated from these arrays in response to user input.

Index.php:
Displays the major product lines and if the user selects a product line, the full product listing is outlined for 
the respective product line.

Customers.php
Lists all customers in the database grouped by country. 

Orders.php
Shows all orders in different processing states. 
If an order is selected by the user, all info related to that order is displayed. 
