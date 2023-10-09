
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="/docs/4.0/assets/img/favicons/favicon.ico">

    <title>SeliModel</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/4.0/examples/cover/">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Trirong">

    <!-- Bootstrap core CSS -->
    <link href="bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- google fonts -->
     <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Lato&family=Roboto:wght@100&display=swap" rel="stylesheet">

<!-- font awesome -->
<link rel="stylesheet" type="text/css" href="font-awesome/css/font-awesome.min.css">
<!-- font awesome -->


    <!-- Custom styles for this template -->
    <link href="cover.css" rel="stylesheet">
  </head>

  <body>
   
     <?php include("nav.php"); ?>

    <!-- <div class="container-fluid wrapper"> -->

      <!-- navigation -->
      
      <!-- <nav class="navbar navbar-expand-lg navbar-dark">
  <a class="navbar-brand" href="#">Navbar</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="register.php">Register</a>
      </li>

       <li class="nav-item">
        <a class="nav-link" href="login.php">Login</a>
      </li>

      </ul>
   
  </div>
</nav> -->

<!-- navigation -->

<!-- slider -->

   <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
  <ol class="carousel-indicators">
    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
  </ol>
  <div class="carousel-inner" style="height: 500px;">
    <div class="carousel-item active">
      <img class="d-block w-100" src="images/seliModel/banner1.jpg" alt="First slide" style="height:500px;">
       <div class="carousel-caption d-none d-md-block">
   <!--  <h5>hello</h5>
    <p>hi</p> -->
  </div>
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="images/seliModel/banner2.jpg" alt="Second slide" style="height:500px;">
       <div class="carousel-caption d-none d-md-block">
   <!--  <h5>hello</h5>
    <p>hi</p> -->
  </div>
    </div>

   

  </div>
  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
 
  <!-- end of slider -->

  <!-- about -->
  <div class="container-fluid about animation-element bounce-up">

    <div class="row subject">
  <div class="col-sm myImage">
    <img src="images/seliModel/circle.jpeg" alt="..." class="circle">
  </div>

  <div class="col-sm myContent">
    <hgroup>
      Welcome to SeliModel
    </hgroup>

    <p class="info">Psychometric Probe</p>
    <hr>
    <p class="expl">
      Discover fascinating insights about yourself with our interactive personality quiz. Answer a series of questions, and we’ll reveal unique aspects of your character and provide valuable self-reflection. Gain a deeper understanding of your strengths, preferences, and potential areas for growth. Let’s embark on this journey of self-discovery together!
    </p>

    <a href="register.php">
      <button type="button" class="btn btn-success">Lets Get Started</button>
    </a>
  </div>
</div>
    
  </div>
  <!-- about -->

  <!-- users -->
  <div class="container-fluid users animation-element bounce-up">
  <header>Used daily by more than 3,000 users</header>
    <div class="row subject">
      
  <div class="col-sm">
    <div class="card" style="width: 18rem;">
  <!-- <img class="card-img-top" src="..." alt="Card image cap"> -->
  <i aria-hidden="true" class="fa fa-lock"></i>
  <div class="card-body">
    <h5 class="card-title">Privacy</h5>
    <p class="card-text">we care so much about your privacy. Your data is secure and stored in on our own server. We don’t sell your data to 3rd party.</p>
   
  </div>
</div>
  </div>

  <div class="col-sm">
    <div class="card" style="width: 18rem;">
  <!-- <img class="card-img-top" src="..." alt="Card image cap"> -->
  <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
  <div class="card-body">
    <h5 class="card-title">Accuracy</h5>
    <p class="card-text">See exactly how you score for Sincerity , Social-Esteem, Conscientiousness, Extraversion, Agreeableness with this scientific personality trait.</p>
   
  </div>
</div>
  </div>

  <div class="col-sm">
    <div class="card" style="width: 18rem;">
  <!-- <img class="card-img-top" src="..." alt="Card image cap"> -->
  <i class="fa fa-star" aria-hidden="true"></i>
  <div class="card-body">
    <h5 class="card-title">Psychometric Probe</h5>
    <p class="card-text">The true Psychometric probe is an excellent way of understanding yourself and understanding others and more.</p>
  
  </div>
</div>
  </div>
    </div>
    
  </div>
  <!-- users -->

  <!-- footer -->
   <footer class="footer text-center">
      <div class="container">
        <span class="text-white">Copyright at 2023</span>
      </div>
    </footer>
  <!-- footer -->

<!-- </div> -->


    


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery-slim.min.js"><\/script>')</script>
    <script src="../../assets/js/vendor/popper.min.js"></script>
    <script src="bootstrap/dist/js/bootstrap.min.js"></script>

    <script type="text/javascript" src="script/animate.js"></script>
  </body>
</html>
