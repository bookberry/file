<table class = "table_book_info" cols = "2">
	<?php
		foreach ($books as $book):
	?>

	<tr>
		<td width = "30%">
			<img src =	<?php echo '"'.$book->getImage().'"';	?> >
			<a href =	<?php echo '"'.$book->getFile().'"';	?> >
				<h3 align = "center">
					Скачать/Читать
				</h3>
			</a>
		</td>

		<td>
			<h3 align = "center"><?php echo $book->getName();?> </h3>
			<p>Авторы: 		<?php echo $book->getStrAuthors(',');	?> </p>
			<p>Жанры:		<?php echo $book->getStrGenres(',');	?> </p>
			<p>Описание:	<?php echo $book->getDiscription();		?> </p>
		</td>
	</tr>

	<?php
		endforeach;
	?>
</table>
