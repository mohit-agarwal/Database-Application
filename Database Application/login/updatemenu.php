
<?php
//echo "hello";
 require 'connect.inc.php';
 $name=$_POST['updatecat'];
 $query="select * from MENU where NAME='$name'";
 $query_run=  mysql_query($query);
 if($query_run)
 {
   echo "<form action='updated.php' method='POST'>"; 
while($row = mysql_fetch_array($query_run))
  {
   $a=$row['NAME'];
   $b=$row['PRICE'];
   $c=$row['CATEGORY'];
   echo "Name : <input type='text' readonly='readonly' name='name' value='$a'><br><br>";
   echo "Price : <input type='text' name='price' value='$b'><br><br>";
   echo "Category: 
    <select name ='category'>
  <option value='$c'>$c</option>
  <option value='Continental'>Continental</option>
  <option value='Chinese'>Chinese</option>
  <option value='Indian'>Indian</option> 
    </select>"; 
  }
  echo "<br><br><input type='submit' value='Update'>";
  echo "</form>";
  
 }
 


?>
