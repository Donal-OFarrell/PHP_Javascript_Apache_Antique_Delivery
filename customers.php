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
 
    $sql = 'SELECT * FROM customers ORDER BY country';
 
    $q = $conn->query($sql);
    
    $q->setFetchMode(PDO::FETCH_ASSOC);
 
    } 
    catch (PDOException $pe) {
        die("Could not connect to the database $dbname :" . $pe->getMessage());
    }


?>
<?php

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
                        <td><?php array_push($PHPArray,htmlspecialchars($r['customerNumber']))?></td>
                        <td><?php array_push($PHPArray,htmlspecialchars($r['customerName']))?></td>
                        <td><?php array_push($PHPArray,htmlspecialchars($r['contactLastName']))?></td>
                        <td><?php array_push($PHPArray,htmlspecialchars($r['contactFirstName']))?></td>
                        <td><?php array_push($PHPArray,htmlspecialchars($r['phone']))?></td>
                        <td><?php array_push($PHPArray,htmlspecialchars($r['addressLine1']))?></td>
                        <td><?php array_push($PHPArray,htmlspecialchars($r['addressLine2']))?></td>
                        <td><?php array_push($PHPArray,htmlspecialchars($r['city']))?></td>
                        <td><?php array_push($PHPArray,htmlspecialchars($r['state']))?></td>
                        <td><?php array_push($PHPArray,htmlspecialchars($r['postalCode']))?></td>
                        <td><?php array_push($PHPArray,htmlspecialchars($r['country']))?></td>
                        <td><?php array_push($PHPArray,htmlspecialchars($r['salesRepEmployeeNumber']))?></td>
                        <td><?php array_push($PHPArray,htmlspecialchars($r['creditLimit']))?></td>

                    
                    <?php endwhile; ?>
    <div id="table-wrapper">
            <div id="container">
            
        </div>
    </div>
        
        <style> 
            #table-wrapper{
                display: grid;
                grid-template-columns: repeat 12(1fr);
                grid-template-rows: repeat 4(1fr);
                
            }
            
            #container{
                grid-column-start: 1;
                grid-column-end: 12;
            }
                
        body{
            margin:50px;
        }
    

            
            
                        
        </style>
    
    </body>
</html>




<?php




?>

<script type='text/javascript'>
<?php
$js_array = json_encode($PHPArray);
echo "var javascript_array = ". $js_array . ";\n";
?>
console.log(javascript_array);

var process_orders = "<table border=1 >";
process_orders += "<tr><th>customerName</th><th>country</th><th>city</th><th>phone</th></tr>";

    for (var i = 0; i<javascript_array.length;i+=13){
    	var customerNumber = javascript_array[i];
    	var customerName = javascript_array[i+1];
    	var contactLastName = javascript_array[i+2];
    	var contactFirstName = javascript_array[i+3];
    	var phone = javascript_array[i+4];
    	var addressLine1 = javascript_array[i+5]; // could use same convention to create object
    	var addressLine2 = javascript_array[i+6];
    	var city = javascript_array[i+7];
    	var state = javascript_array[i+8];
        var postalCode = javascript_array[i+9];
    	var country = javascript_array[i+10];
    	var salesRepEmployeeNumber = javascript_array[i+11];
        var creditLimit = javascript_array[i+12];

        
        process_orders += "<tr><td>" + customerName + "</td><td>" + country + "</td><td>" +city + "</td><td>"  +phone +  "</td></tr>";
        
        
       
    }
    process_orders += "</table>";
    document.getElementById("container").innerHTML = process_orders;
    

</script>


<?php
  include_once('footer.php');
?>
