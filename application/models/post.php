<?php
class Post extends Model{
	
	function getPost($pID){
		
		$sql =  'SELECT * FROM posts WHERE pID = ?';
		
		// perform query
		$results = $this->db->getrow($sql, array($pID));
		
		$post = $results;
	
		return $post;
	
	}
		
	public function getAllPosts($limit = 0){
		
		if($limit > 0){
			
			$numposts = ' LIMIT '.$limit;
		}
		
		$sql =  'SELECT * FROM posts'.$numposts;
		
		// perform query
		$results = $this->db->execute($sql);
		
		while ($row=$results->fetchrow()) {
			$posts[] = $row;
		}

		return $posts;
	
	}
	
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