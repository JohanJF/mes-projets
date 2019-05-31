<?php 

class model_accueil extends Model {

	public function getBooks(){
		$books = $this->select_req('SELECT * FROM books');
		return $books;
	}

}

 ?>