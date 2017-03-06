<?php
    require_once '../models/SgNews.php';
    require_once '../vendor/autoload.php';
    $news = SgNews::getNews();
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Лента новостей</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
  </head>
  <body>
    <div class="container">
		<div class="col-lg-8">
			<h1>Лента новостей</h1>
		</div>
    <?php
      foreach ($news as $some):
    ?>
    <div class="col-lg-8">
      <div class="col-lg-12">
        <h3>
          <a href="<?=$some['link']?>"><?=$some['title']?></a>
        </h3>
      </div>
      <div class="col-lg-12"><?=$some['description']?></div>
      <div class="col-lg-12"><?=$some['pub_date']?></div>
    </div>
    <?php
      endforeach;
    ?>
	</div>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>




