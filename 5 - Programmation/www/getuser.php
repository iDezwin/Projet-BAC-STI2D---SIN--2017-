<!DOCTYPE html>
<html>
<head>
<style>
table {
    width: 100%;
    border-collapse: collapse;
}

table, td, th {
    border: 1px solid black;
    padding: 5px;
}

th {text-align: left;}
</style>
</head>
<body>

<?php
$q = intval($_GET['q']);

$con = mysqli_connect('localhost','root','WU6Z1ON6','projet');
if (!$con) {
    die('Could not connect: ' . mysqli_error($con));
}

mysqli_select_db($con,"ajax_demo");
$sql="SELECT * FROM test WHERE id = '".$q."'";
$result = mysqli_query($con,$sql);

echo "<table>
<tr>
<th><center>Heure d'ouverture</center></th>
<th><center>Heure de fermeture</center></th>
</tr>";
while($row = mysqli_fetch_array($result)) {
	$row['minute_f'] = str_pad($row['minute_f'], 2, '0', STR_PAD_LEFT);
    $row['minute_o'] = str_pad($row['minute_o'], 2, '0', STR_PAD_LEFT);
    echo "<tr>";
    echo "<td><center>" . $row['heure_o'] .":". $row['minute_o'] . "</center></td>";
    echo "<td><center>" . $row['heure_f'] .":". $row['minute_f'] . "</center></td>";
    echo "</tr>";
}
echo "</table>";
mysqli_close($con);
?>
</body>
</html>
