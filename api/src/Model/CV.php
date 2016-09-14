<?php

class Cv{
	
	private $_cvid;
	private $_name;
	private $_firstname;
	private $_dob;
	private $_address;
	private $_zipcode;
	private $_city;
	private $_country;
	private $_phone;
	private $_licence; 
	private $_hobbies;


	
	//cstor
	public function __construct(array $data){
		$this->hydrate($data);
	}


	private function hydrate(array $data){

		foreach ($data as $key => $value) {
			$method = 'set'.ucfirst($key);

			if(method_exists(($this), $method)){
				$this->$method($value);
			}
		}

	}


	//getters
	public function cvid() { return $this->_cvid; }
	public function name() { return $this->_name; }
	public function firstname() { return $this->_firstname; }
	public function dob() { return $this->_dob; }
	public function address() { return $this->_address; }
	public function zipcode() { return $this->_zipcode; }
	public function city() { return $this->_city; }
	public function country() { return $this->_country; }
	public function phone() { return $this->_phone; }
	public function licence() { return $this->_licence; }
	public function hobbies() { return $this->_hobbies; }


	//setters	
	public function setCvid($id){ 
		$this->_cvid = (int) $id;
	}
	public function setName($name){ 
		if(is_string($name) && strlen($name) <= 20){
			$this->_name = $name;
		}
	}
	public function setFirstname($firstname){ $this->_firstname = $firstname; }
	public function setDob($dob){ $this->_dob = $dob; }
	public function setAddress($address){ $this->_address = $address; }
	public function setZipcode($zipcode){ $this->_zipcode = $zipcode; }
	public function setCity($city){ $this->_city = $city; }
	public function setCountry($country){ $this->_country = $country; }
	public function setPhone($phone){ $this->_phone = $phone; }
	public function setLicence($licence){ $this->_licence = $licence; }
	public function setHobbies($hobbies){ $this->_hobbies = $hobbies; }


	public function show(){
		echo '===cv=== <br/>';
		echo 'id: ' . $this->_cvid . '<br/>';
		echo 'name: ' . $this->_name . '<br/>';
		echo 'firstname: ' . $this->_firstname . '<br/>';
		echo 'dob: ' . $this->_dob . '<br/>';
		echo 'address: ' . $this->_address . '<br/>';
		echo 'city: ' . $this->_city . '<br/>';
		echo '<br/>';
	}



}


?>