<?php
include "connect.php";
class classsuppliercore {

	function addsupplier($supplier){
		$sql="insert into suppliertab (id_supplier,address,name,login,password) values (:id_supplier,:address,:name,:login,:password)";
		$db = config::getConnexion();
		try{
        $req=$db->prepare($sql);		
        $id_supplier=$supplier->getid_supplier();
        $address=$supplier->getaddress();
        $name=$supplier->getname();
        $login=$supplier->getlogin();
        $password=$supplier->getpassword();
		$req->bindValue(':id_supplier',$id_supplier);
		$req->bindValue(':address',$address);
        $req->bindValue(':name',$name);
		$req->bindValue(':login',$login);
        $req->bindValue(':password',$password);		
		 $req->execute();
        }
        catch (Exception $e){
            echo 'Erreur: '.$e->getMessage();
        }
	}
	function display()
	{
        $db = config::getConnexion();
		$stmt = $db->query("SELECT * FROM suppliertab");
while ($row = $stmt->fetch()) {
	echo '<table border="1" >';
    echo '<tr>';
    echo '<td>'.$row['name'].'</td>';
    echo '<td>'.$row['productstype'].'</td>';
    echo '<td>'.$row['address'].'</td>';
    echo '</tr>';
    echo '</table>';
       }
	}

	function deletesupplier($id_supplier)
        {
		$sql="DELETE FROM suppliertab where id_supplier= :id_supplier";
		$db = config::getConnexion();	
		try{
                    $req=$db->prepare($sql);
                        $req->bindValue(':id_supplier',$id_supplier);
                    $req->execute();  
                   }
        catch (Exception $e)
        {
            die('Erreur: '.$e->getMessage());
        }
	}
	function searchsupplier($name)
	{

		$db = config::getConnexion();	
		$stmt = $db->prepare("SELECT * FROM suppliertab where id_supplier=:id_supplier");
		$stmt->execute(['id_supplier' => $id_supplier]); 
while ($row = $stmt->fetch()) {
	echo "name of the supplier=";
    echo $row['name']."<br />\n";
    echo "types of products=";
    echo $row['productstype']."<br />\n";
    echo "address of the supplier=";
    echo $row['address']."<br />\n";
       }
	}
	function updatesupplier($supplier){
		$sql="UPDATE suppliertab SET  password = :password  WHERE id_supplier= :id_supplier";
		$db = config::getConnexion();
		try{
        $req=$db->prepare($sql);
         $password=$supplier->getpassword();
        $id_supplier=$supplier->getid_supplier();   
		$req->bindValue(':id_supplier',$id_supplier);
		$req->bindValue(':password',$password);
	        $req->execute();
        }
        catch (Exception $e){
            echo 'Erreur: '.$e->getMessage();
        }
	}
}
?>