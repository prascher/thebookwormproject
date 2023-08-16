<?php 
require_once('conn.php');
$conn = mysqli_connect($host, $user, $pass, $db); ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Books and Beyond - Individual Book</title>
  <link href="css/style.css" rel="stylesheet" type="text/css">
  <?php include('favicon.txt') ?>
</head>
<body>
  <main>
      <header>
	  <a href="index.php">
        <h1>Books N Beyond</h1>
        <p>Find books anywhere and anytime!</p>
		</a>
    <?php include('menu.txt') ?>
	</header>
    <?php include('search.txt') ?>
     <section class="item">
	<header>
	<form action="individualbook.php?id=<?php echo $_GET['id']; ?>" method='post'>
	<button name='update' id='update' class="button">I've read this book</button>
	</form>
	<?php if (array_key_exists('update', $_POST)) {
	$query1 = "update bookworm set `readon` = current_date() where id=".$_GET['id'].";";
	$result1 = mysqli_query($conn, $query1);
	}
	?>
	</header>
<?php
$conn = mysqli_connect($host, $user, $pass, $db);
$query = "select * from bookworm where id='".$_GET['id']."'";
$result = mysqli_query($conn, $query);
while($row = mysqli_fetch_assoc($result)){
    $title = $row['title'];
    $author = $row['author'];
    $id = $row['id'];
    $img = $row['img'];
    $publisher =$row['publisher'];
    $pubdate = $row['pubdate'];
    $ISBN = $row['ISBN'];
    $summary = $row['summary'];
    $readon = $row['readon'];
    echo '<img class="itemimg" src="'.$img.'">';
    echo '<h1 class="itemtitle">Title: '.$title.'</h1>';
    echo '<p class="itemauthor">Author(S): '.$author.'</p>';
    echo '<p class="itempub">Publisher: '.$publisher.'</p>';
    echo '<p class="itempubdate">Date Published: '.$pubdate.'</p>';
    echo '<p class="itemisbn">ISBN: '.$ISBN.'</p>';
    echo '<p class="itemsummary">Summary: '.$summary.'</p>';
    echo '<p class="itemreadon">Read on: '.$readon.'</p>';
}
?>
    </section>
  </main>
   <footer class="page">
		<p>&copy 2023 Team Bookworm </p>
   </footer>
</body>
</html>
<!--
		<script>
		function myFunction() {
		var str = document.getElementById("read").innerHTML; 
		var res = str.replace("I have read this book", "This book has been marked read");
		document.getElementById("read").innerHTML = res;
		document.getElementById("date").innerHTML = Date();
		}
        </script>
-->
