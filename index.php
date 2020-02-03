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
#The code below for doing a PDO query was taken from the lecture notes (lec 15)
#This also includes the error handlng for the PDO query - try/catch 
 
    try {
        $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
 
    $sql = 'SELECT * FROM productlines ';
 
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

        <div id="container">
            <h1>Productlines</h1>
             <!--Here I just changed the echo to an array_push to populate the array -->


                    <?php while ($r = $q->fetch()): ?>
                    <tr>
                        <td><?php array_push($PHPArray,htmlspecialchars($r['productLine']))?></td>
                        <td><?php array_push($PHPArray,htmlspecialchars($r['textDescription']))?></td>
                        <td><?php array_push($PHPArray,htmlspecialchars($r['htmlDescription']))?></td>
                        <td><?php array_push($PHPArray,htmlspecialchars($r['image']))?></td>
                        

                    
                    <?php endwhile; ?>

            
        </div>
        <div id="extraProductLine"> </div>
    
    </body>
</html>




<?php




?>

<script type='text/javascript'>
// This code for json_encode I took from here : https://stackoverflow.com/questions/5618925/convert-php-array-to-javascript/5619038 - the second answer
<?php
$js_array = json_encode($PHPArray);
echo "var javascript_array = ". $js_array . ";\n";
?>
console.log(javascript_array);

var process_orders = "<table border=1 >";
process_orders += "<tr><th>productLine</th><th>textDescription</th></tr>";
// again the array has been populated in rows of 4 so increment by 4
    for (var i = 0; i<javascript_array.length;i+=4){
    	var productLine = javascript_array[i];
    	var textDescription = javascript_array[i+1];
    	var htmlDescription = javascript_array[i+2];
    	var image = javascript_array[i+3];

        
        process_orders += "<tr><td>" + "<button onclick = " + "reply_click(this.id)" + " class=" + "button" + " id=" + productLine + ">" +productLine + "</button></td><td>" + textDescription + "</td></tr>";

       
    }
    process_orders += "</table>";
    document.getElementById("container").innerHTML = process_orders;
    

</script>






<?php
    require_once 'dbconfig.php';
 
    try {
        $conn2 = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
 
    $sql2 = 'SELECT * FROM products';
 
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
                        <td><?php array_push($PHPArray2,htmlspecialchars($r2['productCode']))?></td>
                        <td><?php array_push($PHPArray2,htmlspecialchars($r2['productName']))?></td>
                        <td><?php array_push($PHPArray2,htmlspecialchars($r2['productLine']))?></td>
                        <td><?php array_push($PHPArray2,htmlspecialchars($r2['productScale']))?></td>
                        <td><?php array_push($PHPArray2,htmlspecialchars($r2['productVendor']))?></td>
                        <td><?php array_push($PHPArray2,htmlspecialchars($r2['productDescription']))?></td>
                        <td><?php array_push($PHPArray2,htmlspecialchars($r2['quantityInStock']))?></td>
                        <td><?php array_push($PHPArray2,htmlspecialchars($r2['buyPrice']))?></td>
                        <td><?php array_push($PHPArray2,htmlspecialchars($r2['MSRP']))?></td>
                        
                    
                    <?php endwhile; ?>

            
        </div>
    
    </body>
    
    
    <style>
        body{
            margin:50px;
        }
    
    </style>
    
    

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

    
function reply_click(clicked_id) {
    console.log(javascript_array)
    extraInfo(javascript_array2, clicked_id) 

}     
    
function extraInfo(arr1, passedId) { 

    console.log(passedId);
    
    console.log(typeof(passedId));
    
    var takeID;
    takeID = passedId;
    console.log(takeID);
    
    var getID;
    // small bit of logic here to get the buttons to work 
    
    if (passedId == "Classic") {
        getID = "Classic Cars";
    }
    
    if (passedId == "Vintage") {
        getID = "Vintage Cars";
    }
    
    if (passedId == "Planes") {
        getID = "Planes";
    }
    
    if (passedId == "Motorcycles") {
        getID = "Motorcycles";
    }
    
    if (passedId == "Ships") {
        getID = "Ships";
    }

    if (passedId == "Trains") {
        getID = "Trains";
    }
    
    if (passedId == "Trucks") {
        getID = "Trucks and Buses";
    }
    
    
    
    console.log(getID);
    

    
    
    
    
    
    var extra_output = "<table border = 1 >";
    extra_output += "<tr>Product Line info</tr>";
    extra_output += "<tr><th>productCode</th><th>productName</th><th>productLine</th><th>productScale</th><th>productVendor</th><th>productDescription</th><th>quantityInStock</th><th>buyPrice</th><th>MRSP</th></tr>";
 
// again the array has been populated in rows of 9 so increment by 9
    for (var i = 0; i<arr1.length;i+=9){
    	var productCode = arr1[i];
    	var productName = arr1[i+1];
    	var productLine = arr1[i+2];
    	var productScale = arr1[i+3];
    	var productVendor = arr1[i+4];
    	var productDescription = arr1[i+5]; 
    	var quantityInStock = arr1[i+6];
    	var buyPrice = arr1[i+7];
    	var MRSP = arr1[i+8];


        
        if (productLine == getID) { // if the id is the passed id then this is the data to transmit 
        extra_output += "<tr><td>" + productCode + "</td><td>" + productName + "</td><td>" + productLine + "</td><td>"  +productScale +  "</td><td>" +productVendor + "</td><td>" +productDescription + "</td><td>" +quantityInStock + "</td><td>" +buyPrice  + "</td><td>" +MRSP +  "</td></tr>";
        }

        }

 

        extra_output += "</table>";
        document.getElementById("extraProductLine").innerHTML = extra_output;   
    

    }    
    

</script>


<?php
  include_once('footer.php');
?>

