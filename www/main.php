
<?php
  // database connection
  try
  {
    $db = new PDO('mysql:host=localhost;dbname=eop;charset=utf8', 'root', 'root');
  }
  catch (Exception $e)
  {
    die('Erreur : ' . $e->getMessage());
  }

  $article =  $db->query('SELECT * FROM articles');

  while ($data = $article->fetch())
  {
?>
<main>
  <article>
    <div class="title">
      <h2><?php echo $data['title']; ?><br/></h2>
    </div>
    <div class="date">
    <i class="far fa-calendar-alt"></i>&nbsp;&nbsp;<?php echo $data['date']; ?><br/>
    </div>
    <div class="content"> 
      <?php echo $data['content']; }?><br/>
    </div>
  </article>
</main>
