<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Accounting system for small factories">
    <meta name="author" content="Apna Munshi">

    <title>Apna Munshi</title>

    <!-- Bootstrap core CSS -->
    {{ HTML::style('plugins/bootstrap/bootstrap.css') }}
    {{ HTML::style('plugins/jquery-ui/jquery-ui.min.css') }}

    <!-- Custom Google Web Font -->
    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
     <link href='http://fonts.googleapis.com/css?family=Righteous' rel='stylesheet' type='text/css'>
    <!-- Add custom CSS here -->
    {{ HTML::style('css/custom.css') }}
    <script src='https://www.google.com/recaptcha/api.js'></script>

</head>

<body  @if(!Auth::check()) onLoad="$('#login').modal('show'); @endif">

  <nav class="navbar navbar-default navbar-fixed-top" role="navigation">
  <!-- Brand and toggle get grouped for better mobile display -->
  <div class="navbar-header">
    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
      <span class="sr-only">Toggle navigation</span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
    </button>
    <a class="navbar-brand" href="/">Apna Munshi</a>
  </div>

  <!-- Collect the nav links, forms, and other content for toggling -->
  <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
    <ul class="nav navbar-nav navbar-right">
      <li><a href="#" class="scroll-link" data-id="home">Home</a></li>
      <li><a href="#" class="scroll-link" data-id="about">About Us</a></li>
      <li><a href="#" class="scroll-link" data-id="services">Features</a></li>
      <li><a href="#" class="scroll-link" data-id="pricing">Pricing</a></li>
      <li><a href="#" class="scroll-link" data-id="contact">Contact Us</a></li>
      @if(!Auth::check())
      <li><a style="cursor:pointer;" id="loginpopup" class="imp">Login / Signup</a></li>
      @else
       <li><a href="{{URL::route('logout')}}" onclick="return confirm('Are you sure?')">Logout</a></li>
      @endif
      <li><a></a></li>
    </ul>
  </div><!-- /.navbar-collapse -->
  </nav>
  <!-- Code for Login / Signup Popup -->
  <!-- Modal Log in -->
  <div class="modal fade" id="login" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1" aria-hidden="true">
    <div class="modal-dialog" style="margin-top: 150px;">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4 class="modal-title" id="myModalLabel1">Login</h4>
        </div>
        <div class="modal-body" id="login_details">
          <span> Already have an account? </span> </br></br>
           <p class="error" id="login-error">Username/Password is incorrect</p>
          <form action="{{ url('login') }}" method="post" id="login_form">
            <label for="username">username:</label>
            <label for="username" class="error" id="username-error"></label>
            <p><input type="text" name="username" placeholder="username" /></p>
            
            <label for="password">Password:</label>
            <label for="password" class="error" id="password-error"></label>
            <p><input type="password" name="password" placeholder="Password" /></p>
            <?php echo Form::token();?>
        <div class="modal-footer" >
      <input style="float: left" type="submit" class="btn btn-success" value="Log In" />
      </form> 
         <span class="fp-link"> <a href="#">Forgot Password?</a></span>
         </br></br>
      <span> Not a member yet?</span>
      <span id="signup-link" style="cursor:pointer;" class="text-info">Sign Up!</span>
        </div>
      </div> 
      </div>
      </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
  </div><!-- /.modal -->
 <!--Modal Login Ends -->
 <!-- Modal Sign-up Starts -->
  <div class="modal fade" id="signup" tabindex="-1" role="dialog" aria-labelledby="myModalLabel2" aria-hidden="true">
    <div class="modal-dialog" style="margin-top: 100px;">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4 class="modal-title" id="myModalLabel2">Sign Up</h4>
        </div>
        <div class="modal-body" id="signup_details">
          <div id="sign_up-errors" class="errors"></div>
          <form action="{{ url('registerCompany') }}" method="post" id="sign_up_form">

            <label for="username">username:</label>
            <label for="username" class="error" id="username-error"></label>
            <p><input type="text" name="username" id="username" placeholder="username" /></p>

            <label for="email">email:</label>
            <label for="email" class="error" id="email-error"></label>
            <p><input type="text" name="email" id="email" placeholder="email" /></p>

            <label for="password">Password:</label>
            <label for="password" class="error" id="password-error"></label>
            <p><input type="password" name="password" id="password" placeholder="Password" /></p>

            <label for="password_confirmation">Confirm Password:</label>
            <label for="password_confirmation" class="error" id="password_confirmation-error"></label>
            <p><input type="password" name="password_confirmation" id="password_confirmation" placeholder="Password confirmation " /></p>

            <label for="company">Company Name:</label>
            <label for="company" class="error" id="company-error"></label>
            <p><input type="text" name="company" id="company" placeholder="company" /></p>

            <label for="description">Description:</label>
            <label for="description" class="error" id="description-error"></label>
            <p><textarea  name="description" class="description" id="description" placeholder="description" maxlength="500"></textarea></p>
            <?php echo Form::token()?>
        </div>
        <div class="modal-footer" >
        <input style="float: left" type="submit" class="btn btn-success"  value="Sign Me Up" />
      </form> 
         <span>&nbsp;&nbsp;&nbsp; Already a member? </span><span id="login-link" class="text-info" style="cursor:pointer;">  Login now  </span> 
     </div>
      </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
  </div><!-- /.modal -->
  <!-- Modal Sign up ends! -->
  <!-- End code for Login / Signup Popup -->
    <div class="intro-header" id="home">
    <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
            <!-- Indicators -->
            <ol class="carousel-indicators">
              <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
              <li data-target="#carousel-example-generic" data-slide-to="1"></li>
              <li data-target="#carousel-example-generic" data-slide-to="2"></li>
            </ol>
          
            <!-- Wrapper for slides -->
            <div class="carousel-inner">
              <div class="item active">
                <img src="img/img4.jpg" alt="First Image">
                <div class="carousel-caption">
                </div>
              </div>
              <div class="item">
                <img src="img/img5.jpg" alt="Second Image">
                <div class="carousel-caption">
                </div>
              </div>
              <div class="item">
                <img src="img/img6.jpg" alt="Third Image">
                <div class="carousel-caption">
                </div>
              </div>
            </div>
          
            <!-- Controls -->
            <a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
              <i class="fa fa-arrow-left"></i>
            </a>
            <a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
              <i class="fa fa-arrow-right"></i>
            </a>
          </div>
        
        <!-- /.container -->

    </div>
    <!-- /.intro-header -->

    <div class="content-section-a" id="about">

        <div class="container">

            <div class="row">
                <div class="col-lg-5 col-sm-6">
                    <div class="clearfix"></div>
                    <h2 class="section-heading">About Us
                    <p class="lead">Solving the accounting problems of small factories is the mission which gave birth to ApnaMunshi.
                     With a web based accounting system, you can manage your accounts on the go.We manage all your accounts and keep them safe. Your accounts are regularly backed up 
                     to prevent any loss of data.The thing which makes us unique is our simplicity,hence easily manageable accounts.Also there may be more than one factories in your company 
                     and ApnaMunshi can take care of all.So what are you waiting for,sign up and have your apna munshi.</p>
                </div>
                <div class="col-lg-5 col-lg-offset-2 col-sm-6">
                    <img class="img-responsive" src="img/ipad.png" alt="">
                </div>
            </div>

        </div>
        <!-- /.container -->

    </div>
    <!-- /.content-section-a -->

    <div class="content-section-b" id="services">

        <div class="container">

            <div class="row">
                <div class="col-lg-5 col-lg-offset-1 col-sm-push-6  col-sm-6">
                    <h2 class="section-heading">Features</h2>
                    <p class="lead">We have put a large effort in making a system,that suits the needs of all the customers.Our system offers a lot of
                        features. Some prominent features are
                      
                        <li>Manage your daily reports.</li>
                        <li>Add products.</li>
                        <li>Add Categories</li>
                        <li>Add as many clients as you want</li>
                        <li>Separate prices of products for each client</li>
                        <li>Manage all emoloyees</li>
                        <li>Ability to view sales report</li>
                        <li>Simple to use</li>
                        <li>Different user levels</li>
                        <li>Ability to print reports and bills</li>
                        <li>Make direct Challans</li>
                      
                    </p>
                  </div>
                <div class="col-lg-5 col-sm-pull-6  col-sm-6">
                    <img class="img-responsive" src="img/features.jpg" alt="">
                </div>
            </div>

        </div>
        <!-- /.container -->

    </div>
    <!-- /.content-section-b -->
    <div class="content-section-a" id="pricing">
        <div class="container">
            <div class="row flat">
              <div class="col-md-2"></div>
            <div class="col-lg-3 col-md-3 col-xs-6">
                <ul class="plan plan1">
                    <li class="plan-name">
                        Free Trial
                    </li>
                    <li class="plan-price">
                        <strong>$0</strong> / month
                    </li>
                    <li>
                        <strong>1</strong> Factory
                    </li>
                    <li>
                        <strong>30</strong> Days
                    </li>
                    <li>
                        <strong>0</strong> backups
                    </li>
                    <li>
                        <strong>Limited</strong> Speed
                    </li>
                    <li class="plan-action">
                        <a href="#" class="btn btn-danger btn-lg">Signup</a>
                    </li>
                </ul>
            </div>

            <div class="col-lg-3 col-md-3 col-xs-6">
                <ul class="plan plan2 featured">
                    <li class="plan-name">
                        Standard
                    </li>
                     <li class="plan-price">
                        <strong>$20</strong> / month
                    </li>
                    <li>
                        <strong>3</strong> Factories
                    </li>
                    <li>
                        <strong>1</strong> backups/week
                    </li>
                    <li>
                        <strong>Unlimited</strong> Speed
                    </li>
                    <li>
                        <strong>12 hours</strong> Customer Support
                    </li>
                    <li>
                        <strong>Paid</strong> Featured Listing
                     </li>
                    <li class="plan-action">
                     <a href="#" class="btn btn-danger btn-lg">Signup</a>
                 </li>
             </ul>
         </div>

         <div class="col-lg-3 col-md-3 col-xs-6">
            <ul class="plan plan3">
                <li class="plan-name">
                    Advanced
                </li>
                 <li class="plan-price">
                        <strong>$50</strong> / month
                </li>
                 <li>
                        <strong>Unlimited</strong> Factories
                  </li>
                  <li>
                        <strong>7</strong> backups/week
                  </li>
                  <li>
                        <strong>Unlimited</strong> Speed
                  </li>
                  <li>
                        <strong>24 hours</strong> Customer Support
                  </li>
                  <li>
                        <strong>Free </strong>Featured Listing
                  </li>
                <li class="plan-action">
                 <a href="#" class="btn btn-danger btn-lg">Signup</a>
             </li>
         </ul>
        </div>
        </div>
    </div>
    <div class="content-section-a" id="contact">

        <div class="container">

            <div class="row">
                <div class="col-lg-5 col-sm-6">
                    <h2 class="section-heading">Contact Us</h2>
                    <form name="sentMessage" class="well" id="contactForm"  novalidate>
                     <div class="control-group">
                        <div class="controls">
                            <input type="text" class="form-control" placeholder="Full Name" id="name" required data-validation-required-message="Please enter your name" />
                              <p class="help-block"></p>
                       </div>
                     </div>         
                    <div class="control-group">
                      <div class="controls">
                            <input type="email" class="form-control" placeholder="Email" id="email" required data-validation-required-message="Please enter your email" />
                            <p class="help-block"></p>
                    </div>
                  </div>         
                                
                     <div class="control-group">
                       <div class="controls">
                                       <textarea rows="10" cols="100" class="form-control" placeholder="Message" id="message" required data-validation-required-message="Please enter your message" minlength="5" data-validation-minlength-message="Min 5 characters" maxlength="999" style="resize:none"></textarea>
                                       <p class="help-block"></p>
                      </div>
                     </div>                  
                   <div id="success"> </div> <!-- For success/fail messages -->
                  <button type="submit" class="btn btn-primary pull-right">Send</button><br /><br/>
                </form>
                </div>
                <div class="col-lg-5 col-lg-offset-2 col-sm-6">
                    <!-- <img class="img-responsive" src="img/map.gif" alt="">  -->
                </div>
            </div>

        </div>
        <!-- /.container -->

    </div>
    <!-- /.content-section-a -->

    <footer>
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <ul class="list-inline">
                        <li><a href="#home">Home</a>
                        </li>
                        <li class="footer-menu-divider">&sdot;</li>
                        <li><a href="#about">About</a>
                        </li>
                        <li class="footer-menu-divider">&sdot;</li>
                        <li><a href="#services">Features</a>
                        </li>
                        <li class="footer-menu-divider">&sdot;</li>
                        <li><a href="#contact">Contact</a>
                        </li>
                    </ul>
                    <p class="copyright text-muted small">Copyright &copy; ApnaMunshi 2014. All Rights Reserved</p>
                </div>
            </div>
        </div>
    </footer>
{{ HTML::script('plugins/jquery/jquery-2.1.0.min.js'); }}
{{ HTML::script('http://ajax.aspnetcdn.com/ajax/jquery.validate/1.13.1/jquery.validate.js'); }}

{{ HTML::script('js/custom.js'); }}
<!-- Include all compiled plugins (below), or include individual files as needed -->
{{ HTML::script('plugins/bootstrap/bootstrap.min.js'); }}
</body>

</html>
