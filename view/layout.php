<?php 
    session_start();
   
    require_once __DIR__ . '/header.php';
    $logoOn = true;

    require_once  __DIR__ . '/../model/maintainanceMode.php';
    
    require_once __DIR__ . '/../model/dailyPageView.php';
?> 


<script>
    title='Home';
    titleTag(title); 
</script>

    <div  style=" background-color: rgb(56, 47, 27);">

         

        <div class="jumbotron mb-0" style="border-radius: 0; background-color: rgb(32, 34, 27);">
            <div class="w3-text-green text-center">

                <?php //require_once __DIR__ . '/../advert/advert1.php';?>   

                <h1 id='logo'><span class="w3-text-amber w3-green pl-5 pr-2" style="font-size:60px; border-bottom-right-radius:50%">P</span>illersMaker</h1><h6 class="w3-text-gray"></h6>
                <h5 class="w3-spin">
                  
                    <span class="dot w3-text-green">o
                    </span>

                    <span class="dot w3-text-amber">O
                    </span>
                    <span class="dot w3-text-green">o
                    </span>

                  
                </h5>
            </div>
                
        </div>
    </div>

           
    <!-- header end -->

    <?php    
   if(isset($_SESSION['USER_ID']) && isset($_SESSION['USER_ID'])){
        echo    "<div class='jumbotron w3-text-white text-center' style=' background-image: url(../images/top.jpg); border-radius:0; opacity: 0.5; height:350px'>";
        
        // echo "<p class='mt-3 mb-0'>_____</p>";
        echo "<h1 class='mt-5 pt-5 w3-animate-fading1'>Pushing out your potentials</h1>";
        echo "<p class='mt-3'>_____</p>";
        echo "</div>";

    }else{
        echo    "<div class='jumbotron w3-text-white text-center' style=' background-image: url(../images/top.jpg); border-radius:0; opacity: 0.5; height:350px'>";
        echo "<h1 class='mt-5 w3-animate-fading1'>We help to push out your potentials</h1>";
        echo "<p class='mt-3'>_____</p>";
        
            
        echo "<div>";
        echo    "<h3><a href='login.php' class='btn btn-lg w3-green w3-text-black' style='font-weight:1000;'>Login</a></h3>";
                        
        echo    "</div>";
        echo "</div>";
    }    

?>

    <div class="container">


        <div class="row">
            <!-- First Row -->
            <div class="col-md-12 mb-3">
                <div class="row text-center">
                    <div class="col-md-4">
                        <div class="card mb-3">
                            <h2 class="m-3">o o O o o</h2>
                            <div>
                            
                                <!-- <img src="../images/silver.jpg" alt="" id="postimages" class="pl-5 pr-5"> -->
                                <p class="m-3">We believe what Leo Buscaglia said "Your talent is God's gift to you. 
                                        What you do with it is your gift back to God."</p>

                                

                                <?php
                                    if(!isset($_SESSION['USER_ID'])){
                                        echo "<a href='register.php' class='btn btn-sm w3-green mb-3'>Register</a>";
                                    }
                                ?>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="card mb-3">
                            <h2 class="m-3 w3-text-green">PillersMaker</h2>
                            <div>
                                <img src="../images/diamond.jpg" alt="" id="postimages" class="pl-5 pr-5">
                                <h5>
                                    <span class="dot w3-text-amber">o
                                    </span>

                                    <span class="dot w3-text-amber">o
                                    </span>

                                    <span class="dot w3-text-green">O
                                    </span>

                                    <span class="dot w3-text-amber">o
                                    </span>

                                    <span class="dot w3-text-amber">o
                                    </span>
                                </h5>
                                <p class="m-3">Having talent is great but not enough,  talent
                                            without Activation, Recongnation, Appreciation and
                                            Impactation, is just a mere gift that will soon 
                                            be found missing. 
                                        
                                            </p>
                                <a href="/view/aboutUs.php" class="btn btn-lg w3-green w3-text-white mb-3" > About Us </a>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="card mb-3">
                            <h2 class="m-3">o o O o o</h2>
                            <div>
                                <!-- <img src="../images/gold.jpg" alt="" id="postimages" class="pl-5 pr-5"> -->
                                <p class="m-3">Real talent shines through regardless of how many others
                                    there are around you says Paloma Faith. You just have to activate it.</p>
                                
                                    <?php
                                    if(!isset($_SESSION['USER_ID'])){
                                        echo "<a href='login.php' class='btn btn-sm w3-green mb-3'>Login</a>";
                                    }
                                ?>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

        </div>
    </div>


<!-- mainQuate -->

<p></p>
<p></p>

<div class="text-center">

    <div class="jumbotron w3-text-white " style="background-image: url(../images/invest3.jpg); border-radius: 0; opacity: 0.5;">
        <h2>"Everyone has a purpose in life a  unique talent to give
        to others. And when we blend this unique talent with service to others, we
        experience the ecstasy and exultation of own spirit, which is the ultimate goal of all goals."</h2>
        <p class="w3-text-white" Style='font-weight:bold; opacity:1'>By: Kallam Anji Reddy</p>

    </div>

    </div>
<!-- innovation section  -->



<!-- innovationSection -->
<div class="container text-center">

<div class="row p-1 ">
    <div class="col-md-6">
        <div class="bg-white pt-2 pb-2" style="border-radius:5px"><img src="../sitepic/fashion2resized.jpg" style="width:85%; border-radius: 1%" alt=""></div>
    </div>
    <div class="col-md-6 pt-3">
    <div class="w3-text-green text-left" style="height:90%">
            <h4 class="">ooOoo</h4>
            <h4 class="w3-text-white">
            FASHION EMPOWERING PROGRAM FOR ONE THOUSAND NIGERIANS
            </h4>

            <p>Fashion and Style is set to take new different shape in Nigeria.</p>

            <p>We are pesently on the journey of empowering 1,000 Nigerians withing
            the next five years.</p>

            <p>For more enquiries contact our <a href='customerCare.php' class='text-light'>customer care.</a></p>

            
            </p>

        </div>
    </div>
</div>

<div class="row p-3  ">
    <div class="col-md-3 mt-1">
   
    </div>
    <div class="col-md-6 mt-3">

        <div class="w3-text-white"><h4>FREE TECH CONSULTANCY SERVICES BEGINS</h4></div>
        <div class="bg-white pt-2 pb-2" style="border-radius:5px"><img src="../images/innovate2.jpg" style="width:80%; border-radius:3px" alt=""></div>

        <p class='text-light'>Are you planing on becoming a programmer or a software engineer and 
        you really dont know where to start or you have started but have few questions to ask.</p>

        <p class="w3-text-green">Click <a href="/view/customerCare.php"><span class="w3-text-white">
        here</span></a> for free consultation on starting your tech journey.</p>


    </div>
    <div class="col-md-3">
    <h4 class=""></h4>
   
    </div>

</div>


<div class="row p-3">
    <div class="col-md-6 pt-4">
        <div class="w3-text-green text-right " style="height:90%">
            <h4 class="">ooOoo</h4>
            <h4 class="w3-text-white">
            100% PAYMENT FOR GREAT FINE ARTISTS ON THIS PLATFORM WITH JUST FEW PROJECTS</h4>

            <p>We belive Nigeria is the home of art in Africa, Having artistic talent 
            is a great previledge in this community, 90% of 
            fine Artist on this platform has a chance to be noticed and get promoted.</p>

            <p>If you have artistic talents, contact our <a href="/view/customerCare.php" 
            class='text-light'>customer care</a> today, share your work with us 
            and we might add to the list of artist working with us in this community.
            </p>

        </div>
    </div>

    <div class="col-md-6">
        <div class="bg-white pt-2 pb-2" style="border-radius:5px"><img src="../sitepic/artsized.jpg" style="width:80%; border-radius: 1%" alt=""></div>

    </div>
</div>

</div>

<!-- middle quote -->


    <p></p>
    <p></p>

    <div class="text-center">

        <div class="jumbotron w3-text-white " style="background-image: url(../images/invest3.jpg); border-radius: 0; opacity: 0.5;">
            <h2>"You just have to find that thing that's special about you that distinguishes you from
            all the others, and through true talent, hard work, and passion, anything can happen."</h2>
            <p class="w3-text-white" Style='font-weight:bold; opacity:1'>By: Dr.Dre</p>

        </div>

    </div>

    <!-- blog and article section -->

    <!-- blogforum-->
<div class="container">

<div class="row">
    <!-- First Row -->
    <div class="col-md-12 mb-3">
        <div class="row text-center">

            <div class="col-md-3">
                <div class="card mb-5">
                    <div class="card-header  w3-green">
                        <h3 class="card m-3 p-2 w3-text-green">EVENTS</h3>
                    </div>
              
                        <!-- <img src="images/home.jpg" alt="" id="postimages"> -->
                    <div class="card-Body">
                       <p class="m-3">Follow up with our events on pillersmaker</p>
                       
                    </div>

                    <div class="card-footer">
                    <a href="/view/events.php" class="btn btn-sm w3-green  mb-3">View</a>
                    </div>                    
                </div>
            </div>


            <div class="col-md-3">
                <div class="card mb-5">
                    <div class="card-header  w3-green">
                        <h3 class="card m-3 p-2 w3-text-green">UPDATES</h3>
                    </div>
              
                    <!-- <img src="images/home.jpg" alt="" id="postimages"> -->
                    <div class="card-Body">
                       <p class="m-3">Click here to view our latest updates</p>
                       
                    </div>

                    <div class="card-footer">
                    <a href="/view/articles.php" class="btn btn-sm w3-green  mb-3">View</a>
                    </div>
                    
                </div>
            </div>


            <div class="col-md-3">
            <div class="card mb-5">
                    <div class="card-header  w3-green">
                        <h3 class="card m-3 p-2 w3-text-green">COMPETE</h3>
                    </div>
              
                        <!-- <img src="images/home.jpg" alt="" id="postimages"> -->
                    <div class="card-Body">
                       <p class="m-3">Check the list our ongoing competition</p>
                       
                    </div>

                    <div class="card-footer">
                    <a href="/view/competitions.php" class="btn btn-sm w3-green  mb-3">View</a>
                    </div>
                    
                </div>
            </div>


            <div class="col-md-3">
               <div class="card mb-5">
                    <div class="card-header  w3-green">
                        <h3 class="card m-3 p-2 w3-text-green">AWARDS</h3>
                    </div>
              
                        <!-- <img src="images/home.jpg" alt="" id="postimages"> -->
                    <div class="card-Body">
                       <p class="m-3">Ckech out the list of our Awards and how to apply</p>
                       
                    </div>

                    <div class="card-footer">
                    <a href="/view/explore.php" class="btn btn-sm w3-green  mb-3">View</a>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>

</div>

</div>

<!-- third quote section -->



    <!-- quotetwo -->
    <div class="text-center">
        <div class="jumbotron w3-text-white" style="background-image: url(../images/invest3.jpg); border-radius:0; opacity: 0.4;">
            <h2>Hard work without talent is a shame, but talent without hard work is a tragedy</h2>
            <p>By: Robert Half</p>
        </div>
    </div>
<?php
    require_once __DIR__ . '/testimony.php';
    require_once __DIR__ . '/footer.php';
?>



