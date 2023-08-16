<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Books and Beyond - Tutorials</title>
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
<section class="items">
    <header><h2>Our tutorials</h2></header>
    <article id="tutorials">
    <video width="480" height="270" controls>
    <source src="media/tutorial1.mp4" type="video/mp4">
    Your browser does not support the video tag.
    </video>
    <video width="480" height="270" controls>
    <source src="media/tutorial2.mp4" type="video/mp4">
    Your browser does not support the video tag.
    </video>
    </article>
</section>
</main>
   <footer class="page">
		<p>&copy; 2023 Team Bookworm </p>
   </footer>
</body>
</html>
