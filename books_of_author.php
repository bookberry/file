<?php 
	require_once "connect_DB.php";

	if (!array_key_exists("authorId", $_GET)) invalid_urlParam('authorId', $_GET['authorId']);
	$authorId = $_GET['authorId'];

	$authors = getAuthorsById(array($authorId));
	if (empty($authors)) 
		invalid_urlParam('authorId', $_GET['authorId']);

	$authorName = $authors[0]->getName();
	$authorImage = $authors[0]->getImage();

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

	if (($page > $countPages)) invalid_urlParam('page', $_GET['page']);

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
		<div style="float: left; background: url(<?php  echo "$authorImage"; ?>);background-size: 100% 100%; width: 300px;height: 300px">
			<img src="img/frame.png" width="100%" height="100%">
		</div>
		<h1><?php echo "$authorName"; ?></h1>
		<p>Родился:		<?php echo ""; ?></p>
		<p>Вырос:		<?php echo ""; ?></p>
		<p>Гражданство: <?php echo ""; ?></p>
		<p>Возраст:		<?php echo ""; ?></p>
		<p>Умер:		<?php echo ""; ?></p>
		<p>Описание:	<?php echo ""; ?></p>
	</div>

	
	<h1>Книги автора</h1>
	<?php 
		require_once "showBooks.php";

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