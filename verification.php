
<?php
if(($_POST["type"]=="admin")&&($_POST["password"]=="admin"))
{
	header("Location: admin.php");
    exit;
}
if(($_POST["type"]=="supplier")&&($_POST["password"]=="supplier"))
{
	header("Location: supplier.html");
    exit;
}
?>