<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>INSTAGRAM</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/heroic-features.css" rel="stylesheet">

  </head>

  <body>

    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
      <div class="container">
        <a class="navbar-brand" href="#">Instagram API
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
      </div>
    </nav>

    <!-- Page Content -->
    <div class="container">

      <!-- Jumbotron Header -->
      <header class="jumbotron my-4">
        <h1 class="display-3">Cari post berdasarkan hastag

            <?php
            if(!isset($_GET['hastag'])){

              $json = file_get_contents('https://www.instagram.com/explore/tags/stts/?__a=1');
              $obj = json_decode($json,true);
            }else{

              $json = file_get_contents('https://www.instagram.com/explore/tags/'.$_GET['hastag'].'/?__a=1');
              $obj = json_decode($json,true);
            }
            ?>
        </h1>
        <div class="col-lg-12">
          <form action="#" method="get">
         <div class="input-group">
           <input type="text" class="form-control" name="hastag" placeholder="Search hastag...">
           <span class="input-group-btn">
             <button class="btn btn-secondary" type="submit">Go!</button>
           </span>
         </div>
       </form>
       </div>
      </header>

      <!-- Page Features -->
      <div class="row text-center">
        <?php for($i =0;$i<count($obj['graphql']['hashtag']['edge_hashtag_to_media']['edges']);$i++){?>
        <div class="col-lg-3 col-md-6 mb-4">
          <div class="card">
            <img class="card-img-top" src="<?php
                            echo $obj['graphql']['hashtag']['edge_hashtag_to_media']['edges'][$i]['node']['thumbnail_src'];?>" alt="">
            <div class="card-body">
              <p class="card-text">
                <?php
                echo $obj['graphql']['hashtag']['edge_hashtag_to_media']['edges'][$i]['node']['edge_media_to_caption']['edges'][0]['node']['text'];
                ?>
              </p>
              <p>Like : <?php
              echo $obj['graphql']['hashtag']['edge_hashtag_to_media']['edges'][$i]['node']['edge_liked_by']['count'];
              ?></p>
            </div>
            <div class="card-footer">
              <a href="https://www.instagram.com/p/<?php
              echo $obj['graphql']['hashtag']['edge_hashtag_to_media']['edges'][$i]['node']['shortcode'];
              ?>" class="btn btn-primary">Lihat Postnya!</a>
            </div>
          </div>
        </div>

      <?php }?>

      </div>
      <!-- /.row -->

    </div>
    <!-- /.container -->

    <!-- Footer -->
    <footer class="py-5 bg-dark">
      <div class="container">
        <p class="m-0 text-center text-white">Copyright &copy; Your Website 2018</p>
      </div>
      <!-- /.container -->
    </footer>

    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  </body>

</html>
