<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8"/>
<link rel="icon" href="favicn.ico" type="image/x-icon"/>
<link rel="shortcut icon" href="favicn.ico" type="image/x-icon"/>
<title>My Library - Home</title>
<link rel="stylesheet" href="css/light.css" title="Day Mode"/>
<link rel="alternate stylesheet" href="css/dark.css" title="Night Mode"/>
</head>
<body>
<?php include("header.txt") ?>
<main>
<aside class="left">
</aside>
<section id="main">
<?php include("search.txt") ?>
<header class="squared"><h1>Most Recently Read: </h1></header>
<section class="items">
		<div>
    <?php
    require_once('conn.php');
    $conn = mysqli_connect($host, $user, $pass, $db);
    $query = "select title,author,id,img,readon from books where date(readon) >= NOW() - interval 14 day"; // this interval is what dictates what shows up in your recently read books section, if you read books quickly you may want to lower the number of days, if you don't you may want to raise it.
    $result = mysqli_query($conn, $query);
    while($row = mysqli_fetch_assoc($result)){
        $title = $row['title'];
        $author = $row['author'];
        $id = $row['id'];
	$img = $row['img'];
	$readon = $row['readon'];
        echo '<div class="ritem">';
        echo '<a href="individualbook.php?id='.$id.'">';
        echo '<img class="itemimg" src="'.$img.'">';
        echo '<h1 class="ritemtitle">'.$title.'</h1>';
        echo '<p class="ritemauthor">'.$author.'</p></a>';
        echo '<p class="ritemreadon">'.$readon.'</p></a>';
        echo '</div>';
    }
    ?>
		</div>
	</section>
<footer>
<p><a href="javascript:window.print()">Print this page</a> |
</p>
</footer>
</section>
<aside class="right">
</aside>
</main>
<?php include("footer") ?>
</body>
</html>
