
<?php
//session_start();
//require 'core.inc.php';
require 'connect.inc.php';
 if(isset($_POST['id']) && isset($_POST['date']) && isset($_POST['payment_mode']) && isset($_POST['essn']) )
     { 
     $id=$_POST['id'];
     $date=$_POST['date'];
     $payment_mode=$_POST['payment_mode'];
     $essn=$_POST['essn'];
	 $discount=$_POST['discount'];     
	if(!empty($id) && !empty($date) && !empty($payment_mode) && !empty($essn))
         {
            
                $query="select CUSTOMER_ID from PAYMENT where CUSTOMER_ID='$id'";
                //echo $query;
                $query_run=  mysql_query($query);
                if(mysql_num_rows($query_run)>0){
                    echo 'id'.$id.'already exists'.'<br>';
                    $id="";
                }
                else{
              
                     $query="select * from PAYMENT";
                     $res=mysql_query($query);
                    $query="insert into PAYMENT values('$id','$date','$payment_mode','$discount','$essn')";
                    $query_run=  mysql_query($query);
                   if($query_run){
                       header('Location: payment.php');
                       echo $item_no;
                      mysql_close(mysql_connect("localhost","root", ""));        
                   }
                   else{
                       echo 'error'.'<br>'.$id;
                   }
                    
   		}         
         }
    else {
         echo 'all fields are required';   
          }  
     }
    
    ?>
<form action="insert_payment.php" method="POST">
   
   	Customer id:<?php require 'connect.inc.php';
	$sql1="SELECT * FROM CUSTOMER";
	$result1 = mysql_query($sql1);
	echo "<select name='id'>";

	while($row = mysql_fetch_array($result1))
	  {
    	$x=$row['CUSTOMER_ID'];
  		echo "<option value='$x'>" . $row['CUSTOMER_ID'] ."</option>";
 	  }
  	echo "</select>"?>
    <br><br>
    
	DATE:<br><input type="date" name="date"><br><br>
    
	PAYMENT:
    <select name="payment_mode">
  	<option value="Cash">Cash</option>
   	<option value="Credit_Card">Credit Card</option>
	</select><br><br>
	
	Discount:<input type="text" name="discount"></input><br><br>

	ESSN:
	<?php require 'connect.inc.php';
	$sql1="SELECT * FROM WORKING_STAFF1";
	$result1 = mysql_query($sql1);
	echo "<select name='essn'>";

	while($row = mysql_fetch_array($result1))
	  {
	    $x=$row['SSN'];
	  echo "<option value='$x'>" . $row['SSN'] ."</option>";
	  }
  	echo "</select><br><br>"
	?>

 <input type="submit" value="Insert PAYMENT">
</form>
