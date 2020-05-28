<?php 
include "classsuppliercore.php";
$classsuppliercore1=new classsuppliercore();
$list=$classsuppliercore1->searchsupplier($_POST['name']);

//var_dump($listeEmployes->fetchAll());
?>
