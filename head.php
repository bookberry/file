<!DOCTYPE html> 
<html lang="ru"> 
<head> 
	<meta charset="utf-8" /> 
	<title><?=$title?></title> 
	<link rel="stylesheet" type="text/css" href="style.css"/> 
</head> 

<body background="https://getbg.net/upload/full/www.GetBg.net_Nature___Flowers_Shopping_beautiful_peonies_066089_.jpg"> 
	<div id="wrapper"> 

		<div id="header"></div>  
			
		<link href="https://fonts.googleapis.com/css?family=Amatic+SC&display=swap" rel="stylesheet">

		<table class = "menu"> 
			<tr> 
				<td width = "5%"><button onclick="window.location='http://library'">Home</button></td> 
				<td width = "20%"><button onclick="window.location='show_books.php?tag=forall'">КНИГИ НА ВСЕ ВРЕМЕНА</button></td> 
				<td width = "20%"><button onclick="window.location='show_books.php?tag=forhim'">ДЛЯ НЕГО</button></td> 

				<td align = "center"> 
					<form class="form-search" action="/search/" target="_blank"> 
						<input type="hidden" name="searchid" value="808327"> 
						<b><input style = "width: 70%;border-bottom: 1px solid;" style="font-size: 36px" type="search" name="text" required placeholder="Поиск"> </b>
						<input type="submit" value="🔍">  
					</form> 
				</td> 

				<td width = "20%"><button onclick="window.location='show_books.php?tag=forher'">ДЛЯ НЕЁ</button></td> 
				<td width = "20%"><button>ЦИТАТЫ</button></td> 
			</tr> 
		</table>

		

		<div id="sidebar1" style = "float: left"> 
			<h3 style="font-size: 36px">На нашем сайте:</h3> 
			<p style="font-size: 26px"><a href="show_books.php?tag=">&bull;<b>Отечественные произведения</b></a></p> 
			<p style="font-size: 26px"><a href="show_books.php?tag=">&bull;<b>Зарубежнные книги</b></a></p> 
			<p style="font-size: 26px"><a href="show_books.php?tag=">&bull;<b>Современные писатели</b></a></p>  
		</div> 

		<div id = "sidebar2" style = "float: right">
			<h3 align = "center">Топ 10 книг по бизнесу:</h3>

			<table class = "table_book_info" cols = "2" width="100%">
				<?php
					$books2 = getBooks('SELECT BOOK_ID AS ID FROM BUSINESSTOP');
					$i = 1;

					foreach ($books2 as $book) 
					{
						if ($i == 4) break;
						echo "<tr>";
						echo '<td width = "3%">'.$i.'</td>';
						echo '<td width = "30%"><img src = "'.$book->getImage().'"></td>';
						echo '<td>'.$book->getName().'<p>'.mb_strimwidth($book->getDiscription(), 0, 100, "...", "UTF-8").'</p></td>';
						echo "</tr>";
						$i++;
					}

				?>
			</table>	

			<a href = "show_books.php?forbusiness" style = "color: white">Заинтересовались? Показать полностью...</a>

		</div>
