<?php include('head.php'); ?>
<body>
  <div class="page">
    <?php 
      require 'header.php';
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
            <?php echo $data['content']; ?><br/>
          </div>
        </article>
      </main>
    <?php
        require 'footer.php'; 
      ?>
  </div>
</body>
</html>
