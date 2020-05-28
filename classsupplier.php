<?php
class supplier
{
	protected $name;
	protected $productstype;
	protected $address;
	
	function __construct($name,$productstype,$address)
	    {
		$this->name=$name;
		$this->productstype=$productstype;
		$this->address=$address;
      	}
	function getname(){
		return $this->name;
	}
	function setname($name){
		$this->name=$name;
	}
	function getproductstype(){
		return $this->productstype;
	}
	function setproductstype($productstype){
		$this->productstype=$productstype;
	}
	function getaddress(){
		return $this->address;
	}
	function setaddress($address){
		$this->address=$address;
	}
}
?>