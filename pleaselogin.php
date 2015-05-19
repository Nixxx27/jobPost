<?php
    require 'init.php';
    $user = new user();
    $username = trim(htmlspecialchars($_POST['username']));
    $password = trim(htmlspecialchars($_POST['password']));
        
    if(!empty($username) && ($password)){
        $user->getLoginDetails($username,$password);
        $user->verifyUser();
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php
        require 'head.php'; 
        echo  pageTitle('Log in');
    ?>
</head>

<body>
    <div class="container">
        <div class="jumbotron" style="background-image: url('images/ads.jpg')">
            <h1 style="text-shadow:2px 2px black;background-color:#dc0b1a"><strong style="color:white;margin-left:10px">post A <span>job!</span> </strong></h1>
            <h2><strong> SkyLogistics Philippines Inc. <span style="color:#eb1818">| Job <span style="font-style:italic">Portal</span>  </strong></h2> 
        </div>
        
        <div class="row" >
            <div class="col-sm-7 col-md-7 col-lg-7">
                <img src="images/recruiter.jpg" class="img-responsive">
            </div>
            <div class="col-sm-5 col-md-5 col-lg-5 pull-right" style="padding:10px;border-left:2px outset">
               <form action="" method="POST" name="loginForm"> 
                <div class="input-group">
                    <span class="input-group-addon" id="basic-addon1">UN:</span>
                    <input type="text" class="form-control" placeholder="Username" name="username" required aria-describedby="basic-addon1">
                </div>
                <hr>
                <div class="input-group">
                    <span class="input-group-addon" id="basic-addon2">PW:</span>
                    <input type="password" class="form-control" placeholder="Password" name="password" required aria-describedby="basic-addon2">
                </div>
                <br/>
                    <h4><strong>Sorry you are not Log-in!</strong></h4>
                    <button type="submit" class="btn btn-primary" onClick="validateUser()">Login <i class="fa fa-chevron-circle-right"></i></button>
                </form>
            </div>
        </div><!--row-->

        <?php include 'footer.php' ?>

    </div><!--container-->
</body>
</html>
  
