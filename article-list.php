<?php
try
{
	// PDO database connection
	$dbcon = new PDO('mysql:host=localhost;dbname=databaseop;charset=utf8', 'root', 'root');
}
catch(Exception $e)
{
	// Database connection error management
        die('Erreur : '.$e->getMessage());
}
// PDO statement
$result = $dbcon->query('SELECT * FROM tableop');
while ($data = $result->fetch()) 
{
?>

<div class="tool">
	<div class="tool-title">
		<h2><?php echo $data['title']; ?></h2>
	</div>
	<div class="tool-info">
		<div class="tool-info-img">
			<img src="https://picsum.photos/200" alt="tool-img"/>
		</div>
		<div class="tool-info-src">
			<p><?php echo $data['url']; ?></p>
		</div>
		<div class="tool-info-date">
			<i class="fas fa-calendar-alt"></i>&nbsp;10/05/2020
		</div>
		</div>
		<div class="tool-description">
			<p><?php echo $data['content']; ?></p>
		</div>
	<div class="tool-info2">
		<div class="tool-info2-numberdown">
			100
		</div>
		<div class="tool-info2-downvote">
			<i class="far fa-thumbs-down"></i>
		</div>
		<div class="tool-info2-upvote">
			<i class="far fa-thumbs-up"></i>
		</div>
		<div class="tool-info2-numberup">
			250
		</div>
		<div class="tool-info2-tag">
			php, doc, text, en
		</div>
		<div class="tool-info2-visit">
			<button class="visit-button">read</button>
		</div>
	</div>
</div>

<?php
}
// end of PDO statement
$result->closeCursor();
?>

