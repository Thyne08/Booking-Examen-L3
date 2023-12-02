<?php
include("../setting.php");
session_start();
if (!isset($_SESSION['sid'])) {
    header("location:index.php");
}
$sid = $_SESSION['sid'];
$a = mysqli_query($set, "SELECT * FROM students WHERE sid='$sid'");
$b = mysqli_fetch_array($a);
$name = $b['name'];

?>


<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Books">
    <meta name="author" content="Shivangi Gupta">
    <title>Booking</title>

    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/my.css" rel="stylesheet">
    <style>
        .modal-header {
            background: #cb2335;
            color: #fff;
            font-weight: 800;
        }

        .modal-body {
            font-weight: 800;
        }

        .modal-body ul {
            list-style: none;
        }

        .modal .btn {
            background: #fff;
            color: #cb2335;
            border: solid 1px #cb2335
        }

        .modal .btn:hover {
            background: #cb2335;
            color: #fff;
        }

        .modal a {
            color: #D67B22;
        }

        .modal-backdrop {
            position: inherit !important;
        }

        #login_button,
        #register_button {
            background: none;
            color: #D67B22 !important;
        }

        #query_button {
            position: fixed;
            right: 0px;
            bottom: 0px;
            padding: 10px 80px;
            background-color: #fff;
            color: #cb2335;
            border-radius: 2px;
            border-color: #cb2335;
        }

        #query_button:hover {
            background-color: #cb2335;
            color: #fff;
        }

        @media(max-width:767px) {
            #query_button {
                padding: 5px 20px;
            }
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-default navbar-fixed-top navbar-inverse">
        <div class="container-fluid">

            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="http://localhost/bibliotheque/kb/empr.php" style="padding: 0px;float:top"><img class="img-responsive" alt="Brand" src="../images/BOOKING__4.png" style="width: 125px;"></a>
            </div>


            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <?php
                    if (!isset($_SESSION['sid'])) {
                        echo '
            <li>
                <button type="button" id="login_button" class="btn btn-lg" data-toggle="modal" data-target="#login">Login</button>
                  <div id="login" class="modal fade" role="dialog">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <h4 class="modal-title text-center">Login Form</h4>
                            </div>
                            <div class="modal-body">
                                          <form class="form" role="form" method="post" action="index.php" accept-charset="UTF-8">
                                              <div class="form-group">
                                                  <label class="sr-only" for="username">Username</label>
                                                  <input type="text" name="login_username" class="form-control" placeholder="Username" required>
                                              </div>
                                              <div class="form-group">
                                                  <label class="sr-only" for="password">Password</label>
                                                  <input type="password" name="login_password" class="form-control"  placeholder="Password" required>
                                              </div>
                                              <div class="form-group">
                                                  <button type="submit" name="submit" value="login" class="btn btn-block">
                                                      Sign in
                                                  </button>
                                              </div>
                                          </form>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                  </div>
            </li>
            <li>
              <button type="button" id="register_button" class="btn btn-lg" data-toggle="modal" data-target="#register">Sign Up</button>
                <div id="register" class="modal fade" role="dialog">
                  <div class="modal-dialog">
                      <div class="modal-content">
                          <div class="modal-header">
                              <button type="button" class="close" data-dismiss="modal">&times;</button>
                              <h4 class="modal-title text-center">Member Registration Form</h4>
                          </div>
                          <div class="modal-body">
                                        <form class="form" role="form" method="post" action="index.php" accept-charset="UTF-8">
                                            <div class="form-group">
                                                <label class="sr-only" for="username">Username</label>
                                                <input type="text" name="register_username" class="form-control" placeholder="Username" required>
                                            </div>
                                            <div class="form-group">
                                                <label class="sr-only" for="password">Password</label>
                                                <input type="password" name="register_password" class="form-control"  placeholder="Password" required>
                                            </div>
                                            <div class="form-group">
                                                <button type="submit" name="submit" value="register" class="btn btn-block">
                                                    Sign Up
                                                </button>
                                            </div>
                                        </form>
                          </div>
                          <div class="modal-footer">
                              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                          </div>
                      </div>
                  </div>
                </div>
            </li>';
                    } else {
                        echo ' <li> <a href="../home.php" class="btn btn-lg"> Bienvenue ' . $name . '.</a></li>
                    <li> <a href="../changePassword.php" class="btn btn-lg"> Modifier mot de passe </a> </li>
                    <li> <a href="../logout.php" class="btn btn-lg"> Se déconnecter </a> </li>';
                    }
                    ?>

                </ul>
            </div>
        </div>
    </nav>
    <div id="top">
        <div id="searchbox" class="container-fluid" style="width:112%;margin-left:-6%;margin-right:-6%;">
            <div>
                <form role="search" method="POST" action="Result.php">
                    <input type="text" class="form-control" name="keyword" style="width:80%;margin:20px 10% 20px 10%;" placeholder="Rechercher un livre , auteur ou categorie">
                </form>
            </div>
        </div>

        <div class="container-fluid" id="header">
            <div class="row">
                <div style="text-align: center;"  id="category">
                    <div style="background:#cb2335;color:#fff;font-weight:800;border:none;padding:15px;"> CATEGORIES </div>
                    <ul>
                        <li> <a href="Product.php?value=ROMAN"> ROMAN </a> </li>
                        <li> <a href="Product.php?value=BD"> BD </a> </li>
                        <li> <a href="Product.php?value=COMICS"> COMICS </a> </li>
                        <li> <a href="Product.php?value=MANGAS"> MANGAS </a> </li>
                        <li> <a href="Product.php?value=SCIENCES HUMAINES"> SCIENCES HUMAINES </a> </li>
                        <li> <a href="Product.php?value=LIVRE SCOLAIRE"> LIVRE SCOLAIRE </a> </li>
                        <li> <a href="Product.php?value=LIVRE UNIVERSITAIRE"> LIVRE UNIVERSITAIRE </a> </li>
                        <li> <a href="Product.php?value=BIEN-ETRE"> BIEN-ETRE</a> </li>
                        <li> <a href="Product.php?value=PRATIQUE"> PRATIQUE </a> </li>
                        <li> <a href="Product.php?value=VOYAGE"> VOYAGE</a> </li>

                    </ul>
                </div>
                <!-- <div class="col-md-6 col-lg-6">
                    <div id="myCarousel" class="carousel slide carousel-fade" data-ride="carousel"> -->
                        <!-- Indicators -->
                        <!-- <ol class="carousel-indicators">
                            <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                            <li data-target="#myCarousel" data-slide-to="1"></li>
                            <li data-target="#myCarousel" data-slide-to="2"></li>
                            <li data-target="#myCarousel" data-slide-to="3"></li>
                            <li data-target="#myCarousel" data-slide-to="4"></li>
                            <li data-target="#myCarousel" data-slide-to="5"></li>
                        </ol>


                        <div class="carousel-inner" role="listbox">
                            <div class="item active">
                                <img class="img-responsive" src="img/carousel/1.jpg">
                            </div>

                            <div class="item">
                                <img class="img-responsive " src="img/carousel/2.jpg">
                            </div>

                            <div class="item">
                                <img class="img-responsive" src="img/carousel/3.jpg">
                            </div>

                            <div class="item">
                                <img class="img-responsive" src="img/carousel/4.jpg">
                            </div>

                            <div class="item">
                                <img class="img-responsive" src="img/carousel/5.jpg">
                            </div>

                            <div class="item">
                                <img class="img-responsive" src="img/carousel/6.jpg">
                            </div>
                        </div>
                    </div>
                </div> -->
                <!-- <div class="col-md-3 col-lg-3" id="offer">
                    <a href="http://localhost/app/kb/Product.php?value=INFORMATIQUE"> <img class="img-responsive center-block" src="img/offers/1.png"></a>
                    <a href="http://localhost/app/kb/Product.php?value=SCIENCE"> <img class="img-responsive center-block" src="img/offers/2.png"></a>
                    <a href="http://localhost/app/kb/Product.php?value=Management"> <img class="img-responsive center-block" src="img/offers/3.png"></a>
                </div> -->
            </div>
        </div>
    </div>

    
    <div class="container-fluid text-center" id="new">
        <div class="row">
            <div class="col-sm-6 col-md-3 col-lg-3">
                <a href="http://localhost/bibliotheque/kb/description.php?ID=10">
                    <div class="book-block">
                        <div class="tag">Nouveau</div>
                        <div class="tag-side"><img src="img/tag.png"></div>
                        <img class="book block-center img-responsive" src="img/new/14.jpg">
                        <hr>
                        Le retoure de Lagaffe<br>
                    </div>
                </a>
            </div>
            <div class="col-sm-6 col-md-3 col-lg-3">
                <a href="http://localhost/bibliotheque/kb/description.php?ID=34">
                    <div class="book-block">
                        <div class="tag">Nouveau</div>
                        <div class="tag-side"><img src="img/tag.png"></div>
                        <img class="block-center img-responsive" src="img/new/15.jpg">
                        <hr>
                        Le malade imaginaire - Molière<br>
                    </div>
                </a>
            </div>
            <div class="col-sm-6 col-md-3 col-lg-3">
                <a href="http://localhost/bibliotheque/kb/description.php?ID=41">
                    <div class="book-block">
                        <div class="tag">Nouveau</div>
                        <div class="tag-side"><img src="img/tag.png"></div>
                        <img class="block-center img-responsive" src="img/new/16.jpg">
                        <hr>
                        Droit des obligations - Rémy Cabrillac<br>
                    </div>
                </a>
            </div>
            <div class="col-sm-6 col-md-3 col-lg-3">
                <a href="http://localhost/bibliotheque/kb/description.php?ID=15">
                    <div class="book-block">
                        <div class="tag">Nouveau</div>
                        <div class="tag-side"><img src="img/tag.png"></div>
                        <img class="block-center img-responsive" src="img/new/17.jpg">
                        <hr>
                        The savage sword of Conan - Roy Thomas<br>
                    </div>
                </a>
            </div>
        </div>
    </div>

    <!-- <div class="container-fluid" id="author">
        <h3 style="color:#D67B22;"> AUTEURS POPULAIRES </h3>
        <div class="row">
            <div class="col-sm-5 col-md-3 col-lg-3">
                <a href="Author.php?value=Durjoy%20Datta"><img class="img-responsive center-block" src="img/popular-author/0.jpg"></a>
            </div>
            <div class="col-sm-6 col-md-3 col-lg-3">
                <a href="Author.php?value=Chetan%20Bhagat"><img class="img-responsive center-block" src="img/popular-author/1.jpg"></a>
            </div>
            <div class="col-sm-6 col-md-3 col-lg-3">
                <a href="Author.php?value=Dan%20Brown"><img class="img-responsive center-block" src="img/popular-author/2.jpg"></a>
            </div>
            <div class="col-sm-6 col-md-3 col-lg-3">
                <a href="Author.php?value=Ravinder%20Singh"><img class="img-responsive center-block" src="img/popular-author/3.jpg"></a>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-5 col-md-3 col-lg-3">
                <a href="Author.php?value=Jeffrey%20Archer"><img class="img-responsive center-block" src="img/popular-author/4.jpg"></a>
            </div>
            <div class="col-sm-6 col-md-3 col-lg-3">
                <a href="Author.php?value=Salman%20Rushdie"><img class="img-responsive center-block" src="img/popular-author/5.jpg"><a>
            </div>
            <div class="col-sm-6 col-md-3 col-lg-3">
                <a href="Author.php?value=J%20K%20Rowling"><img class="img-responsive center-block" src="img/popular-author/6.jpg"></a>
            </div>
            <div class="col-sm-6 col-md-3 col-lg-3">
                <a href="Author.php?value=Subrata%20Roy"><img class="img-responsive center-block" src="img/popular-author/7.jpg"></a>
            </div>
        </div>
    </div> -->

    <footer style="margin-left:-6%;margin-right:-6%;">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-7 col-md-5 col-lg-5">
                    <div class="row text-center">
                        <h2>Nos coordonnées</h2>
                        <hr class="primary">
                    </div>
                    <div class="row">
                        <div class="col-md-6 text-center">
                            <span class="glyphicon glyphicon-earphone"> 0327338037</span>
                            <p></p>
                        </div>
                        <div class="col-md-6 text-center">
                            <span class="glyphicon glyphicon-envelope"> thierry.yonne@gmail.com</span>
                            <p></p>
                        </div>
                    </div>
                </div>
                <div class="text-center">
                    <div>
                        <img title="Booking" alt=" logo booking" src="../images/LogoBooking1.png" height="100" style="margin-top: 50px;" />
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <div class="container">

        <button type="button" id="query_button" class="btn btn-lg" data-toggle="modal" data-target="#query">CONTACTEZ NOUS!</button>

        <div class="modal fade" id="query" role="dialog">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header text-center">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Posez votre question ici</h4>
                    </div>
                    <div class="modal-body">
                        <form method="post" action="query.php" class="form" role="form">
                            <div class="form-group">
                                <label class="sr-only" for="name">Nom</label>
                                <input type="text" class="form-control" placeholder="Entrez votre nom" name="sender" required>
                            </div>
                            <div class="form-group">
                                <label class="sr-only" for="email">Email</label>
                                <input type="email" class="form-control" placeholder="abc@mail.com" name="senderEmail" required>
                            </div>
                            <div class="form-group">
                                <label class="sr-only" for="query">Message</label>
                                <textarea class="form-control" rows="5" cols="30" name="message" placeholder="Votre message" required></textarea>
                            </div>
                            <div class="form-group">
                                <button type="submit" name="submit" value="query" class="btn btn-block">
                                    Envoyer
                                </button>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Fermer</button>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>

    <script src="js/bootstrap.min.js"></script>
</body>

</html>