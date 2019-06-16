<?php 
	require_once "connect_DB.php";
	$authors = getAuthorsById(array($_GET['authorId']));
	if (empty($authors)) 
	{
		echo "<script>document.location.href = \"http://".$_SERVER['SERVER_NAME']."\";</script>";
		exit;
	}
	$authorName = $authors[0]->getName();
	$authorImage = $authors[0]->getImage();

	require_once "head.php";
?>
<div id="content">
	<div style = "">
		<img style = "float: left; height: 100%" src = <?php  echo "\"$authorImage\""; ?> >
		<h1><?php echo "$authorName"; ?></h1>
		<p>Родился:		<?php echo ""; ?></p>
		<p>Вырос:		<?php echo ""; ?></p>
		<p>Гражданство: <?php echo ""; ?></p>
		<p>Возраст:		<?php echo ""; ?></p>
		<p>Умер:		<?php echo ""; ?></p>
		<p>Описание:	Lorem ipsum dolor sit amet, consectetur adipisicing elit. Magni aut quis cum sed, facere, atque dolorum, ipsam delectus quidem iure fuga deleniti dolorem explicabo? Sed, repellat ipsa maxime? Officia voluptate voluptatibus, maiores. Amet beatae architecto odio iure minima cum soluta voluptate praesentium velit? Dignissimos distinctio possimus ut fuga sunt porro repellat, voluptas doloremque sed. Ullam perspiciatis debitis consequuntur dolorum, possimus sequi quibusdam at iure cum harum, totam aliquam accusamus nam eaque quidem libero repellat, nemo iste consectetur voluptatum hic quia necessitatibus quisquam reprehenderit iusto! Officia est deleniti accusamus ab accusantium iusto dolorum modi nesciunt, vitae voluptate, deserunt eius facere voluptatem!Lorem ipsum dolor sit amet, consectetur adipisicing elit. Doloribus dignissimos quas asperiores, fugiat non officiis, vitae illo odit maiores ad rem tenetur reiciendis fugit eligendi quibusdam eius deleniti magnam hic.Lorem ipsum dolor sit amet, consectetur adipisicing elit. Maxime id aliquid repellendus necessitatibus consequuntur atque voluptas dolores odit explicabo sequi at distinctio cumque a, architecto neque quisquam quas aspernatur minima. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Non officiis dolorum excepturi, hic quis voluptatibus neque cum reiciendis ut autem in, laudantium provident, maxime assumenda illum ratione, porro eaque voluptatem.<?php echo ""; ?></p>
	</div>

	<h1>Книги автора</h1>

	<?php 
		/* Расчет кол-ва книг которые будут пропущены по запросу */
		if (!array_key_exists("page", $_GET)) $page = 1;
		else $page = $_GET['page'];
		$lost = ($page - 1) * BOOKONPAGE;

		/* Ищем на 1 книгу больше чем показывается на странице для определения существования следующей страницы */

		$books = getBooks("	SELECT BOOKS.ID FROM BOOKS
							LEFT JOIN BOOKS_AUTHORS ON BOOKS.ID = BOOKS_AUTHORS.BOOK_ID
							WHERE BOOKS_AUTHORS.AUTHOR_ID = ".$_GET['authorId']." LIMIT ".$lost.','.(BOOKONPAGE+1)
							 );					

		if (empty($books)) 
		{
			echo "К сожалению книг данного автора еще нет на сайте, постараемся вскоре добавить.";
		}
		else
		{
			/* Определяем есть ли следующая страница */
			$nextButton = false;

			if (isset($books[BOOKONPAGE])) 
			{
				$nextButton = true;
				unset($books[BOOKONPAGE]);
			}

			/* Вывод книг */
		
			require_once "showBooks.php";


			/* Кнопки навигации */

			echo '<ul class="navigator">';
			if ($page > 1)	echo '<li><a href = "books_of_author.php?authorId='.$_GET['authorId'].'&page='.($page - 1).'"> На предыдущую </a></li>';

			if ($nextButton) echo '<li><a href = "books_of_author.php?authorId='.$_GET['authorId'].'&page='.($page + 1).'"> На следующую </a></li>';
			echo '</ul>';
		}
		
	?>	

</div>
<?php
	require_once "footer.php";
	mysqli_close($link);	
?>