
<?php
//session_start();
//require 'core.inc.php';
require 'connect.inc.php';
 if(isset($_POST['number']) && isset($_POST['amount']) && isset($_POST['status']))
     { 
     $number=$_POST['number'];
     $amount=$_POST['amount'];
     $status=$_POST['status'];
     $id=$_POST['choice'];
     echo $number;
     if(!empty($number) && !empty($amount) && !empty($status))
         {
            
                $query="select ORDER_NO from CUSTOMER_ORDER where ORDER_NO='$number'";
                //echo $query;
                $query_run=  mysql_query($query);
                if(mysql_num_rows($query_run)>0){
                    echo 'Order Number'.$name.'already exists'.'<br>';
                    $name="";
                }
                else{
                     
                    $query="insert into CUSTOMER_ORDER values('$number','$amount','$status','$id')" ;
                    $query_run=  mysql_query($query);
                   if($query_run){
                       header('Location: employee.php');
                       echo $item_no;
                      mysql_close(mysql_connect("localhost","root", ""));        
                   }
                   else{
                       echo 'error'.'<br>'.$item_no;
                   }
                    
            
         }
         }
     else {
         echo 'all fields are required';   
          }  
     }
    
    ?>
    <!DocType HTML>
    <html>
    <head>
<title>insert an order</title>
</head>
<body>

<form action="insert_customer_order.php" method="POST">
    Order no:<br><input type="text" name="number" maxlength="15" ><br><br>
    Amount:<br><input type="text" name="amount"><br><br>
    Status:<br><input type="text" name="status"><br><br>
    Customer no:<?php require 'connect.inc.php';

$sql1="SELECT * FROM CUSTOMER";

$result1 = mysql_query($sql1);

echo "<select name='choice'>";

while($row = mysql_fetch_array($result1))
  {
    $x=$row['CUSTOMER_ID'];
  echo "<option value='$x'>" . $row['CUSTOMER_ID'] ."</option>";
  }?>
    <input type="submit" value="Add Order">
</form>
</body>
</html>
