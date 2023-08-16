<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Books and Beyond - Add a Book</title>
  <link href="css/style.css" rel="stylesheet" type="text/css">
  <?php include('favicon.txt')?>
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
			<form action="addbook.php" method="post" class="addbook" enctype="multipart/form-data" autocomplete ="off">
				<table>
				<caption>Add a Book</caption>
				<tr><td><label for="cover">Cover of the book:</label></td>
				<td><input type="file" name="cover" accept=".png,.jpg,.gif" class="button"/></td></tr>
				<tr><td><label for="title">Title of the book:</label></td>
				<td><input type="text" name="title" placeholder="title" class="textbox" /></td></tr>
				<tr><td><label for="author">Author of the book:</label></td>
				<td><input type="text" name="author" placeholder="author" class="textbox" /></td></tr>
				<tr><td><label for="publisher">Publisher of the book:</label></td>
				<td><input type="text" name="publisher" placeholder="publisher" class="textbox" /></td></tr>
				<tr><td><label for="pubdate">Published date of the book:</label></td>
				<td><input type="text" name="pubdate" placeholder="Date Published" class="textbox" /></td></tr>
				<tr><td><label for="summary">Summary of the book:</label></td>
				<td><textarea name="summary" rows="10" cols="30" class="textbox" placeholder="Summary" ></textarea></textarea></td></tr>
				<tr><td><label for="isbn">ISBN of the book:</label></td>
				<td><input type="text" name="isbn" placeholder="ISBN" class="text" /></td></tr>
				<tr><td></td><td><input type="submit" value="Submit" class="button"/></td></tr>
				</table>
			</form>
<?php
require_once('conn.php');
$title = addslashes($_POST['title']);
$author = addslashes($_POST['author']);
$publisher =  addslashes($_POST['publisher']);
$pubdate =   addslashes($_POST['pubdate']);
$summary = addslashes($_POST['summary']);
$isbn =  addslashes($_POST['isbn']);
$name = $_FILES['cover']['name'];
$tmp_name = $_FILES['cover']['tmp_name'];
$path = 'books/';

if (!empty($name)){
if (move_uploaded_file($tmp_name, $path.$name)) {
$conn = mysqli_connect($host, $user, $pass, $db);
$query = "INSERT INTO bookworm VALUES (null,'$title','$author','$publisher','$pubdate','$path$name','$summary','$isbn', null );";
if (mysqli_query($conn, $query)) {
  echo "<p>New record created successfully</p>";
} else {
  echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
}
}
?>
</main>
   <footer class="page">
		<p>&copy; 2023 Team Bookworm </p>
   </footer>
</body>
</html>
<!--      <div class="wrap">
      <form action='searchresults.php' method='get' class="search">
      <input type="text" class="searchTerm" placeholder="Which book are you looking for?" name='searchtext' id='searchtext'>
      <button type="submit" class="searchButton" id="book_search" placeholder="Search">Search</button>
      <script type="text/javascript">
    document.getElementById("book_search").onclick = function () {
        location.href = "page2.html";
    };
</script>
   </form>
</div>   --> 
