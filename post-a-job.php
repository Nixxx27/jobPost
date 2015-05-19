<?php
    require 'init.php';
    $jobs = new jobs();
    $title = trim(htmlspecialchars($_POST['title']));
    $qualifications = trim(htmlspecialchars($_POST['qualifications']));

    if(!empty($title) && ($qualifications)){
        $jobs->getJobDetails($title,$qualifications);
        $jobs->addJobs();
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php 
        require 'head.php'; 
        require 'sec_access.php';
        echo  pageTitle('Posting');
    ?>
</head>
<body>

    <div class="container">
        <div class="col-md-12" style="text-align:right;padding-top:10px">
            <i class="fa fa-sign-out fa-2x" title="Sign-Out" style="cursor: pointer;" onClick="logOut()"></i>
        </div>
        <div class="jumbotron" style="background-image: url('images/ads.jpg')">
            <h1 style="text-shadow:2px 2px black;background-color:#dc0b1a"><strong style="color:white;margin-left:10px">post A <span>job!</span> </strong></h1>
            <h2><strong> SkyLogistics Philippines Inc. <span style="color:#eb1818">| Job <span style="font-style:italic">Portal</span>  </strong></h2> 
        </div>
        <noscript><h3><strong><span style="color:red">Sorry</span>, your browser does not <span style="font-style:italic">support</span> JavaScript!<span style="color:red">!</span></strong></h3></noscript>
        <div class="row" style="border:1px dashed #bfc0c2">
            
            <div class="col-sm-4 col-md-4 col-lg-4" >
               <?php $jobs->jobTitleCount(); ?>
                <a class="btn btn-success btn-sm" href="http://skylogistics.com.ph/career-opportunities" target="_blank">view in website <i class="fa fa-chevron-right"></i></a>
            </div>


            <div class="col-sm-8 col-md-8 col-lg-8" style="padding:10px;border-left:2px outset">
               <form action="" method="POST" name="jobForm"> 
                    <h4><strong>Job Title:</strong></h4>
                        <input type="text" name="title" id="title" class="form-control" required>
                    <h4><strong>Qualifications:</strong></h4>
                        <textarea name="qualifications" id="qualifications" class="form-control" rows="10" required></textarea>
                    <br/>
                    <button type="submit" class="btn btn-primary" onClick="validateJob()"><i class="fa fa-external-link"></i> Post Job</button>
                   
                </form>
            </div>
        </div><!--row-->

        <?php include 'footer.php' ?>


    </div><!--container-->
</body>
</html>
  
