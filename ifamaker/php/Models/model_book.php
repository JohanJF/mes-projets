<?php 

class model_book extends Model {

	function getBook($bookID) {
		
		$book = $this->select_req('SELECT title,date,resume
				FROM books
				WHERE book_id=?', [$bookID]);

		return $book->fetch();
	}

function getAuthor($bookID) {

		$author = $this->select_req('SELECT name
			FROM Authors
			INNER JOIN books ON Books.author_id = Authors.author_id
			WHERE book_id=?', [$bookID]);

		return $author->fetch();
	}

}

 ?>