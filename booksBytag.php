<?php
	require_once "connect_DB.php";	
	require_once "head.php";
	
	$books = getBooks('	SELECT BOOKS.ID FROM BOOKS
						LEFT JOIN BOOKS_TAGS ON BOOKS.ID = BOOKS_TAGS.BOOK_ID
						LEFT JOIN TAGS ON TAGS.ID = BOOKS_TAGS.TAG_ID
						WHERE TAGS.NAME = "'.$_GET['tag'].'"');
?> 

<div id="content">
	<h3 align = "center">Книги</h3>

	<table class = "table_book_info" cols = "2" border = "1">
		<?php
			foreach ($books as $book) 
			{
				echo "<tr>";
				echo '<td width = "30%"><img src = "'.$book->getImage().'"></td>';
				echo '<td><h3 align = "center">'.$book->getName().'</h3>';
				echo '<p>Авторы: '.$book->getStrAuthors(',').'</p>';
				echo '<p>Жанры: '.$book->getStrGenres(',').'</p>';
				echo '</td>';
				echo "</tr>";
			}
		
		?>
	</table>

</div>


 <?php
	mysqli_close($link);
	require_once "footer.php";
 ?> 