<?php
$title = 'Welcome page';
require_once 'includes/header.php';
require_once 'includes/nav.php';

if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] == true){
  header("location: landing.php");
  exit;
}
?>

<div class="container padding welc">
<div class="row welcome text-center">
    <div class= "col-12 mt-3">
       <!-- <h1>Eat with ease.</h1> -->
    </div>
    <hr>
    <!-- <div class= "col-12 insidebox mb-5">
        <h5>Reserv-Eat is a convenient, safe, and contact-free mobile application for restaurants which lets the user Book a reservation ahead 
            of time with features including a digital menu, Contact-free Payments, QR code that serves as a ticket for reservation, and displays
             restaurants near you, so the user has easy and safe access during the pandemic.    
        </h5>
    </div>  -->
</div>
<div class="row">
    <div class="jumbotron" style="max-width:auto">
        <h1 class="display-4">Restaurant</h1>
        <p class="lead">Do you want your Restaurant to be feautured in our application?</p>
        <hr class="my-4">
        <p>Become part of us now.</p>
        <p class="lead">
        <a class="btn btn-primary btn-lg" href="signin.php?type=restaurant" style="color:" role="button">Register</a>
        <br>
        <p>Already have an account?</p>
        <a class="btn btn-primary btn-lg" href="login.php?type=restaurant" role="button">Login</a>
        </p>
    </div>
    <div class="jumbotron ml-2" style="max-width:auto">
        <h1 class="display-4">Customer</h1>
        <p class="lead">Become part of a hassle-free eating experience</p>
        <hr class="my-4">
        <p>Reserve now.</p>
        <p class="lead">
        <a class="btn btn-primary btn-lg" href="signin.php?type=customer" role="button">Register</a>
        <br>
        <p>Already have an account?</p>
        <a class="btn btn-primary btn-lg" href="login.php?type=customer" role="button">Login</a>
        </p>
    </div>
    <!-- <div class="container padding welc">
    <div class="row welcome text-center">
    <div class="col-12 inside box">
    <button class="fun" data-toggle="collapse" data-target="#emoji">Click here for fun</button>
        <div id="emoji" class="collapse">
        <div class="container-fluid padding">
        <div class="row text-center">
            <div class="col-sm-6 col-md-3">
                <img class="gif" src="images/panda.gif">
            </div>
            <div class="col-sm-6 col-md-3">
                <img class="gif" src="images/unicorn.gif">
            </div>
            <div class="col-sm-6 col-md-3">
                <img class="gif" src="images/man.gif">
            </div>
        </div>
        </div>
        </div>
    </div>
    </div>
    </div> -->
</div>
    <!-- start-->
    <div id="gallery">
    <div id="myCarousel" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
          <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
          <li data-target="#myCarousel" data-slide-to="1"></li>
          <li data-target="#myCarousel" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">
          <div class="carousel-item active">
            <img class="first-slide" src="images/restaurant.jpg" alt="First slide">
            <div class="container">
              <div class="carousel-caption text-left">
                <h1>Join a hassle free restaurant reservation</h1>
                <p>Over 100 certified partnered restaurants</p>
                <p><a class="btn btn-lg btn-primary" href="signin.php?type=restaurant" role="button">Sign up today</a></p>
              </div>
            </div>
          </div>
          <div class="carousel-item">
            <img class="second-slide" src="images/customer.jpg" alt="Second slide">
            <div class="container">
              <div class="carousel-caption">
                <h1>Eat with Ease</h1>
                <p>Satisfy your cravings in your favorite restaurants with hassle-free reserving</p>
                <p><a class="btn btn-lg btn-primary" href="signin.php?type=customer" role="button">Sign up today</a></p>
              </div>
            </div>
          </div>
          <div class="carousel-item">
            <img class="third-slide" src="images/gallery.jpg" alt="Third slide">
            <div class="container">
              <div class="carousel-caption text-right">
                <h1>Restaurant and Customer as one family</h1>
                <p>Here at Reserv-Eat, we cater both restaurants and customers satisfaction.</p>
                <p><a class="btn btn-lg btn-primary" href="#" role="button">Browse gallery</a></p>
              </div>
            </div>
          </div>
        </div>
        <a class="carousel-control-prev" href="#myCarousel" role="button" data-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#myCarousel" role="button" data-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
        </a>
      </div>
</div>


      <!-- Marketing messaging and featurettes
      ================================================== -->
      <!-- Wrap the rest of the page in another container to center all the content. -->

      <div class="container marketing">

        <!-- Three columns of text below the carousel -->
        <div class="row">
          <div class="col-lg-4">
            <img class="rounded-circle" src="images/order.png" alt="Generic placeholder image" height = "140" width = "auto">
            <h2>Increase sales while operating safely</h2>
            <p>With ReservEat, your resto can take and manage reservations with ease!</p>
            <p><a class="btn btn-secondary" href="#" role="button">View details &raquo;</a></p>
          </div><!-- /.col-lg-4 -->
          <div class="col-lg-4">
            <img class="rounded-circle" src="images/manage.png" alt="Generic placeholder image" height = "140" width = "auto">
            <h2>Manage Reservation with ease!</h2>
            <p>Get real-time reservation updates, making it easy to fulfill reservations and satisfy your customers</p>
            <p><a class="btn btn-secondary" href="#" role="button">View details &raquo;</a></p>
          </div><!-- /.col-lg-4 -->
          <div class="col-lg-4">
            <img class="rounded-circle" src="images/friendly.png" alt="Generic placeholder image" height = "140" width = "auto">
            <h2>User Friendly</h2>
            <p>You have an option to use our website or thru mobile application</p>
            <p><a class="btn btn-secondary" href="#" role="button">View details &raquo;</a></p>
          </div><!-- /.col-lg-4 -->
        </div><!-- /.row -->


        <!-- START THE FEATURETTES -->

        <hr class="featurette-divider">

        <div class="row featurette">
          <div class="col-md-7">
            <h2 class="featurette-heading">Mission</h2>
            <p class="lead">To delight and nourish our customers with healthy, quality and delicious food and excellent service at a reasonable price</p>
            <p class="lead">To understand our customer’s changing needs and constantly improve our customer experience</p>
            <p class="lead">To create long-term relationships with our business partners</p>
            <p class="lead">To contribute to our society through initiatives that align with our corporate social responsibility program</p>
          </div>
          <div class="col-md-5">
            <img class="featurette-image img-fluid mx-auto" src="images/mission.jpg" alt="Generic placeholder image">
          </div>
        </div>

        <hr class="featurette-divider">

        <div class="row featurette">
          <div class="col-md-7 order-md-2">
            <h2 class="featurette-heading">Vision</h2>
            <p class="lead">To provide service to our customers through reserving</p>
            <p class="lead">and a hassle free restaurant experience this pandemic while working toward the greater good for the community and environment.</p>
          </div>
          <div class="col-md-5 order-md-1">
            <img class="featurette-image img-fluid mx-auto" src="images/vision.png" alt="Generic placeholder image">
          </div>
        </div>

        <hr class="featurette-divider" id="aboutus">

        <div class="row featurette">
          <div class="col-md-7">
            <h2 class="featurette-heading">About Us</h2>
            <p class="lead">Reserv-Eat is a convenient, safe, and contact-free web application and mobile application for dine-in restaurants. 
This application allows users to book a reservation ahead of time. 
It also has features such as a digital menu, contact-free payments, QR code for ticket reservations, and a directory of restaurants. 
The application is easy to use and can be accessed safely during the pandemic. 
Convenience is the key when it comes to diners getting a seat at their favorite venue.</p>
          </div>
          <div class="col-md-5">
            <img class="featurette-image img-fluid mx-auto" src="images/reserveat.png" alt="Generic placeholder image">
          </div>
        </div>
        <!-- /END THE FEATURETTES -->

      </div><!-- /.container -->
    <!-- end -->
    <div class="container padding welc">
    <div class="row welcome text-center">
    <div class="col-12 inside box">
    <button class="fun" data-toggle="collapse" data-target="#emoji">Click here for fun</button>
        <div id="emoji" class="collapse">
        <div class="container-fluid padding">
        <div class="row text-center">
            <div class="col-sm-6 col-md-3">
                <img class="gif" src="images/panda.gif">
            </div>
            <div class="col-sm-6 col-md-3">
                <img class="gif" src="images/unicorn.gif">
            </div>
            <div class="col-sm-6 col-md-3">
                <img class="gif" src="images/man.gif">
            </div>
        </div>
        </div>
        </div>
    </div>
    </div>
    </div>
</div>

<?php require_once 'includes/footer.php'; ?>