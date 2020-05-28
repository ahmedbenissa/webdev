<?php 

include "deliverycore.php";
class deliverydrivercore {
	    function adddeliverydriver($deliverydriver)
        {  
		$sql="insert into deliverydriver (id_driver,name_lastname,date_available) values (:id_driver,:name_lastname,:date_available)";
		$db = config::getConnexion();
		try{
        $req=$db->prepare($sql);		
        $id_driver=$deliverydriver->getid();
        $name_lastname=$deliverydriver->getname_lastname();
        $date_available=$deliverydriver->getdate_available();
		$req->bindValue(':id_driver',$id_driver);
		$req->bindValue(':name_lastname',$name_lastname);
		$req->bindValue(':date_available',$date_available);
		$req->execute();
        }
        catch (Exception $e){
            echo 'Erreur: '.$e->getMessage();
        }
	    }
	
	function deliver($id_driver)
	{
		$db = config::getConnexion();
		$stmt = $db->query("SELECT * FROM deliverydriver");
		$x=0;
		$driver=0;
		$a=0;
    while ($row = $stmt->fetch()) 
    {
    if(($id_driver)==$row['id_driver'])
    {
    	$a=$x;
    	$driver=$row['id_driver'];
    	break;
    }
    $x++;
    }
    //echo $driver;
    //echo " ";
    $stmt0 = $db->query("SELECT date_available FROM deliverydriver");
	
		$b=0;
    while ($row = $stmt0->fetch()) 
    {
    if($b==$x)
    {
        $date=$row['date_available'];
    	break;
    }
    $b++;
    }
   // echo $date;
   // echo " ";
    $stmt1 = $db->query("SELECT date FROM deliverytab");
	
    $c=0;
    $y=0;
    while ($row = $stmt1->fetch()) 
    {
    if($date==$row['date'])
    { 
    	$y=$c;
    	$date=$row['date'];
      break;
    }
    $c++;
    }
    //echo $date;
    //echo " ";
    $status=0;
    $stmt2 = $db->query("SELECT id FROM deliverytab where date='$date' and status ='$status' ");
   
    while ($row = $stmt2->fetch()) 
    {
    	$deliverycore=new deliverycore();
$status=1;
    echo $row['id']; 

    $deliverycore->updatedelivery($status,$row['id']);
    break;
    }
    //echo $row['id'];
    
    if($driver!=0)
      {
      	$stmt = $db->prepare("SELECT id,id_driver,id_client,date_available,status
 from deliverytab
inner join deliverydriver on deliverydriver.date_available=deliverytab.date
where deliverydriver.id_driver='$id_driver and deliverytab.status=1'
");
$stmt->execute(array('$id_driver' => $id_driver));

return $stmt;

	   } 
	}

	function display()
	{
		$dbh =  config::getConnexion();
$res = $dbh->query("SELECT id,id_driver,id_client,date_available
 from deliverytab
inner join deliverydriver on deliverydriver.date_available=deliverytab.date");
$res->execute();
 
    return $res;
	}
    function displaydeliverymen()
    {
      $sql="SELECT * From  deliverydriver";
        $db = config::getConnexion();
        try{
        $list=$db->query($sql);
        return $list;
        }
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }   
    }
}
?>