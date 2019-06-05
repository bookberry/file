<?php
	require_once "connect_DB.php";	

	$error = false;
	$nextButton = false;
	
	if (!array_key_exists("page", $_GET)) $page = 1;
	else $page = $_GET['page'];

	$lost = ($page - 1) * BOOKONPAGE;

	if (array_key_exists("authorId", $_GET))
	{
		$authors = getAuthorsById(array($_GET['authorId']));

		if (!empty($authors))
		{
			$books = getBooks("	SELECT BOOKS.ID FROM BOOKS
								LEFT JOIN BOOKS_AUTHORS ON BOOKS.ID = BOOKS_AUTHORS.BOOK_ID
								WHERE BOOKS_AUTHORS.AUTHOR_ID = ".$_GET['authorId']."LIMIT ".$lost.','.(BOOKONPAGE+1)
							 );

			if (isset($books[BOOKONPAGE])) 
			{
				$nextButton = true;
				unset($books[BOOKONPAGE]);
			}

			$nextPage = "show_books.php?authorId=".$_GET['authorId']."&page=".($page + 1);
			$prevPage = "show_books.php?authorId=".$_GET['authorId']."&page=".($page - 1);
			
			$title = "Книги ".$authors[0]->getName();
		}
		else
		{
			$error = true;
		}
	}
	else if (array_key_exists("tag", $_GET))
	{
		$books = getBooks('	SELECT BOOKS.ID FROM BOOKS
							LEFT JOIN BOOKS_TAGS ON BOOKS.ID = BOOKS_TAGS.BOOK_ID
							LEFT JOIN TAGS ON TAGS.ID = BOOKS_TAGS.TAG_ID
							WHERE TAGS.NAME = "'.$_GET['tag'].'"'.'LIMIT '.$lost.','.(BOOKONPAGE+1) );

		if (isset($books[BOOKONPAGE])) 
		{
			$nextButton = true;
			unset($books[BOOKONPAGE]);
		}

		$nextPage = "show_books.php?tag=".$_GET['tag']."&page=".($page + 1);
		$prevPage = "show_books.php?tag=".$_GET['tag']."&page=".($page - 1);

		$title = "Книги по тегу";
	}
	else if (array_key_exists("forbusiness", $_GET))
	{
		$books = getBooks('	SELECT BOOK_ID AS ID FROM BUSINESSTOP
							ORDER BY STAGE LIMIT '.$lost.','.(BOOKONPAGE+1) );

		if (isset($books[BOOKONPAGE])) 
		{
			$nextButton = true;
			unset($books[BOOKONPAGE]);
		}

		$nextPage = "show_books.php?forbusiness&page=".($page + 1);
		$prevPage = "show_books.php?forbusiness&page=".($page - 1);

		$title = "Книги по бизнесу";		
	}
	else
	{
		$error = true;
	}

	
	require_once "head.php";
?>

<div id="content">

	<?php
		if ($error) 
		{
			echo '<p align = "center"> Ошибка </p>';
			exit;
		}
		
	?>

	<table class = "table_book_info" cols = "2" width="50%">
		<?php
			foreach ($books as $book) 
			{
				echo "<tr>";
				echo '<td width = "30%"><img src = "'.$book->getImage().'"><a href = "'.$book->getFile().'"><h3 align = "center">Скачать/Читать</h3></a></td>';
				echo '<td><h3 align = "center">'.$book->getName().'</h3>';
				echo '<p>Авторы: '.$book->getStrAuthors(',').'</p>';
				echo '<p>Жанры: '.$book->getStrGenres(',').'</p>';
				echo '<p>Описание: '.$book->getDiscription().'</p>';
				echo '</td>';
				echo "</tr>";
			}
		
		?>
	</table>


	<?php
		echo '<ul class="navigator">';
		if ($nextButton)	echo '<li><a href = "'.$nextPage.'"> На следующую </a></li>';
		if ($page > 1)		echo '<li><a href = "'.$prevPage.'"> На предыдущую </a></li>';
		echo '</ul>';
	?>

</div>


 <?php
	mysqli_close($link);
	require_once "footer.php";
 ?> 