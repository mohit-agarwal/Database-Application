<?php
//require 'core.inc.php';
require 'connect.inc.php';
 if(isset($_POST['name']) && isset($_POST['price']) && isset($_POST['quantity']) && isset($_POST['category']) && isset($_POST['choice']))
     { 
     $name=$_POST['name'];
     $price=$_POST['price'];
     $category=$_POST['category'];
     $quantity=$_POST['quantity'];
     $choice=$_POST['choice'];
     if(!empty($name) && !empty($price) && !empty($category) && !empty($quantity) && !empty($choice))
         {
            
                $query="select SHIPMENT_NO from RAW_MATERIAL1 where SHIPMENT_NO='$name'";
                //echo $query;
                $query_run=  mysql_query($query);
                if(mysql_num_rows($query_run)>0){
                    echo 'Shipment no '.$name.' already exists'.'<br>';
                    $name="";
                }
                else{
                    
                    $query="insert into RAW_MATERIAL2 values('$name','$category')";
                    $query_run=  mysql_query($query);
                    $query1="insert into RAW_MATERIAL1 values('$name','$price','$quantity','$choice')";
                    $query_run1=  mysql_query($query1);
                   if($query_run){
                       header('Location: raw.php?flag=1');
                       //echo $item_no;
                      mysql_close(mysql_connect("localhost","root", "pt1234"));        
                   }
                   else{
                       echo 'not done'.'<br>';
                   }
                    
            
         }
         }
     else {
         echo 'all fields are required';   
          }  
     }
    
    ?>
<form action="insert_raw.php" method="POST">
    Shipment no:<br><input type="text" name="name" maxlength="15" ><br><br>
    Price:<br><input type="text" name="price"><br><br>
    Quantity:<br><input type="text" name="quantity"><br><br>
    Supplier id:<?php require 'connect.inc.php';

$sql1="SELECT * FROM SUPPLIER";

$result1 = mysql_query($sql1);

echo "<select name='choice'>";

while($row = mysql_fetch_array($result1))
  {
    $x=$row['ID'];
  echo "<option value='$x'>" . $row['ID'] ."</option>";
  }
  echo "</select><br><br>"?>
    
    
    
    
    
    Type:
    <select name ="category">
  <option value="Fruits">Fruits</option>
  <option value="Vegetables">Vegetables</option>
  <option value="Milk">Milk</option>
    </select> <br><br>
    <input type="submit" value="Insert raw material item">
</form>
