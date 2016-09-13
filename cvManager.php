<?php

class CvManager{

	private $_db;

	/*
	private $_id;
	private $_name;
	private $_firstname;
	private $_dob;
	private $_address;
	private $_zipcode;
	private $_city;
	private $_country;
	private $_licence; 
	private $_hobbies;
	*/

	public function __construct($db){
		$this->setDb($db);
	}


	public function add(Cv $cv){
		$q = $this->_db->prepare('INSERT INTO cv(name, firstname, dob, address, zipcode, city, country, licence, hobbies) VALUES(:name, :firstname, :dob, :address, :zipcode, :city, :country, :licence, :hobbies)');

		$q->bindValue(':name', $cv->name());
		$q->bindValue(':firstname', $cv->firstname());
		$q->bindValue(':dob', $cv->dob());
		$q->bindValue(':address', $cv->address());
		$q->bindValue(':zipcode', $cv->zipcode());
		$q->bindValue(':city', $cv->city());
		$q->bindValue(':country', $cv->country());
		$q->bindValue(':licence', $cv->licence());
		$q->bindValue(':hobbies', $cv->hobbies());

		$q->execute();
	}

	
	

  	public function delete(Cv $cv)
	{
		$this->_db->exec('DELETE FROM cv WHERE cvID = '.$cv->id());
	}

  	public function getCv($id)
	{
	    $id = (int) $id;

	    $q = $this->_db->query('SELECT * FROM cv WHERE cvID = '.$id);
	    $data = $q->fetch(PDO::FETCH_ASSOC);

	    return new Cv($data);
	}

  	public function getList()
	{
	    $cvList = [];
	    $q = $this->_db->query('SELECT * FROM cv ORDER BY cvID');

	    while ($data = $q->fetch(PDO::FETCH_ASSOC))
	    {
	      $cvList[] = new Cv($data);
	    }

    return $cvList;

	}

  	public function update(Cv $cv)
	{
	    $q = $this->_db->prepare('UPDATE cv SET name = :name, firstname = :firstname, dob = :dob, address = :address, zipcode = :zipcode, city = :city, country = :country, licence = :licence, hobbies = :hobbies WHERE cvID = '.$cv->id());

	   	$q->bindValue(':name', $cv->name(), PDO::PARAM_INT);
		$q->bindValue(':firstname', $cv->firstname(), PDO::PARAM_INT);
		$q->bindValue(':dob', $cv->dob(), PDO::PARAM_INT);
		$q->bindValue(':address', $cv->address(), PDO::PARAM_INT);
		$q->bindValue(':zipcode', $cv->zipcode(), PDO::PARAM_INT);
		$q->bindValue(':city', $cv->city(), PDO::PARAM_INT);
		$q->bindValue(':country', $cv->country(), PDO::PARAM_INT);
		$q->bindValue(':licence', $cv->licence(), PDO::PARAM_INT);
		$q->bindValue(':hobbies', $cv->hobbies(), PDO::PARAM_INT);

	    $q->execute();
	}




	public function setDb(PDO $db){
		$this->_db = $db;
	}

}
?>