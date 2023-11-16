<?php
include("../setting.php");
session_start();
if(!isset($_SESSION['sid']))
{
	header("location:index.php");
}
$sid=$_SESSION['sid'];
$a=mysqli_query($set,"SELECT * FROM students WHERE sid='$sid'");
$b=mysqli_fetch_array($a);
$name=$b['name'];

?>


<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Books">
    <meta name="author" content="Shivangi Gupta">
   <title>Application de Gestion de Bibliothèque</title>
    
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/my.css" rel="stylesheet">
    <style>
      .modal-header {background:#D67B22;color:#fff;font-weight:800;}
      .modal-body{font-weight:800;}
      .modal-body ul{list-style:none;}
      .modal .btn {background:#D67B22;color:#fff;}
      .modal a{color:#D67B22;}
      .modal-backdrop {position:inherit !important;}
       #login_button,#register_button{background:none;color:#D67B22!important;}       
       #query_button {position:fixed;right:0px;bottom:0px;padding:10px 80px;
                      background-color:#D67B22;color:#fff;border-color:#f05f40;border-radius:2px;}
  	@media(max-width:767px){
        #query_button {padding: 5px 20px;}
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
          <a class="navbar-brand" href="http://localhost/app/kb/empr.php" style="padding: 1px;"><img class="img-responsive" alt="Brand" src="img/logo.png"  style="width: 147px;margin: 0px;"></a>
        </div>

        
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
         <ul class="nav navbar-nav navbar-right">
        <?php
        if(!isset($_SESSION['sid']))
          {
            echo'
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
          } 
        else
          {   echo' <li> <a href="#" class="btn btn-lg"> Hello ' .$name. '.</a></li>
                    <li> <a href="../changePassword.php" class="btn btn-lg"> Modifier mot de passe </a> </li>; 
                    <li> <a href="../logout.php" class="btn btn-lg"> Se déconecter </a> </li>';
					
               
          }
?>

          </ul>
        </div>
      </div>
    </nav>
  <div id="top" >
      <div id="searchbox" class="container-fluid" style="width:112%;margin-left:-6%;margin-right:-6%;">
          <div>
              <form role="search" method="POST" action="Result.php">
                  <input type="text" class="form-control" name="keyword" style="width:80%;margin:20px 10% 20px 10%;" placeholder="Rechercher un livre , auteur ou categorie">
              </form>
          </div>
      </div>

      <div class="container-fluid" id="header">
          <div class="row">
              <div class="col-md-3 col-lg-3" id="category">
                  <div style="background:#D67B22;color:#fff;font-weight:800;border:none;padding:15px;"> Categorie </div>
                  <ul>
                      <li> <a href="block2.php?value=Examen"> Examen  </a> </li>
                      <li> <a href="block2.php?value=SCIENCE"> SCIENCE </a> </li>
                      <li> <a href="block2.php?value=Academic"> Academic </a> </li>
                      <li> <a href="block2.php?value=INFORMATIQUE"> INFORMATIQUE </a> </li>
                      
                      <li> <a href="block2.php?value=ECONOMIE"> ECONOMIE </a> </li>
                      <li> <a href="block2.php?value=Management"> Management </a> </li>
                      <li> <a href="block2.php?value=Professional"> Professional </a> </li>

                  </ul>
              </div>
              <div class="col-md-6 col-lg-6">
                  <div id="myCarousel" class="carousel slide carousel-fade" data-ride="carousel">
                      
                      <ol class="carousel-indicators">
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
                            <img class="img-responsive "src="img/carousel/2.jpg">
                          </div>

                          <div class="item">
                            <img class="img-responsive" src="img/carousel/3.jpg">
                          </div>

                          <div class="item">
                            <img class="img-responsive"src="img/carousel/4.jpg">
                          </div>

                          <div class="item">
                            <img class="img-responsive" src="img/carousel/5.jpg">
                          </div>

                          <div class="item">
                            <img class="img-responsive" src="img/carousel/6.jpg">
                          </div>
                      </div>
                  </div>
              </div>
              <div class="col-md-3 col-lg-3" id="offer">
                  <a href="http://localhost/app/kb/block2.php?value=INFORMATIQUE">              <img class="img-responsive center-block" src="img/offers/1.png"></a>
                  <a href="http://localhost/app/kb/block2.php?value=SCIENCE">        <img class="img-responsive center-block" src="img/offers/2.png"></a>
                  <a href="http://localhost/app/kb/block2.php?value=Management"> <img class="img-responsive center-block" src="img/offers/3.png"></a>
              </div>
          </div>
      </div>
  </div>

  <div class="container-fluid text-center" id="new">
      <div class="row">
          <div class="col-sm-6 col-md-3 col-lg-3">
           <a href="description.php?ID=NEW-1&category=new">
              <div class="book-block">
                  <div class="tag">Nouveau</div>
                  <div class="tag-side"><img src="img/tag.png"></div>
                  <img class="book block-center img-responsive" src="img/new/1.jpg">
                  <hr>
                  Principles of management <br>
                
                  
              </div>
            </a>
          </div>
          <div class="col-sm-6 col-md-3 col-lg-3">
           <a href="description.php?ID=NEW-2&category=new">
              <div class="book-block">
                  <div class="tag">Nouveau</div>
                  <div class="tag-side"><img src="img/tag.png"></div>
                  <img class="block-center img-responsive" src="img/new/2.jpg">
                  <hr>
                   General Knowledge<br>
                 
               
              </div>
            </a>
          </div>
          <div class="col-sm-6 col-md-3 col-lg-3">
           <a href="description.php?ID=NEW-3&category=new">
              <div class="book-block">
                  <div class="tag">Nouveau</div>
                  <div class="tag-side"><img src="img/tag.png"></div>
                  <img class="block-center img-responsive" src="img/new/3.png">
                  <hr>
                   Family Bussiness Mantras <br>
                  
               
              </div>
            </a>
          </div>
          <div class="col-sm-6 col-md-3 col-lg-3">
           <a href="description.php?ID=NEW-4&category=new">
              <div class="book-block">
                  <div class="tag">Nouveau</div>
                  <div class="tag-side"><img src="img/tag.png"></div>
                  <img class="block-center img-responsive" src="img/new/4.jpg">
                  <hr>
                  SSC Mathematics Chapterwise Solutions <br>
                  
                  
              </div>
            </a>
          </div>
      </div>
  </div>

  <div class="container-fluid" id="author">
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
  </div>

  <footer style="margin-left:-6%;margin-right:-6%;">
      <div class="container-fluid">
          <div class="row">
              <div class="col-sm-1 col-md-1 col-lg-1">
              </div>
              <div class="col-sm-7 col-md-5 col-lg-5">
                  <div class="row text-center">
                      <h2>à propos de nous</h2>
                      <hr class="primary">
                      <p>Encore confus? Appelez-nous ou envoyez-nous un e-mail et nous vous répondrons dans les plus brefs délais!</p>
                  </div>
                  <div class="row">
                      <div class="col-md-6 text-center">
                          <span class="glyphicon glyphicon-earphone"></span>
                          <p>0666908045</p>
                      </div>
                      <div class="col-md-6 text-center">
                          <span class="glyphicon glyphicon-envelope"></span>
                          <p>youssef.lekfif@ump.ac.ma</p>
						  <p>reda.haiki@ump.ac.ma</p>
                      </div>
                  </div>
              </div>
              <div class="hidden-sm-down col-md-2 col-lg-2">
              </div>
              <div class="col-sm-4 col-md-3 col-lg-3 text-center">
                  <h2 style="color:#D67B22;">Site ESTO</h2>
                  <div>
                      <a href="http://esto.ump.ma/">
                      <img title="ESTO" alt="ESTO" src="img/social/EST.png" width="35" height="35" />
                      </a>
                      
                      </a>
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
                             <input type="text" class="form-control"  placeholder="Entrez votre nom" name="sender" required>
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