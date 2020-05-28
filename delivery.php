<?php
class delivery
{
	protected $id;
	protected $date;
	protected $id_client;
	protected $id_prouduct;
	
	function __construct($id,$date,$id_prouduct,$id_client)
	    {
		$this->id=$id;
		$this->date=$date;
		$this->id_client=$id_client;
		$this->id_product=$id_product;
      	}
	function getid(){
		return $this->name;
	}
	function getid_client(){
		return $this->id_client;
	}
	function getid_product(){
		return $this->id_product;
	}
	function getdate(){
		return $this->date;
	}
	function setid($id){
		$this->id=$id;
	}
	function setdate($date){
		$this->date=$date;
	}

}
?>