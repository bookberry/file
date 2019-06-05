<?php
	require_once "connect_DB.php";
	$id = array($_GET['bookid']);
	$books = getBooksById($id);
	$file = $books[0]->getFile();
	$title = $books[0]->getName()." читать";
?>


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


<div id = "content">
	<center>
		<iframe class = "Myframe" src = "cormen.pdf">
    		Ваш браузер не поддерживает плавающие фреймы!
 		</iframe>	
 	</center>	
</div>

<?php
	require_once "footer.php";
	mysqli_close($link);
?>