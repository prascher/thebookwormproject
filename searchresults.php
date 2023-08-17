<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8"/>
<link rel="icon" href="favicn.ico" type="image/x-icon"/>
<link rel="shortcut icon" href="favicn.ico" type="image/x-icon"/>
<title>My Library - Search Results</title>
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
	    <header class="squared"><h1>Search Results:</h1></header>
<section>
<?php
require_once('conn.php');
$conn = mysqli_connect($host, $user, $pass, $db);
switch($_GET['searchfield']) {
	case 'title':
		$query = "select * from books where ".addslashes($_GET['searchfield'])." like '%".addslashes($_GET['searchtext'])."%';";
            break;
        case 'author':
		$query = "select * from books where ".addslashes($_GET['searchfield'])." like '%".addslashes($_GET['searchtext'])."%';";
            break;
        case 'publisher':
		$query = "select * from books where ".addslashes($_GET['searchfield'])." like '%".addslashes($_GET['searchtext'])."%';";
            break;
		case 'pubdate':
		$query = "select * from books where ".addslashes($_GET['searchfield'])." like '%".addslashes($_GET['searchtext'])."%';";
            break;
        case 'summary':
		$query = "select * from books where ".addslashes($_GET['searchfield'])." like '%".addslashes($_GET['searchtext'])."%';";
            break;
        case 'isbn':
		$query = "select * from books where ".addslashes($_GET['searchfield'])." like '%".addslashes($_GET['searchtext'])."%';";
	    break;
	case 'shelf':                                                                                                                               
		$query = "select * from books where ".addslashes($_GET['searchfield'])." like '%".addslashes($_GET['searchtext'])."%';";
	    break;
        case 'lentto':
                $query = "select * from books where ".addslashes($_GET['searchfield'])." like '%".addslashes($_GET['searchtext'])."%';";
            break;
	default:
		$query = "select * from books where title like '%".addslashes($_GET['searchtext'])."%';";
            break;
}
$result = mysqli_query($conn, $query);
while($row = mysqli_fetch_array($result)){
    $title = $row['title'];
    $author = $row['author'];
    $id = $row['id'];
    $img = $row['img'];
    $publisher =$row['publisher'];
    $pubdate = $row['pubdate'];
    $shelf = $row['shelf'];
    $lentto = $row['lentto'];
    $readon = $row['readon'];
    $ISBN = $row['ISBN'];
    echo '<section class="item">';
    echo '<a href="individualbook.php?id='.$id.'">';
    echo '<img class="itemimg" src="'.$img.'">';
    echo '<h1 class="itemtitle">'.$title.'</h1>';
    echo '<p class="itemauthor">'.$author.'</p>';
    echo '<p class="itempub">'.$publisher.'</p>';
    echo '<p class="itempubdate">'.$pubdate.'</p>';
    echo '<p class="itemloc">'.$shelf.'</p></a>';
    echo '<p class="itemisbn">'.$ISBN.'</p></a>';
    echo '</section>';
}
mysqli_close($conn);
?>
</section>
<footer>
<p><a href="javascript:window.print()">Print this page</a> |
</p>
</footer>
</section>
<aside class="right">
<header><h1>Search Info</h1></header>
<section>
<?php echo "Search Criteria: ".$_GET['searchfield']."</br>"?>
<?php echo "Search Term: ".$_GET['searchtext'].""?>
</section>
</aside>
</main>
<?php include("footer.txt")?>
</body>
