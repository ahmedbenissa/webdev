<?php
include "connect.php";
function classifysuppliers(){
	$dbh = config::getConnexion();

foreach($dbh->query('SELECT count(name),productstype from suppliertab group by productstype') as $row) {echo "<table>";
echo "<tr>";
echo "<td>" . $row['count(name)'] . "</td>";
echo "<td>" . $row['productstype'] . "</td>";
echo "</tr>";
echo "</table>";}}
classifysuppliers();
?>