<?php
include "connect.php";
class deliverycore {
	    function adddelivery($delivery)
        {  
		$sql="insert into deliverytab (date,id_client,num_tel,address,status) values (:date,:id_client,:num_tel,:address,:status)";
		$db = config::getConnexion();
		try{
        $req=$db->prepare($sql);		
       
        $date=$delivery->getdate();
        $id_client=$delivery->getid_client();
        $num_tel=$delivery->getnum_tel();
        $address=$delivery->getaddress();
        $status=$delivery->getstatus();
		$req->bindValue(':date',$date);
		$req->bindValue(':id_client',$id_client);
        $req->bindValue(':num_tel',$num_tel);
        $req->bindValue(':address',$address);
        $req->bindValue(':status',$status);
		$req->execute();
        }
        catch (Exception $e){
            echo 'Erreur: '.$e->getMessage();
        }
	    }
        function stats($id_client,$id_product,$date_delivery)
        {
         $sql="insert into booktab (id_client,id_product,date_delivery) values (:id_client,:id_product,:date_delivery)";
        $db = config::getConnexion();
        try{
        $req=$db->prepare($sql);        
        $req->bindValue(':id_client',$id_client);
        $req->bindValue(':id_product',$id_product);
        $req->bindValue(':date_delivery',$date_delivery);
        $req->execute(); 
           }
        catch (Exception $e){
            echo 'Erreur: '.$e->getMessage();
               }
        }
	function display()
	{
        $db = config::getConnexion();
		$stmt = $db->query("SELECT * FROM deliverytab");
    while ($row = $stmt->fetch()) 
    {
	echo '<table border="1" >';
    echo '<tr>';
    echo '<td>'.$row['id'].'</td>';
    echo '<td>'.$row['date_del'].'</td>';
    echo '<td>'.$row['id_client'].'</td>';
    echo '</tr>';
    echo '</table>';
    }
	}
    function displaydeliveries()
    {
      $sql="SELECT * From deliverytab";
        $db = config::getConnexion();
        try{
        $list=$db->query($sql);
        return $list;
        }
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }   
    }
	function deletedelivery($id)
        {
		$sql="DELETE FROM deliverytab where id= :id";
		$db = config::getConnexion();	
		try{
                    $req=$db->prepare($sql);
                        $req->bindValue(':id',$id);
                    $req->execute();  
                   }
        catch (Exception $e)
        {
            die('Erreur: '.$e->getMessage());
        }
	}

	function searchdelivery($id)
	{

		$db = config::getConnexion();	
		$stmt = $db->prepare("SELECT * FROM deliverytab where id=:id");
		$stmt->execute(['id' => $id]); 
while ($row = $stmt->fetch()) {
	echo "delivery=";
    echo $row['id']."<br />\n";
   // echo "types of products=";
    echo $row['date_del']."<br />\n";
    echo $row['id_client']."<br />\n";
    echo $row['id_product']."<br />\n";
       }
	}
    function searchclient($id_client)
    {

        $db = config::getConnexion();
                $stmt = $db->prepare("SELECT * FROM clients");
        $stmt->execute(['id' => $id]); 
while ($row = $stmt->fetch()) {
    echo "delivery=";
    echo $row['id_client']."<br />\n";
   if($row['id_client']==$id_client)
   {
    return 1;
   }
 return -1;  
}   
   }
    function searchproduct($id_product)
    {

        $db = config::getConnexion();
                $stmt = $db->prepare("SELECT * FROM products");
        $stmt->execute(['id_product' => $id_product]); 
while ($row = $stmt->fetch()) {
    echo "delivery=";
    echo $row['id_product']."<br />\n";
   if($row['id_product']==$id_client)
   {
    return 1;
   }
 return -1;  
}   
   }
    function updatedelivery($status,$id)
    {
        $sql="UPDATE deliverytab SET  status = :status  WHERE id= :id";
        $db = config::getConnexion();
        try{
             $req=$db->prepare($sql);
             $req->bindValue(':id',$id);
              $req->bindValue(':status',$status);
             $req->execute();
        }
        catch (Exception $e){
            echo 'Erreur: '.$e->getMessage();
        }
    }
        
    }
    class delivery
{
    protected $id;
    protected $date;
    protected $id_client;
    protected $address;
    protected $num_tel;
    protected $status;

    
    function __construct($date,$id_client,$address,$num_tel,$status)
        {
        //$this->id=$id;
        $this->date=$date;
        $this->id_client=$id_client;
        $this->address=$address;
        $this->num_tel=$num_tel;
        $this->status=$status;
        }
    function getid(){
        return $this->id;
    }
    function getid_client(){
        return $this->id_client;
    }
    function getdate(){
        return $this->date;
    }
    function getaddress()
    {
        return $this->address;
    }
    function getnum_tel()
    {
        return $this->num_tel;
    }
    function getstatus()
    {
        return $this->status;
    }
    function setid($id){
        $this->id=$id;
    }
    function setdate($date){
        $this->date=$date;
    }

}
    class commandcore{
        function bookadelivery($id_client,$num_tel,$address,$date_delivery)
        { 
           $sql="insert into commandes (id_client,num_tel,address,date_delivery) values (:id_client,:num_tel,:address,:date_delivery)";
        
        $db = config::getConnexion();
        try{
        $req=$db->prepare($sql);            
        $req->bindValue(':id_client',$id_client);
         $req->bindValue(':num_tel',$num_tel);
         $req->bindValue(':address',$address);
         $req->bindValue(':date_delivery',$date_delivery);
        $req->execute();
        $status=0;
        $classdelivery=new delivery($date_delivery,$id_client,$address,$num_tel,$status);
$deliverycore1=new deliverycore();
$deliverycore1->adddelivery($classdelivery);
        }
        catch (Exception $e){
            echo 'Erreur: '.$e->getMessage();
        }
        
    }
}
?>