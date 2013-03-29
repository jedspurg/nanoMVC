<?php
class Category extends Model{
	
	static function getValue($id){	
    $category = new Category();
		$sql =  'SELECT * FROM categories WHERE id = ?';
		// perform query
		$results = $category->db->getrow($sql, array($id));
		$cat = $results['name'];
		return $cat;
	}
	
}