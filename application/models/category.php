<?php
class Category extends Model{
	
	
		
	public function getAllCategories(){
	
		
		$sql =  'SELECT * FROM categories';
		
		// perform query
		$results = $this->db->execute($sql);
		
		while ($row=$results->fetchrow()) {
			$categories[] = $row;
		}

		return $categories;
	
	}
	
	static function getCategoryValue($catID){
		$cat = new Category();
		
		$sql =  'SELECT * FROM categories WHERE categoryID = ?';
		
		// perform query
		$results = $cat->db->getrow($sql, array($catID));
		
		$cat = $results['name'];
	
		return $cat;
		
	}
	
	
	
}