<html>


            <nav class="deliv-navbar" id="deliv-navbar">
                <ul id="ul-navbar">
                    <li id="index"><a href="index.php" >Index</a></li>
                    <li id="orders"><a href="orders.php" >Orders</a></li>
                    <li id="customers"><a href="customers.php" >Customers</a></li>
                </ul>
            </nav>
            
            
<style>
    
    #deliv-navbar ul{
       
        display:grid;
        grid-template-columns: repeat 12(1fr);
        grid-template-rows: 2fr;

        text-align: left;
        background-color:rgb(25,123,135);
        opacity: 75%;
        

        
    }
    
    
    
    #deliv-navbar li{
       
        list-style: none;  /*Gets rid of the dots. */
        

        
    }
    
    #deliv-navbar a{
        text-decoration: none;
        color: antiquewhite;

        

        
    }
    
    
    #index{
        grid-column-start: 2;
        grid-column-end: 3;
        
        
    }
    
    #orders{
        grid-column-start: 4;
        grid-column-end: 5;
        
    }
    
    #customers{
        grid-column-start: 6;
        grid-column-end; 7;
        
    }
    
    
    
</style>
            
</html>
