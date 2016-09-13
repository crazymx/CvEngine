<?php

class Exp{
	private $_expid;
	private $_startDate;
	private $_endDate;
	private $_company;
	private $_desc;



	public function __construct(){

	}


	private function hydrate(array $data){
		foreach($data as $key => $value){
			$method = 'set'.ucfirst($key);

			if(method_exists(($this), $method)){
				$this->$method($value);
			}
		}

	}


	//getters
	public function expid(){ return $this->_expid; }
	public function startDate(){ return $this->_startDate; }
	public function endDate(){ return $this->_endDate; }
	public function company(){ return $this->_company; }
	public function desc(){ return $this->_desc; }


	//setters
	public function setExpid($expid){
		$this->_expid = $expid;
	}



}