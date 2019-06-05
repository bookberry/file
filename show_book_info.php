<?php
	require_once "connect_DB.php";
	$link = connect_DB("localhost", "root", "", "lib");

	$sql = "SELECT BOOKS.*, AUTHORS.NAME AS AUTHOR	FROM BOOKS
			LEFT JOIN BOOKS_AUTHORS ON BOOKS.ID = BOOKS_AUTHORS.BOOK_ID
			LEFT JOIN AUTHORS ON AUTHORS.ID = BOOKS_AUTHORS.AUTHOR_ID
			WHERE BOOKS.ID =".$_GET['book_id'];
			
	$result = mysqli_query($link, $sql);	
	
	
	$title = $_GET['book_id'];
	require_once "head.php";

		
	$row = $result->fetch_assoc();
	
	if ($row) 
	{
		echo "Название: ".$row['NAME'].'<br>';
		echo "Издание: ".$row['EDITION_NUMBER'].'<br>';
		echo "Год издания: ".$row['EDITION_YEAR'].'<br>';
		echo "Авторы: ".$row['AUTHOR'].' ';
		
		while($row = $result->fetch_assoc())
		{
			echo $row['AUTHOR'].' ';
		}			
	}
	else
	{
		echo "Трындец! Книга отсутствует!";
	}
	

	mysqli_close($link);
	require_once "footer.php";
?>	