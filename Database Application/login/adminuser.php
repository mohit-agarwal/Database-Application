<?php
session_start();
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
	// echo "welcome"
} else {
    header('Location: access.php');
}
?>

<?php
require 'connect.inc.php';

$sql="SELECT * from ADMIN";

$result = mysql_query($sql);

echo "<table border='1'>
<tr>
<th>NAME</th>
<th>PASSWORD</th>
</tr>";

while($row = mysql_fetch_array($result))
  {
  echo "<tr>";
  echo "<td>" . $row['USER'] . "</td>";
  echo "<td>" . $row['PASSWORD'] . "</td>";
  echo "</tr>";
  }
echo "</table>";

?>
