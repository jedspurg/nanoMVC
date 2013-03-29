<?php
class Post extends Model{
	
	public function addPost($data){
		
		$sql='INSERT INTO posts (title,content,categoryID,date) VALUES (?,?,?,?)'; 
		$this->db->execute($sql,$data);
		
		$message = 'Post added.';
		return $message;
		
	}

	public function updatePost($data){
		
		//post model method for updating a database table
		$sql='UPDATE posts SET title=?, content=?, categoryID=?, date=? WHERE pID=?'; 
		
		$this->db->execute($sql,$data);
		
		$message = 'Post updated.';
		return $message;
		
	}
	
	
}