<?php

class Book
{
	private $name;
	private $authors = array();
	private $genres = array();
	private $image = 'img/cat.jpg';
	private $file;
	private $id;
	private $discription;

	function getDiscription()
	{
		return $this->discription;
	}

	function setDiscription($discription)
	{
		$this->discription = $discription;
	}

	function setId($id)
	{
		$this->id = $id;
	}

	function getId()
	{
		return $this->id;
	}	

	function setFile($file)
	{
		$this->file = $file;
	}

	function getFile()
	{
		return $this->file;
	}

	function setName($name)
	{
		$this->name = $name;
	}

	function getName()
	{
		return $this->name;
	}

	function addAuthor($author)
	{
		if (!in_array($author, $this->authors) && ($author != ''))
		{
			$this->authors[] = $author;
		}
	}

	function getAuthors()
	{
		return $this->authors;
	}

	function addGenre($genre)
	{
		if (!in_array($genre, $this->genres) && ($genre != ''))
		{
			$this->genres[] = $genre;
		}
	}

	function getGenres()
	{
		return $this->genres;
	}		

	function setImage($image)
	{	
		if (file_exists($image))
		{
			$this->image = $image;
		}
	}

	function getImage()
	{
		return $this->image;
	}

	function testPrint()
	{
		echo $this->name.' authors( ';
		foreach ($this->authors as $element) 
		{
			echo $element.' ';
		}
		echo ') genres( ';
		foreach ($this->genres as $element) 
		{
			echo $element.' ';
		}
		echo ').';
	}

	function getStrAuthors($sign)
	{
		return implode($sign, $this->authors);
	}

	function getStrGenres($sign)
	{
		return implode($sign, $this->genres);
	}	

}

class Author
{
	private $id;
	private $name;
	private $image = 'https://im0-tub-ru.yandex.net/i?id=dabc0b838c62f3a1b339010b40ced4fd&n=13';

	function setId($id)
	{
		$this->id = $id;
	}

	function getId()
	{
		return $this->id;
	}	

	function setName($name)
	{
		$this->name = $name;
	}

	function getName()
	{
		return $this->name;
	}

	function setImage($image)
	{	
		if ($image != '')
			$this->image = $image;
	}

	function getImage()
	{
		return $this->image;
	}

	function testPrint()
	{
		echo $this->name.' '.$this->image.'<br>'; 
	}
}
	
function connect_DB($host, $user, $pass, $namedb)
{
	
        $link = mysqli_connect($host, $user, $pass, $namedb);
	if (mysqli_connect_errno())
	{
		echo "Не удалось подключится к базе данных <br>";
		echo "Подробности: "."(".mysqli_connect_errno().") ".mysqli_connect_error();
		exit;
	}	

	mysqli_query($link, "SET NAMES 'utf8'");
	return $link;
}

function getAuthorsById($id)
{
	global $link;

	$authors = array();

	if (empty($id)) return $authors;

	$sql = 'SELECT * FROM AUTHORS
			WHERE AUTHORS.ID IN ('.implode(',',$id).') ';

	$sqlResult = mysqli_query($link, $sql);

	if ($sqlResult)
	{
		while ($row = $sqlResult->fetch_assoc())
		{
			$author = new Author;
			$author->setName($row['NAME']);
			$author->setImage($row['IMAGE']);
			$author->setId($row['ID']);
			$authors[] = $author;
		}

	}

	return $authors;
}

function getAuthors($sql)
{
	global $link;

	$sqlResult = mysqli_query($link, $sql);

	$booksId = array();

	if ($sqlResult)
	{
		while ($row = $sqlResult->fetch_assoc())
		{
			$booksId[] = $row['ID'];
		}		

		return getAuthorsById($booksId);
	}
	else
	{
		return array();
	}
	
}


function getBooksById($id)
{
	$books = array();

	if (empty($id)) return $books;

	global $link;

	$sql = 'SELECT BOOKS.*, AUTHORS.NAME AS AUTHOR, GENRES.NAME AS GENRE FROM BOOKS
    		LEFT JOIN BOOKS_AUTHORS ON BOOKS.ID = BOOKS_AUTHORS.BOOK_ID
    		LEFT JOIN AUTHORS ON AUTHORS.ID = BOOKS_AUTHORS.AUTHOR_ID
    		LEFT JOIN BOOKS_GENRES ON BOOKS.ID = BOOKS_GENRES.BOOK_ID
    		LEFT JOIN GENRES ON GENRES.ID = BOOKS_GENRES.GENRE_ID
    		WHERE BOOKS.ID IN ('.implode(',',$id).') 
    		ORDER BY BOOKS.ID';	

    $sqlResult = mysqli_query($link, $sql);

    $row = $sqlResult->fetch_assoc();

    while ($row)
    {
    	$curId = $row['ID'];
    	$book = new Book;
    	$book->setName($row['NAME']);

    	do
    	{
    	  $book->addAuthor($row['AUTHOR']);
    	  $book->addGenre($row['GENRE']);
    	  $book->setFile($row['FILE']);
    	  $book->setId($row['ID']);
    	  $book->setDiscription($row['DISCRIPTION']);
    	  $row = $sqlResult->fetch_assoc();
    	} while ($row && ($curId == $row['ID']));

    	$books[] = $book;
    }

    return $books;
}

function getBooks($sql)
{
	global $link;

	$sqlResult = mysqli_query($link, $sql);

	$booksId = array();

	if ($sqlResult)
	{
		while ($row = $sqlResult->fetch_assoc())
		{
			$booksId[] = $row['ID'];
		}		

		return getBooksById($booksId);
	}
	else
	{
		return array();
	}
	
}

/* кол-во книг на странице */
define("BOOKONPAGE", "24");

/* кол-во авторов на странице */
define("AUTHORSONPAGE", "24");

$link = connect_DB("localhost", "root", "", "lib");

?>
