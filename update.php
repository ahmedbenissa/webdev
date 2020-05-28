<?php
class supplier
{
	protected $id_supplier;
        protected $name;
	protected $address;
	protected $login;
        protected $password;
	function __construct($id_supplier,$address,$name,$login,$password)
	    {
		$this->id_supplier=$id_supplier;
		$this->address=$address;
                $this->name=$name;
		$this->login=$login;
                $this->password=$password;
      	}
	function getid_supplier(){
		return $this->id_supplier;
	}
	function setid_supplier($id_supplier){
		$this->id_supplier=$id_supplier;
	}
	function getlogin(){
		return $this->login;
	}
        function setlogin($login){
		$this->login=$login;
	}
        function getpassword(){
		return $this->password;
	}
        function setpassword($login){
		$this->login=$login;
	}
	function setaddress($address){
		$this->address=$address;
	}
	function getaddress(){
		return $this->address;
	}
        function setname($name){
		$this->name=$name;
	}
	function getname(){
		return $this->name;
	}
 	}
include "classsuppliercore.php";


$classsupplier1=new supplier($_POST['id_supplier'],$_POST['address'],$_POST['name'],$_POST['login'],$_POST['password']);
$classsuppliercore1=new classsuppliercore();

$classsuppliercore1->updatesupplier($classsupplier1);

?>