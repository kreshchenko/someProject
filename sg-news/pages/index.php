<?php
    require_once '../models/SgNews.php';
    require_once '../vendor/autoload.php';


    if (isset($_GET['from']))
    {
      $from = $_GET['from'];
      if (isset($_GET['per_page'])){
        $newsPerPage = $_GET['per_page'];
      } else {
        $newsPerPage = 10;
      }
    } else {
      $from = 0;
      if (isset($_GET['per_page'])){
        $newsPerPage = $_GET['per_page'];
      } else {
        $newsPerPage = 10;
      }
    } 

      $totalNewsNumber = SgNews::getKilNews();
      $news = SgNews::getNewsFrom($from,$newsPerPage);
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Лента новостей</title>

    <!-- Bootstrap -->
    <link href="../media/css/bootstrap.min.css" rel="stylesheet">
  </head>
  <body>
    <div class="container">

		<div class="col-lg-12">
			<h1>Лента новостей</h1>
      <br>
      <!--<select onchange="window.location.href=this.options[this.selectedIndex].value">
        <option VALUE="/index.php?per_page=10">10</option>
        <option VALUE="/index.php?per_page=25">25</option>
        <option VALUE="/index.php?per_page=50">50</option>
        <option VALUE="/index.php?per_page=10">100</option>
      </select>-->
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
    
      $totalPages = ceil($totalNewsNumber/$newsPerPage);
      for ($i=0; $i<$totalPages; $i++){
        $pageNumber = $i*$newsPerPage;
        if ($pageNumber != $from){
          echo "<a href='".$_SERVER['PHP_SELF']."?from=".$pageNumber."&per_page=".$newsPerPage."'>".($i+1)."</a>";
        } else {
          echo $i+1;
        }
      }
      

    ?>
	</div>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="../media/js/bootstrap.min.js"></script>
  </body>
</html>



