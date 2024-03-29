<?php
require_once "connect_DB.php";
?>

<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>О нас</title>
    <link rel="stylesheet" href="css/page_style.css">
</head>

<body>
    <div id="wrapper">
        <link href="https://fonts.googleapis.com/css?family=Amatic+SC&display=swap" rel="stylesheet">
        <div id="header">
            <img src="img/header.jpg" alt="">
        </div>
        <table class="menu">
            <tr>
                <td width="5%"><button onclick="window.location='http://library'"><img src="img/home_button.gif" alt=""></button></td>
                <td width="20%"><button onclick="window.location='show_books.php?tag=forall'">КНИГИ НА ВСЕ ВРЕМЕНА</button></td>
                <td width="20%"><button onclick="window.location='show_books.php?tag=forhim'">ДЛЯ НЕГО</button></td>

                <td>
                    <form class="form-search" action="/search/" target="_blank">
                        <input type="hidden" name="searchid" value="808327">
                        <b><input style="width: 70%; border-bottom: 1px solid; font-size: 18px; text-align: center;" type="search" name="text" required placeholder="Поиск"> </b>
                        <input type="submit" value="🔍">
                    </form>
                </td>

                <td width="20%"><button onclick="window.location='show_books.php?tag=forher'">ДЛЯ НЕЁ</button></td>
                <td width="20%"><button>ЦИТАТЫ</button></td>
            </tr>
        </table>

        <div id="content">

            <h1>Библиотека лучших электронных книг Bookberry.ru</h1>
            <p> Сложно переоценить пользу от времяпровождения с хорошей книгой. Чтение – это <br> настоящий заряд мотивации и хорошего настроения. Однако в современном <br>ритме жизни у нас практически не бывает свободной минуты, чтобы отправиться в библиотеку и<br> провести время с любимыми произведениями. Даже если мы нашли время, чтобы посетить книжный магазин и взять несколько книг, далеко не всегда их удобно брать с собой в поездки или в дорогу на работу или учебу. Но помимо этих неудобств существует еще одна проблема, которую невозможно игнорировать. На сегодняшний день для изготовления только пары книг вырубается одно дерево. Печать миллионных тиражей одного произведения наносит серьезный удар по экологии нашей планеты. Безвозвратно уничтожаются леса, нарушается природное равновесие и вымирают многие виды животных. Новые деревья не успевают вырастать – настолько активно проходят вырубки, и если всё будет продолжаться в том же духе, то уже через одно десятилетие ущерб будет непоправим. Кроме того, каждая книга спустя годы обращения требует утилизации – и в отсутствии этой необходимости заключается еще один плюс онлайн-библиотек. Перейдя на электронные книги, человечество сможет сохранить сотни лесов по всему миру. Позаботиться о природе для будущих поколений можно уже сегодня, воспользовавшись онлайн-библиотекой. К тому же, этот способ обойдется гораздо экономнее по времени и дешевле, чем покупка книги в магазине!</p>
            <h2>Все плюсы – в одной электронной библиотеке</h2>
            <p>
                Помимо того, что электронная библиотека снижает ущерб, который ежедневно наносится природе при изготовлении новых книг, наш ресурс представляет ряд преимуществ, которые значительно увеличат удовольствие от чтения.
            </p>
            <ul>
                <li>Минимальные траты на приобретение литературы.</li>
                <p>Себестоимость книг напрямую зависит от количества ресурсов. Оно критически уменьшается с уничтожением лесов, поэтому высокая стоимость одного бумажного изделия вполне оправдана. Кроме того, с каждым годом запросы издательств на свои заработки повышаются, что увеличивает цену на товар примерно в 1,5 раза. Прибавим к этим факторам увеличение наценок книжных магазинов – и получим, что мы переплачиваем огромные деньги за бумажный экземпляр из-за жадности других людей.</p>
                <li>Сотни тысяч страниц в одном месте</li>
                <p>Многоэтажные книжные полки скапливают огромное количество пыли – не лучше ли будет перенести все любимые произведения в одно компактное место? Ваша библиотека всегда под рукой – на телефоне, планшете, персональном компьютере или на ноутбуке. Помимо того, не придется носить с собой килограммы напечатанных страниц: закачайте интересующую литературу из нашей библиотеки и читайте на любом гаджете толстые тома полюбившихся книг.</p>
                <li>Подборки для легкого поиска книг по интересующим тематикам</li>
                <p>Подборки в Bookberry — это настоящие помощники при выборе подходящих произведений по настроению, теме, сезону, популярности или экспертной оценке. Мы отбираем лучшие книги для нашей электронной библиотеки, чтобы Вы сэкономили время на поиске. Мы сможем подсказать как по неустаревающей классической литературе, так и по модным современным новинкам. В соответствующем разделе на сайте Вы сможете найти самые интересные книги за несколько секунд. Многочисленные тематики позволят подобрать хорошую литературу как для взрослых, так и для детей с разными предпочтениями.</p>
                <li>Доступ из любой точки мира</li>
                <p>Отправляясь в поездку, выезжая на работу или учебу из дома, Вам не придется брать с собой тяжелые фолианты. Теперь вся литература, которая добавляется в профиль онлайн-библиотеки, будет доступна в любой момент времени. Скачав понравившуюся книгу, Вы сможете читать её без доступа к Интернету – например, в общественном транспорте.</p>
                <li>Возможность настроить отображение текста</li>
                <p>Обычные книги часто огорчают нас качеством печати, цветом бумаги или размером и видом шрифта. На сайте нашей электронной библиотеке текст можно форматировать так, как вам удобно, и он будет таким, каким вы хотите его видеть, а чёткость отображаемого на экранах гаджетов текста превзойдет по качеству даже лучшую печать в бумажных книгах.</p>
                <li>Экономия времени</li>
                <p>Теперь не придется ездить по всему городу в поиске любимой книги или искать интересующую литературу в местной библиотеке. Вместе с онлайн-библиотекой все необходимое будет всегда под рукой. Оформление читательского билета, поиск нужного произведения на полке, - всё это тратит драгоценные минуты, тогда как поиск романа на нашем сайте отнимет не больше нескольких секунд.</p>
                <li>Полное собрание лучших произведений со всего мира</li>
                <p>Библиотека BookBerry представляет собой собрание электронных копий признанных классических шедевров, а также новинок современной литературы. Сотни книг ждут часа своего прочтения на нашем онлайн-ресурсе.</p>
            </ul>
            <div class="myframe">
                <iframe src="https://clck.ru/GMH5t" height="222" frameborder="0" allowtransparency scrolling="no" class="my">
                </iframe>
            </div>
        </div>
    </div>
    <a href="#" class="back-to-top"></a>
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="js/button_script.js"></script>
</body>

</html>