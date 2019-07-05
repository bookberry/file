<?php 
	require_once "connect_DB.php";

	if (!array_key_exists("authorId", $_GET)) invalid_urlParam('authorId', $_GET['authorId']);
	$authorId = $_GET['authorId'];

	$authors = getAuthorsById(array($authorId));
	if (empty($authors)) 
		invalid_urlParam('authorId', $_GET['authorId']);

	$author = $authors[0];

	/* Узнаем кол-во книг автора и кол-во страниц */
	$sqlResult = mysqli_query($link, "SELECT COUNT(BOOKS.ID) FROM BOOKS
		LEFT JOIN BOOKS_AUTHORS ON BOOKS.ID = BOOKS_AUTHORS.BOOK_ID
		WHERE BOOKS_AUTHORS.AUTHOR_ID = ".$authorId);
	$row = $sqlResult->fetch_assoc();
	$countBooks = $row['COUNT(BOOKS.ID)'];
	$countPages = ceil($countBooks/BOOKONPAGE);

	/* узнаем текущую страницу */
	if (!is_numeric($_GET['page'])) $page = 1;
	else $page = $_GET['page'];

	if (($page > $countPages) && ($page != 1)) invalid_urlParam('page', $_GET['page']);

	/* расчет сколько книг нужно пропустить в запросе */
	$lost = ($page - 1) * BOOKONPAGE;

	$books = getBooks("	SELECT BOOKS.ID FROM BOOKS
		LEFT JOIN BOOKS_AUTHORS ON BOOKS.ID = BOOKS_AUTHORS.BOOK_ID
		WHERE BOOKS_AUTHORS.AUTHOR_ID = ".$authorId." LIMIT ".$lost.','.(BOOKONPAGE)
	);   

	/* Определяем есть ли следующая страница */
	if (($page + 1) > $countPages) $nextPage = false;
	else $nextPage = true;

	
	require_once "head.php";
?>
<div id="content">
	<div style = "padding: 10px">
		<img src="<?php  echo $author->getImage(); ?>" style="float: left; width: 350px; height: 350px">
		
		<h1><?php echo $author->getName(); ?></h1>

		<?php
			$characters = array(
				"birthday"		=> 	array("mark" => "Родился", 			"value" => $author->birthDay),
				"birthplace"	=> 	array("mark" => "Место рождения",	"value" => $author->birthPlace),
				"citizeship"	=> 	array("mark" => "Гражданство",		"value" => $author->citizeShip),
				"job" 			=> 	array("mark" => "Деятельность",		"value" => $author->job),
				"genre"			=> 	array("mark" => "Жанры",			"value" => $author->genre),
				"direction"		=> 	array("mark" => "Направление",		"value" => $author->direction),
				"language"		=> 	array("mark" => "Языки",			"value" => $author->language),
				"deathday"		=> 	array("mark" => "Умер",				"value" => $author->deathDay),
				"description"	=>	array("mark" => "Описание",			"value" => $author->description),
			);

			foreach ($characters as $key => $value) 
			{
				$val  = $value["value"];
				if ($val)
				{
					$mark = $value["mark"];
					echo "<p>$mark: $val</p>";					
				}
			}

		?>
	</div>

	
	<h1>Книги автора</h1>
	<?php 
		if (empty($books)) echo "Книг нету пока";
		else require_once "showBooks.php";

		/* Кнопки навигации */
		echo '<ul class="navigator">';
		if ($page > 1)	echo '<li><a href = "books_of_author.php?authorId='.$authorId.'&page='.($page - 1).'"> На предыдущую </a></li>';

		if ($nextPage) echo '<li><a href = "books_of_author.php?authorId='.$authorId.'&page='.($page + 1).'"> На следующую </a></li>';
		echo '</ul>';
	?>	

</div>
<?php
	require_once "footer.php";
	mysqli_close($link);	
?>