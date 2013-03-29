<?php
require_once('application/libraries/adodb5/adodb.inc.php');
class Model {
	
	protected $db;
	protected $table;
	
	public function __construct(){
		try{
			//ADOdb
			$this->db = NewADOConnection('mysql');
			$this->db->connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);
		} catch (exception $e){
			echo 'Connection failed: ' . $e->getMessage();
		}
		$this->table = strtolower(get_class($this)).'s';
	}

	public function create($data){

	}

	public function delete($id){

	}

	public function update($data){

	}

  public function getOne($id){
  	$sql =  'SELECT * FROM '.$this->table.' WHERE id = ?';
		// perform query
		$result = $this->db->getrow($sql, array($id));
		return $result;
  }

  public function getAll(){
		$sql =  'SELECT * FROM '.$this->table;
		// perform query
		$results = $this->db->execute($sql);
		while ($row=$results->fetchrow()) {
			$items[] = $row;
		}
		return $items;
  }

  public function getSome($limit = 0, $offset = 0){
  	if($limit > 0){ $num = ' LIMIT '.$offset.', '.$limit;}
		$sql =  'SELECT * FROM '.$this->table.$num;
		// perform query
		$results = $this->db->execute($sql);
		while ($row=$results->fetchrow()) {
			$items[] = $row;
		}
		return $items;
  }


}
