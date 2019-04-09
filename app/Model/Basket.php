<?php
class Basket extends AppModel
{
	public $name = 'Basket';
        
        public function getAuthor(){
            $query  = "SELECT author, COUNT(author) AS `count` FROM baskets  GROUP BY author ORDER BY `count` DESC  LIMIT 1";
            $author = $this->query($query);
            return  $author;
        }
        
        public function getBook(){
            $query  = "SELECT title, COUNT(author) AS `count` FROM baskets  GROUP BY title ORDER BY `count` DESC  LIMIT 1";
            $book = $this->query($query);
            return  $book;
        }
        
}
?>