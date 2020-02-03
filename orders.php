<html>
    <a name="top"></a>
</html>

<?php
  include_once('navbar.php');
?>
<style>
<?php include 'table_style.css'; ?>
</style>
   
<style>
<?php include 'master_style.css'; ?>
</style>

   

<?php
    require_once 'dbconfig.php';
#The code's a little to slow to load on this page because of a giant array I used to complete the onlick part - see below 


#The code below for doing a PDO query was taken from the lecture notes (lec 15)
#This also includes the error handlng for the PDO query - try/catch 
 
    try {
        $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
 
    $sql = 'SELECT * FROM orders ORDER BY orderDate DESC ';
 
    $q = $conn->query($sql);
    
    $q->setFetchMode(PDO::FETCH_ASSOC);
 
    } 
    catch (PDOException $pe) {
        die("Could not connect to the database $dbname :" . $pe->getMessage());
    }


?>


<?php
$PHPArray = [];

# defining an empty array to be filled below 

?>

<html>
    <head>
        <title>PHP MySQL Query Data Demo</title>
    </head>

    <body>

        

        <!--Here I just changed the echo to an array_push to populate the array -->


                    <?php while ($r = $q->fetch()): ?>
                    <tr>
                        <td><?php array_push($PHPArray,htmlspecialchars($r['orderNumber']))?></td> 
                        <td><?php array_push($PHPArray,htmlspecialchars($r['orderDate']))?></td>
                        <td><?php array_push($PHPArray,htmlspecialchars($r['requiredDate']))?></td>
                        <td><?php array_push($PHPArray,htmlspecialchars($r['shippedDate']))?></td>
                        <td><?php array_push($PHPArray,htmlspecialchars($r['status']))?></td>
                        <td><?php array_push($PHPArray,htmlspecialchars($r['comments']))?></td>
                        

                    
                    <?php endwhile; ?>

            
        
        <div id="table-wrapper">
        
        <div id="container"></div>
        <div id="container1"> </div>
        <div id="container2"> </div>
        <div id="spacer"> </div>
        
        <div id="order-wrapper">
        <div id="orderInfo"> </div>
        </div>
        
        </div>
        
        <style>
            
            body{
                margin: 50px;
            
            }
            
            /*I tried controlling the weird thing with the loaded orders table messing up the order of the other 3 but I couldn't get it to work
            I'm a bit rusty with grid */
            #table-wrapper{
                display: grid;
                grid-template-columns: repeat( 12, minmax(100px, 1fr) );
                grid-template-rows:  repeat(4,auto);
                
            }
            
            #container{
                grid-column-start: 1;
                grid-column-end: 2;

                

                
            }
            
            #container1{
                grid-column-start: 1;
                grid-column-end: 2;

               
 
                
            }
            #container2{
                grid-column-start: 1;
                grid-column-end: 2;
                


                
                
            }
            #spacer{
                grid-column-start: 3;
                grid-column-end: 4;
                
                grid-row-start: 1;
                grid-row-end: -1;

            }
            
            #order-wrapper{
                grid-column-start: 4;
                grid-row-start: 1;
                position: relative;
                display: grid;
                grid-template-columns: repeat( 12, minmax(100px, 1fr) );
                grid-template-rows:  repeat(4,auto);
               
                
                /*
                
                background-color: purple;
                opacity: 50%;
                */
            
                
            }
            #orderInfo{
                grid-column-start: 1;

            }
            
            

        
        </style>
        

    
    </body>
</html>




<?php




?>




<?php
    require_once 'dbconfig.php';
 # here's the query for the mega array - it's got like 30k entries - I tried messing with my queries but this was the best I came up with
    try {
        $conn2 = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
 
    $sql2 = 
        'SELECT 
    orders.orderNumber, orders.orderDate, orders.requiredDate, orders.shippedDate, orders.status, orders.comments, orders.customerNumber, orderdetails.productCode,
    products.productLine,products.productName
    FROM orders,orderdetails,products
    WHERE orders.orderNumber = orderdetails.orderNumber AND orderdetails.productCode = products.productCode';
 
    $q2 = $conn2->query($sql2);
    
    $q2->setFetchMode(PDO::FETCH_ASSOC);
 
    } 
    catch (PDOException $pe2) {
        die("Could not connect to the database $dbname :" . $pe2->getMessage());
    }


?>
<?php

?>

<?php
$PHPArray2 = [];



?>

<html>
    <head>
        <title>PHP MySQL Query Data Demo</title>
    </head>

    <body>

        <div id="container2">
            


                    <?php while ($r2 = $q2->fetch()): ?>
                    <tr>
                        <td><?php array_push($PHPArray2,htmlspecialchars($r2['orderNumber']))?></td>
                        <td><?php array_push($PHPArray2,htmlspecialchars($r2['orderDate']))?></td>
                        <td><?php array_push($PHPArray2,htmlspecialchars($r2['requiredDate']))?></td>
                        <td><?php array_push($PHPArray2,htmlspecialchars($r2['shippedDate']))?></td>
                        <td><?php array_push($PHPArray2,htmlspecialchars($r2['status']))?></td>
                        <td><?php array_push($PHPArray2,htmlspecialchars($r2['comments']))?></td>
                        <td><?php array_push($PHPArray2,htmlspecialchars($r2['customerNumber']))?></td>
                        <td><?php array_push($PHPArray2,htmlspecialchars($r2['productCode']))?></td>
                        <td><?php array_push($PHPArray2,htmlspecialchars($r2['productLine']))?></td>
                        <td><?php array_push($PHPArray2,htmlspecialchars($r2['productName']))?></td>

                        


                        
                    
                    <?php endwhile; ?>

            
        </div>
    
    </body>
</html>




<?php




?>

<script type='text/javascript'>
// This code for json_encode I took from here : https://stackoverflow.com/questions/5618925/convert-php-array-to-javascript/5619038 - the second answer
<?php
$js_array2 = json_encode($PHPArray2);
echo "var javascript_array2 = ". $js_array2 . ";\n";
?>
console.log(javascript_array2);



</script>





<script type='text/javascript'>
<?php
$js_array = json_encode($PHPArray);
echo "var javascript_array = ". $js_array . ";\n";
?>
console.log(javascript_array);

    
   
// then pretty much everything from assignment 2 was portable over to this project     
    
var process_orders = "<table border=1 >";
var cancelled_orders ="<table border=1 >";
var most_recent_orders ="<table border=1 >";

process_orders += "<tr>Orders in process</tr>";
process_orders += "<tr><th>orderNumber</th><th>orderDate</th><th>status</th></tr>";

cancelled_orders += "<tr>Cancelled orders</tr>";   
cancelled_orders += "<tr><th>orderNumber</th><th>orderDate</th><th>status</th></tr>";

most_recent_orders += "<tr>20 most recent orders</tr>";
most_recent_orders += "<tr><th>orderNumber</th><th>orderDate</th><th>status</th></tr>";
    
    
    // logic here is that the array has been populated in rows of 6 so if you increment by 6 you'll onto the next row
    for (var i = 0; i<javascript_array.length;i+=6){
    	var orderNumber = javascript_array[i];
    	var orderDate = javascript_array[i+1];
    	var requiredDate = javascript_array[i+2];
    	var shippedDate = javascript_array[i+3];
    	var status = javascript_array[i+4];
    	var comments = javascript_array[i+5]; // could use same convention to create object


        if (status == "In Process"){
        process_orders += "<tr><td>" + "<button onclick = " + "reply_click(this.id)" + " class=" + "button" + " id=" + orderNumber + ">" +orderNumber + "</button> </td><td>" + orderDate + "</td><td>" + status + "</td></tr>";
        }
        else {};
        if (status == "Cancelled"){
        cancelled_orders += "<tr><td>" + "<button onclick = " + "reply_click(this.id)" + " class=" + "button" + " id=" + orderNumber + ">" +orderNumber + "</button> </td><td>" + orderDate + "</td><td>" + status + "</td></tr>";
        }
        if (i<116) { // 20 orders so 116 gets you the last 20 116/6 
            most_recent_orders += "<tr><td>" + "<button onclick = " + "reply_click(this.id)" + " class=" + "button" + " id=" + orderNumber + ">" +orderNumber + "</button> </td><td>" + orderDate + "</td><td>" + status + "</td></tr>";
        }
        
       
    }
    process_orders += "</table>";
    cancelled_orders += "</table>";
    most_recent_orders += "</table>";
    
    document.getElementById("container").innerHTML = process_orders;
    document.getElementById("container1").innerHTML = cancelled_orders;
    document.getElementById("container2").innerHTML = most_recent_orders;
    

    
function reply_click(clicked_id) {
    console.log(javascript_array2) 
    extraInfo(javascript_array2, clicked_id); // consume the id and pass it to this function along with the relevant js array 
    window.scrollTo(0,0); // this navigates back to the top of the screen 
    
   
    
    
}    
    

function extraInfo(arr2, passedId) { 
    console.log(arr2);
    console.log(passedId);
    var extra_output = "<table border = 1 >";
    extra_output += "<tr>Extra Order Info</tr>";
    extra_output += "<tr> <th>orderNumber</th> <th>orderDate</th> <th>requiredDate</th> <th>shippedDate</th> <th>status</th> <th>comments</th> <th>customerNumber</th> <th>productCode</th> <th>productLine</th> <th>productName</th></tr>";
 

    for (var i = 0; i<arr2.length;i+=10){
    	var orderNumber = arr2[i];
    	var orderDate = arr2[i+1];
    	var requiredDate = arr2[i+2];
    	var shippedDate = arr2[i+3];
    	var status = arr2[i+4];
    	var comments = arr2[i+5];
        var customerNumber = arr2[i+6];
        var productCode = arr2[i+7];
        var productLine = arr2[i+8];
        var productName = arr2[i+9];

        
        
        
               if (orderNumber == passedId) { // if the id is the passed id then this is the data to transmit 
            extra_output += "<tr><td>" + orderNumber + "</td><td>" + orderDate + "</td><td>" + requiredDate + "</td><td>" + shippedDate + "</td><td>" + status + "</td><td>" + comments + "</td><td>" + customerNumber +  "</td><td>" +productCode  +  "</td><td>" +  productLine + "</td><td>" +productName + "</td></tr>";
        }

        }

 
        

        extra_output += "</table>";
    document.getElementById("orderInfo").innerHTML = extra_output;   
    
    

    }

    
    
    

</script>


<?php
  include_once('footer.php');
?>






