<?php
	require_once "connect_DB.php";	

	$error = false;
	$nextButton = false;

	if (!array_key_exists("page", $_GET)) $page = 1;
	else $page = $_GET['page'];

	$lost = ($page - 1) * AUTHORSONPAGE;

	if (array_key_exists("tag", $_GET))
	{
		$authors = getAuthors('SELECT AUTHOR_ID AS ID FROM AUTHORS_TAGS
								LEFT JOIN TAGS ON AUTHORS_TAGS.TAG_ID = TAGS.ID
								WHERE TAGS.NAME = "'.$_GET['tag'].'"'.'LIMIT '.$lost.','.(AUTHORSONPAGE+1) );

		if (isset($authors[AUTHORSONPAGE])) 
		{
			$nextButton = true;
			unset($authors[AUTHORSONPAGE]);
		}

		$nextPage = "show_authors.php?tag=".$_GET['tag']."&page=".($page + 1);
		$prevPage = "show_authors.php?tag=".$_GET['tag']."&page=".($page - 1);

		$title = "Авторы";
	}
	else
	{
		$authors = getAuthors('SELECT ID FROM AUTHORS
							   LIMIT '.$lost.','.(AUTHORSONPAGE+1) );

		if (isset($authors[AUTHORSONPAGE])) 
		{
			$nextButton = true;
			unset($authors[AUTHORSONPAGE]);
		}

		$nextPage = "show_authors.php?page=".($page + 1);
		$prevPage = "show_authors.php?page=".($page - 1);

		$title = "Авторы";	
	}

	require_once "head.php";
	require_once "sideBar1.php";
	require_once "sideBar2.php";
?>


<div id = "content">
	<h3 align = "center">Авторы</h3>

		<table class = "table_authors" cols = "4">
			<?php
				$i = 0;

				foreach ($authors as $author) {
					if ($i % 4 == 0) echo '<tr>';

					echo '<td><a href = "books_of_author.php?authorId='.$author->getId().'"><img src = '.$author->getImage().'>'.$author->getName().'</a></td>';

					if ($i % 4 == 3) echo '</tr>';

					$i++;
				}

			?>
		</table>

<?php
	echo '<ul class="navigator">';
    if ($page > 1)		echo '<li><a href = "'.$prevPage.'"> На предыдущую </a></li>';	
    if ($nextButton)	echo '<li><a href = "'.$nextPage.'"> На следующую </a></li>';
    echo '</ul>';
?>
		
</div>



<?php
	require_once "footer.php";
	mysqli_close($link);
?>