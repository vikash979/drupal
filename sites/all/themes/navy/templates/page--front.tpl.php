  <?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "navy";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
$sql = "SELECT * FROM field_revision_field_officers_name";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    $officers_name = array();
    while($row = $result->fetch_assoc()) {
        $sqlimage = "SELECT * FROM  field_revision_field_officers_image where bundle = '".$row['bundle']."' and  entity_id='".$row['entity_id']."'";
        $result_image = $conn->query($sqlimage);
        $row_image = $result_image->fetch_assoc();
        $sqlimage_path = "SELECT * FROM  file_managed where fid = '".$row_image['field_officers_image_fid']."'";
        $imagename = $conn->query($sqlimage_path);
        $row_imagename = $imagename->fetch_assoc();
        // $row_image = $result_image->fetch_assoc();

        
        $data=array('entity_type' =>$row['entity_type'],'officers_name' =>$row['field_officers_name_value'],'filename'=> $row_imagename['filename']);
       
        array_push($officers_name,$data);
        
        

    }
} else {
    echo "0 results";
}
 

?> 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Titlee</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php print base_path() . path_to_theme() .'/' ?>css/bootstrap.css" integrity="" crossorigin="anonymous"> 
    <link rel="stylesheet" href="<?php print base_path() . path_to_theme() .'/' ?>css/all.css">
    <link rel="stylesheet" href="<?php print base_path() . path_to_theme() .'/' ?>css/style.css">
	<link rel="stylesheet" href="<?php print base_path() . path_to_theme() .'/' ?>css/sample.css">
	<link rel="stylesheet" href="<?php print base_path() . path_to_theme() .'/' ?>css/simple-accordion.css">
	<link rel="stylesheet" href="<?php print base_path() . path_to_theme() .'/' ?>css/javascriptop.css">
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
		
    <!--<script src="<?php print base_path() . path_to_theme() .'/' ?>js/jquery.slim.js" crossorigin="anonymous"></script>-->
	<script src="<?php print base_path() . path_to_theme() .'/' ?>js/jquery.simple.accoridion.js" crossorigin="anonymous"></script>    
    <script src="<?php print base_path() . path_to_theme() .'/' ?>js/bootstrap.js" integrity="" crossorigin="anonymous"></script>
	<script>
		// accordion
		jQuery(function($){
			$('.ac').simpleAccordion({
				useLinks: false
			});
		});
	</script>
    <style type="text/css">



        .megamenu {
            position: static;
        }

        .megamenu .dropdown-menu {
            background: none;
            border: none;
            width: 100%;
        }

        .bg-megamenu{background: linear-gradient(to right, rgba(149, 149, 245, 0.95), rgba(171, 176, 214, 0.95)) !important;
        }



        .circle{
            width: 110px !important;
            height: 110px !important;
        }

        .sh-side-options {
            position: fixed;
            top: 0; bottom: 0;
            right: 0;
            z-index: 12345678902;
            transition: 0.3s all ease;
            transition: 0.2s all;
            padding: 0 0;
            width: 420px;
            transform: translateX(420px);
        }

        .sh-side-options.open {
            transform: translateX(0px);
            box-shadow: 0 0px 39px 10px rgba(0,0,0,0.2);
        }

        .sh-side-options-container {
            position: absolute;
            top: 216px; left: -75px;
            width: 60px;
            background-color: rgba(255,255,2555,1);
            border-radius: 5px;
            margin-right: 15px;
            box-shadow: -10px 0px 20px 2px rgba(0,0,0,.06);
        }


        .sh-side-options.sh-side-options-pages .sh-side-options-container {
            top: 150px;
        }



        .sh-side-options-item {
            display: block;
            text-align: center;
            margin: 0px;
            transition: 0.3s all ease-in-out;
            position: relative;
            padding: 7px;
            cursor: pointer;
        }

        .sh-side-options-item:not(:last-child) {
            border-bottom: 1px solid #f1f3fc;
        }

        .sh-side-options-item-container {
            border-radius: 4px;
            padding: 8px 0;
        }

        .sh-side-options-item:hover .sh-side-options-item-container,
        .sh-side-options-item:focus .sh-side-options-item-container,
        .sh-side-options.open .sh-side-options-item-trigger-demos .sh-side-options-item-container {
            background-color: #f3f5fd;
        }




        .sh-side-options-item i {
            font-size: 22px;
        }

        .sh-side-options-item:not(:hover):not(:focus) {
            color: #9396a5!important;
        }

        .sh-side-options-item:hover .sh-side-options-hover {
            opacity: 1;
            transform: translateX(-97%);
        }

        .sh-side-options-hover {
            position: absolute;
            background-color: #ffffff;
            color: #32343d;
            padding: 20px 26px;
            transform: translateX(-70%);
            left: 0px;
            top: 0;
            bottom: 0;
            opacity: 0;
            transition: 0.2s all ease-in-out;
            z-index: -100;
            border-top-left-radius: 5px;
            border-bottom-left-radius: 5px;
            font-size: 13px;
            box-shadow: 0px 0px 20px 2px rgba(0,0,0,0.08);
        }

        .sh-side-options-hover span {
            padding: 0px 3px;
        }

        @media (max-width: 700px) {

            .sh-side-options {
                width: 52px;
            }

            .sh-side-options-item {
                padding: 10px 0;
            }

            .sh-side-options-item i {
                font-size: 16px;
            }

        }

        @media (max-width: 600px) {

            .sh-side-options {
                display: none;
            }

        }

        @media (max-height: 500px) {
            .sh-side-options {
                top: 120px!important;
            }
        }


        .sh-side-options-item i {
            color: #9396a5!important;
        }

        .sh-side-options.open .sh-side-options-item-trigger-demos i,
        .sh-side-options-item:hover i,
        .sh-side-options-item:focus i {
            color: #294cff!important;
        }



        /*
        ** Side Demos
        */
        .sh-side-demos-container {
            top: 0; left: 0; right: -17px; bottom: 0;
            position: absolute;
            overflow-y: scroll;
            background-color: #fff;
            background-repeat: no-repeat;
            background-position: right top;
            padding: 22px;
        }

        body.admin-bar .sh-side-demos-container {
            top: 32px;
        }


        /* Demos Text */
        .sh-side-demos-intro {
            text-align: center;
        }

        .sh-side-demos-intro-title {
            font-size: 24px;
            font-weight: 300;
            margin-top: 25px;
            margin-bottom: 15px;
        }

        .sh-side-demos-intro-title img {
            height: 24px;
            top: -6px;
            position: relative;
        }

        .sh-side-demos-intro-descr {
            max-width: 250px;
            margin: 0 auto;
            display: table;
            color: #838794;
        }



        /* Demos Close Button */
        .sh-side-demos-container-close {
            position: absolute;
            top: 22px;
            right: 22px;
            cursor: pointer;
        }

        .sh-side-demos-container-close i {
            color: #c5c5c5;
            font-size: 18px;
            transition: 0.3s all ease;
        }

        .sh-side-demos-container-close:hover i,
        .sh-side-demos-container-close:focus i {
            color: #7f7f7f;
        }


        /* Demo Items */
        .sh-side-demos-loop-container {
            position: relative;
            margin: 0 -10px;
            margin-top: 28px;
        }

        .sh-side-demos-item {
            display: inline-block;
            position: relative;
            margin-right: -4px;
            margin-bottom: 25px;
            width: 50%;
            padding: 0 10px;
            text-align: center;
            transition: .3s all ease;
            top: 0;
        }

        .sh-side-demos-item:hover {
            top: -4px;
        }

        .sh-side-demos-item .sh-image-lazy-loading {
            border-radius: 3px;
            box-shadow: 0 2px 20px 1px rgba(0,0,0,.1);
        }

        .sh-side-demos-item img {
            border-radius: 3px;
        }

        .sh-side-demos-item-name {
            font-size: 12px;
            color: #32343d;
            font-weight: 600;
            padding-top: 10px;
        }

        .sh-side-demos-item-tag {
            position: absolute!important;
            width: auto!important;
            height: auto!important;
            top: 4px;
            left: 6px;
            background-color: #ff5944;
            color: #fff;
            font-size: 9px;
            font-weight: 600;
            display: block;
            padding: 1px 9px;
            text-transform: capitalize;
            border-radius: 100px;
        }
        .mb--1{
          margin-bottom: -0.5em !important;
        }

    </style>
</head>
<body>

<section class="">
    <div class="contact_c_sec scrollable" style="height: 100vh;">
        <div class="container pr-0 pl-0" style="border:10px solid white;">
            <div class="row">
                <div class="col-md-12">
                    <header>
                        <div class="bg-white ">
                            <img class="w-100" src="<?php print base_path() . path_to_theme() .'/' ?>images/headertemp.jpg">

                        </div>
                        <nav class="navbar mt-0 pt-0 navbar-expand-lg navbar-dark w-100  topbar bg-blue">
                            <div class="container">
<!--
                                <a class="navbar-brand" href="index.html"><img src="<?php print base_path() . path_to_theme() .'/' ?>images/logo.png"/> </a>
-->
                                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                                    <span class="navbar-toggler-icon"></span>
                                </button>
                                <div class="collapse navbar-collapse" id="navbarResponsive">
                                    <ul class="navbar-nav ml-auto">
                                        <li class="nav-item">
                                            <a class="nav-link" data-pick="topbar" href="index.html">Home
                                                <!--                        <span class="sr-only">(current)</span>-->
                                            </a>
                                        </li>

                                        <li class="nav-item dropdown megamenu ">
                                            <a id="megamneu" class="nav-link dropdown-toggle text-blue" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" >
                                                Services
                                            </a>
                                            <div aria-labelledby="megamneu" class="dropdown-menu border-0 p-0 m-0 ">
                                                <div class="container">
                                                    <div class="row bg-megamenu rounded-0 m-0 box-shadwo">
                                                        <div class="col-lg-12 col-xl-12 p-2">
                                                            <div class="p-4">
                                                                <div class="row">
                                                                    <div class="col-md-3 col-sm-6 wow fadeInDown">
                                                                        <div class="serviceBox blue w-100 box-shadwo b-rds-1">
                                                                            <h3 class="title text-center"> Services 1</h3>
                                                                            <div class="text-center">
                                                                                <span><i class="fa fa-rocket"></i></span>
                                                                            </div>
                                                                            <p class="description p-2">Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-3 col-sm-6 wow fadeInDown">
                                                                        <div class="serviceBox blue w-100 box-shadwo b-rds-1">
                                                                            <h3 class="title text-center">Services</h3>
                                                                            <div class="text-center">
                                                                                <span><i class="fa fa-rocket"></i></span>
                                                                            </div>
                                                                            <p class="description p-2">Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-3 col-sm-6 wow fadeInDown">
                                                                        <div class="serviceBox blue w-100 box-shadwo b-rds-1">
                                                                            <h3 class="title text-center">Servicest</h3>
                                                                            <div class="text-center">
                                                                                <span><i class="fa fa-rocket"></i></span>
                                                                            </div>
                                                                            <p class="description p-2">Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-3 col-sm-6 wow fadeInDown">
                                                                        <div class="serviceBox blue w-100 box-shadwo b-rds-1">
                                                                            <h3 class="title text-center">Services</h3>
                                                                            <div class="text-center">
                                                                                <span><i class="fa fa-rocket"></i></span>
                                                                            </div>
                                                                            <p class="description p-2">Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-3 col-sm-6 wow fadeInUp">
                                                                        <div class="serviceBox blue w-100 box-shadwo b-rds-1">
                                                                            <h3 class="title text-center">Services</h3>
                                                                            <div class="text-center">
                                                                                <span><i class="fa fa-rocket"></i></span>
                                                                            </div>
                                                                            <p class="description p-2">Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-3 col-sm-6 wow fadeInUp">
                                                                        <div class="serviceBox blue w-100 box-shadwo b-rds-1">
                                                                            <h3 class="title text-center">Services</h3>
                                                                            <div class="text-center">
                                                                                <span><i class="fa fa-rocket"></i></span>
                                                                            </div>
                                                                            <p class="description p-2">Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-3 col-sm-6 wow fadeInUp">
                                                                        <div class="serviceBox blue w-100 box-shadwo b-rds-1">
                                                                            <h3 class="title text-center">Services</h3>
                                                                            <div class="text-center">
                                                                                <span><i class="fa fa-rocket"></i></span>
                                                                            </div>
                                                                            <p class="description p-2">Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-3 col-sm-6 wow fadeInUp">
                                                                        <div class="serviceBox blue w-100 box-shadwo b-rds-1">
                                                                            <h3 class="title text-center">Services</h3>
                                                                            <div class="text-center">
                                                                                <span><i class="fa fa-rocket"></i></span>
                                                                            </div>
                                                                            <p class="description p-2">Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!--<div class="col-lg-5 col-xl-4 px-0 d-none d-lg-block" style="background: center center url(https://res.cloudinary.com/mhmd/image/upload/v1556990826/mega_bmtcdb.png)no-repeat; background-size: cover;"></div>
                             -->                    </div>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" data-pick="about" href="#">About Indian Navy</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" data-pick="classes" href="#">About MILAN</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" data-pick="coach" href="#">Event Schedule</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" data-pick="blog" href="">Media</a>
                                        </li>

                                    </ul>
                                </div>
                            </div>
                        </nav>
                    </header>
                </div>
            </div>
            <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                </ol>
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img class="w-100 h-50" src="<?php print base_path() . path_to_theme() .'/' ?>images/1-image-30.jpg" alt="banner one">
                        <div class="carousel-caption d-none d-md-block">
                            <h5>Title </h5>
                            <p>Description</p>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img class="w-100 h-50" src="<?php print base_path() . path_to_theme() .'/' ?>images/1-image-30.jpg" alt="banner one">
                        <div class="carousel-caption d-none d-md-block">
                            <h5>Title </h5>
                            <p>Description</p>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img class="w-100 h-50" src="<?php print base_path() . path_to_theme() .'/' ?>images/1-image-30.jpg" alt="banner one">
                        <div class="carousel-caption d-none d-md-block">
                            <h5>Title </h5>
                            <p>Description</p>
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
            <div class="bg-info text-white">
                <marquee class="w-100 h5 pb-0 pt-1" behavior="scroll" direction="left"
                         onmouseover="this.setAttribute('scrollamount', 3, 0);"
                         onmouseout="this.setAttribute('scrollamount', 2, 0);">
                    This example will take only 100% width
                </marquee>
            </div>
            <div class="container">
            <div class="row m-1">
                <div class="col-md-3 border">
                    <div class="">
                        <div class="justify-content-center pl-1 pt-3">
                        <?php print render($page['publication']); ?>
                        </div>
                        <div class="justify-content-center pl-1 pt-3">
                            <?php print render($page['policy']); ?>
                        </div>

                    </div>
                </div>
                <div class="col-md-5 border text-white w-100 p-0">
                    <img class="w-100 h-100" src="<?php print base_path() . path_to_theme() .'/' ?>images/physical_earth_satellite_image.jpg">
                </div>
                <div class="col-md-4 border text-white">
                    <div class="">
                    <h3 class="text-center mt-3 mb-2"><img class="w-100" src="<?php print base_path() . path_to_theme() .'/' ?>images/milan-news-1.png"> </h3>
                    <p class="p-2">
                       <marquee direction="up" onmouseout="this.setAttribute('scrollamount', 2, 0);" onmouseover="this.setAttribute('scrollamount', 3, 0);"><?php print render($page['whats_new']); ?><br/></br></marquee>
                    </p>
                    </div>
                </div>
             </div>
            </div>
           
            <div class="container mt-3">
            <div class="row">
                <!--team-1-->
                <?php
            
 foreach ($officers_name as  $officer_ob)
 {
                ?>

                <div class="col-lg-3">
                    <div class="our-team-main">
                        <div class="team-front">
                            <img src="<?php print base_path().'sites/default/files/'.$officer_ob['filename'];  ?>" class="img-fluid circle" />
                            <h3><?php echo $officer_ob['officers_name'];
                            ?></h3>
                        </div>
                        <div class="team-back">
                            <span>
                           <?php echo $officer_ob['officers_name'];
                            ?>
                            </span>
                        </div>
                    </div>
                </div>
                <?php
            }
            ?>
                
            </div>
                
                
                
                
               
                
                
            </div>
            </div>

             <div class="container mt-3">
                <div class="row">
                    

                    <div class="col-lg-4">
                        <div class="our-team-main">
                          <!-- <span id="policy"><h4>Publication</h4></span>  <hr> -->
                          <?php 
                                print render($page['highlighted']);
                          ?>
                           
                        </div>
                    </div>


                    <div class="col-lg-4">
                        <div class="our-team-main">
                            
                           
                          
                          
                          <?php 
                                print render($page['new_policy']);
                          ?>
        
                           
                          <!--  <table><tbody id="publicities"><tr><td>{{page.policies}} ---{{page.latest_news}}<hr></td></tr></tbody></table>  -->
                           
                        </div>
                    </div>

                    <div class="col-lg-4">
                        <div class="our-team-main">
                            
                            <span id="latest_new"><h4>Latest News</h4></span>
                            <hr>
                            <marquee direction="up" onmouseout="this.setAttribute('scrollamount', 2, 0);" onmouseover="this.setAttribute('scrollamount', 3, 0);"><?php print render($page['whats_new']); ?><br/></br></marquee> 
                            
                            
                        </div>
                    </div>
                </div>
            </div>

            <div class="container">
                <div class="row pt-2 pb-2 bg-white">
                    <div class="col-lg-2 h2"><center><img src="<?php print base_path() . path_to_theme() .'/' ?>images/indiagov-logo.png"></center></div>
                    <div class="col-lg-2 h2"><center><img src="<?php print base_path() . path_to_theme() .'/' ?>images/g1.jpg"></center></div>
                    <div class="col-lg-2 h2"><center><img src="<?php print base_path() . path_to_theme() .'/' ?>images/ingovt-logo.png"></center></div>
                    <div class="col-lg-2 h2"><center><img src="<?php print base_path() . path_to_theme() .'/' ?>images/g2.jpg"></center></div>
                    <div class="col-lg-2 h2"><center><img src="<?php print base_path() . path_to_theme() .'/' ?>images/mtgovt-logo.png"></center></div>
                    <div class="col-lg-2 h2"><center><img src="<?php print base_path() . path_to_theme() .'/' ?>images/mygov-logo.png"></center></div>

                </div>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-md-12 col-lg-12 col-sm-12" style="background-color: #004395 !important; color: white !important;">
                        <center>
                            <ul class="list-inline text-white pt-2 text-white">
                                <li class="list-inline-item pr-2 border-right"><a class="social-icon text-xs-center text-white" target="_blank" href="#">Terms of Use</a></li>
                                <li class="list-inline-item pr-2 border-right"><a class="social-icon text-xs-center text-white" target="_blank" href="#">Accessibility Statement</a></li>
                                <li class="list-inline-item pr-2 border-right"><a class="social-icon text-xs-center text-white" target="_blank" href="#">Disclaimer</a></li>
                                <li class="list-inline-item pr-2 border-right"><a class="social-icon text-xs-center text-white" target="_blank" href="#">Privacy Policy</a></li>
                                <li class="list-inline-item"><a class="social-icon text-xs-center text-white" target="_blank" href="#">Copyright Policy</a></li>
                            </ul>
                        </center>
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="row bg-primary  text-white py-1">
                    <div class="col-8 justify-content-center"> Content Owned by Indian Navy. Copyright © 2020. All Rights Reserved.</div>
                    <div class="col-4 justify-content-center">Total visitors : 099095</div>
                </div>
            </div>
        </div>
    </div>
</section>

<div class="sh-side-options">
    <div class="sh-side-options-container" data-url="#">
        <a class="sh-side-options-item sh-side-options-item-trigger-demos sh-accent-color">
            <div class="sh-side-options-item-container">
                <i class="fas fa-cog"></i>
            </div>
            <div class="sh-side-options-hover">
                SETTINGS<span></span>
            </div>
        </a>

        <a target="blank" href="#" class="sh-side-options-item sh-accent-color">
            <div class="sh-side-options-item-container">
                <i class="fas fa-user-lock"></i>
            </div>
            <div class="sh-side-options-hover">
                LOGIN<span></span>
            </div>
        </a>

        <a href="#" class="sh-side-options-item sh-accent-color">
            <div class="sh-side-options-item-container">
                <i class="fa fa-mobile"></i>
            </div>
            <div class="sh-side-options-hover">
                MOBILE<span></span>APP
            </div>
        </a>

    </div>

</div>
</body>
</html>