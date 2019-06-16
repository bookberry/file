<div id="sidebar2">
	<h3>Топ 10 книг по бизнесу:</h3>

	<table class="table_book_info" cols="2" width="100%">
		<?php
		$books2 = getBooks('SELECT BOOK_ID AS ID FROM BUSINESSTOP');
		$i = 1;

		foreach ($books2 as $book) {
			if ($i == 4) break;
			echo "<tr>";
			echo '<td width = "3%">' . $i . '</td>';
			echo '<td width = "30%"><img src = "' . $book->getImage() . '"></td>';
			echo '<td>' . $book->getName() . '<p>' . mb_strimwidth($book->getDiscription(), 0, 100, "...", "UTF-8") . '</p></td>';
			echo "</tr>";
			$i++;
		}

		?>
	</table>

	<a href="show_books.php?forbusiness" style="color: white">Заинтересовались? Показать полностью...</a>

</div>