<!DOCTYPE html>
<html lang="ru">

<head>
	<meta charset="utf-8" />
	<title><?= $title ?></title>
	<link rel="stylesheet" type="text/css" href="css/style.css" />
	<link rel="stylesheet" type="text/css" href="css/media-queries.css">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

	<script src="http://code.jquery.com/jquery-3.4.1.min.js" type="text/javascript" defer></script>
	<script src="js/sendForm.js" defer></script>
</head>

<body background="https://getbg.net/upload/full/www.GetBg.net_Nature___Flowers_Shopping_beautiful_peonies_066089_.jpg">
	<div id="wrapper">
		<div id="header">
			<img src="img/header.jpg">
		</div>
		<link href="https://fonts.googleapis.com/css?family=Amatic+SC&display=swap" rel="stylesheet">
		<table class="menu">
			<tr>
				<td width="5%"><button onclick="window.location='http://library'">Home</button></td>
				<td width="20%"><button onclick="window.location='show_books.php?tag=forall'">КНИГИ НА ВСЕ ВРЕМЕНА</button></td>
				<td width="20%"><button onclick="window.location='show_books.php?tag=forhim'">ДЛЯ НЕГО</button></td>
				<td>
					<form class="form-search" action="/search/" target="_blank">
						<input type="hidden" name="searchid" value="808327">
						<b><input style="width: 70%;border-bottom: 1px solid; font-size: 36px" type="search" name="text" required placeholder="Поиск"> </b>
						<input type="submit" value="🔍">
					</form>
				</td>
				<td width="20%"><button onclick="window.location='show_books.php?tag=forher'">ДЛЯ НЕЁ</button></td>
				<td width="20%"><button>ЦИТАТЫ</button></td>
			</tr>
		</table>
		<div id="sidebar1">
			<h3 style="font-size: 36px">На нашем сайте:</h3>
			<p style="font-size: 26px"><a href="show_books.php?tag=">&bull;<b>Отечественные произведения</b></a></p>
			<p style="font-size: 26px"><a href="show_books.php?tag=">&bull;<b>Зарубежнные книги</b></a></p>
			<p style="font-size: 26px"><a href="show_books.php?tag=">&bull;<b>Современные писатели</b></a></p>
		</div>
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
		<div id="content"></div>

		<div class="sendBlock">
			<button onclick="showhide('#sform')" style="border-radius: 10px 10px 0px 0px" class="btn btn-success">Написать нам письмо</button>
			<div id="sform" style="background-color: brown; padding: 20px">
				<form name="sform" action="send.php" method="post" onsubmit="return validateAndSubmit();">
					<input type="email" name="email" placeholder="Введите свой email" class="form-control"><br>
					<textarea name="message" placeholder="Текст" class="form-control" rows="10"></textarea><br>
					<button name="send" class="btn btn-success">Отправить</button>
				</form>
			</div>
		</div>

		<a href="#" class="back-to-top"></a>
		<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
		<script src="js/button_script.js"></script>
