<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8"/>
<link rel="icon" href="favicn.ico" type="image/x-icon"/>
<link rel="shortcut icon" href="favicn.ico" type="image/x-icon"/>
<title>My Library - Add a Book</title>
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
	    <header class="squared"><h1>Add a Book</h1></header>
			<section>
			<form action="addbook.php" method="post" class="addbook" enctype="multipart/form-data" autocomplete ="off">
				<table>
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
				<tr><td><label for="shelf">Shelf Location:</label></td>
				<td><input name="shelf" placeholder="Shelf where book is located" /></td></tr>
				<tr><td><label for="sub_category">Sorted on Shelf by:</label></td>
				<td><input name="sub_category" placeholder="Category sorted by" /></td></tr>
				<tr><td></td><td><input type="submit" value="Submit" class="button"/></td></tr>
				</table>
			</form>
			</section>
<?php
require_once('conn.php');
$title = addslashes($_POST['title']);
$author = addslashes($_POST['author']);
$publisher =  addslashes($_POST['publisher']);
$pubdate =   addslashes($_POST['pubdate']);
$summary = addslashes($_POST['summary']);
$isbn =  addslashes($_POST['isbn']);
$shelf =  addslashes($_POST['shelf']);
$sub_category =  addslashes($_POST['sub_category']);
$name = $_FILES['cover']['name'];
$tmp_name = $_FILES['cover']['tmp_name'];
$path = 'books/';
$filename = addslashes($path.$name); // this allows you to use single or double quotation marks in image names if you want.
if (!empty($name)){
if (move_uploaded_file($tmp_name, $path.$name)) {
$conn = mysqli_connect($host, $user, $pass, $db);
$query = "INSERT INTO books VALUES (null,'$title','$author','$publisher','$pubdate','$filename','$summary','$isbn','$shelf','$sub_category', null , null);"; // this query will need to be changed if you add fields to the database.  See readme for more information on the database struture.
if (mysqli_query($conn, $query)) {
  echo "<p>New record created successfully</p>";
} else {
  echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
}
}
?>
<footer>
<p><a href="javascript:window.print()">Print this page</a> |
</p>
</footer>
</section>
<aside class="right">
</aside>
</main>
<?php include("footer.txt") ?>
</body>
