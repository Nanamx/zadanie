<!DOCTYPE html>
<html lang="pl_PL">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Zadanie</title>
  <link rel="stylesheet" type="text/css" href="static/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="static/css/style.css">
</head>
<body>
  <?php
  session_start();
  if (!array_key_exists('content', $_SESSION)) {
    header("Location: news.php?category=Wydział");
    die();
  }
  $content = $_SESSION['content'];
  ?>
  
  <div class="container-fluid">
    <nav class="navbar navbar-expand-lg navbar-light bg-white">
      <a class="navbar-brand mr-5" href="news.php?category=Wydział">AKTUALNOŚCI</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        <div class="navbar-nav">
          <a class="nav-item nav-link active separator" href="news.php?category=Wydział">Wydział <span class="sr-only">(current)</span></a>
          <a class="nav-item nav-link separator" href="news.php?category=Dla Studentów">Dla studentów</a>
          <a class="nav-item nav-link separator" href="news.php?category=Rekrutacja">Rekrutacja</a>
          <a class="nav-item nav-link separator" href="news.php?category=Nauka i badania">Nauka i badania</a>
          <a class="nav-item nav-link separator" href="news.php?category=Współpraca">Współpraca</a>
          <a class="nav-item nav-link separator" href="news.php?category=Dla Pracowników">Dla pracowników</a>
          <a class="nav-item nav-link" href="news.php?category=Inne">Inne</a>
        </div>
      </div>
    </nav>
    <div class="row mt-5">
      <?php foreach($content as $article): ?>
        <div class="col-sm-12 col-md-10 col-lg-4 mb-3">
          <div class="card">
            <?php if (!empty($article['picture'])): ?>
              <img class="card-img-top" src=<?php echo $article['picture']; ?> alt="Card image cap">
            <?php endif; ?>
            <div class="card-body">
              <h5 class="card-title"><?php echo $article['title']; ?></h5>
              <?php if (empty($article['picture'])): ?>
                <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum..</p>
              <?php endif; ?>
            </div>
            <div class="card-footer">
              <small class="text-muted"><img src="img/calendar.png" alt="calendar">  <?php $second =($article['created'])/1000; echo date("d F Y", $second); ?></small>
            </div>
          </div>
        </div>
      <?php endforeach; ?>
    </div>
    <a href="news.php?category=Wszystkie" class="btn btn-outline-secondary mt-5 mb-5 custom-link" role="button" aria-pressed="true"> zobacz wszystkie aktualności ></a>
  </div>
  <script src="static/js/jquery-3.3.1.min.js"></script>
  <script src="static/js/popper.min.js"></script>
  <script src="static/js/bootstrap.min.js"></script>
</body>
</html>
