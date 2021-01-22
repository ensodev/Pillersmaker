<!-- footer start -->

<div class="w3-black text-center">

<div class="row p-5"> 
    <div class="col-md-4">
        <ul class="list-unstyled w3-text-amber">
            <li>
                <h2><a href="https://facebook.com/Pillersmaker-102557924452162"class="w3-text-amber" style="text-decoration:none">Facebook</h6>
            </li>
            <li>
                <h2><a href="#"class="w3-text-amber" style="text-decoration:none">LinkedIn</a></h6>
            </li>
            <li>
                <h2><a href="#"class="w3-text-amber" style="text-decoration:none">Twitter</a></h6>
            </li>
            <li>
                <h2><a href="#"class="w3-text-amber" style="text-decoration:none">Google+</a></h6>
            </li>
        </ul>
    </div>

    <div class="col-md-4">
        <ul class="list-unstyled w3-text-amber">
            <li> 
                <h6><a href="/view/aboutUs.php"class="w3-text-amber" style="text-decoration:none">About Us</a></h5>
            </li>
            <li>
                <h6><a href="/view/faqs.php"class="w3-text-amber" style="text-decoration:none">FAQ</a></h5>
            </li>
            <li>
                <h6><a href="legal.php"class="w3-text-amber" style="text-decoration:none">Legal</a></h6>
            </li>
            
            <li>
                <h6><a href="/view/customerCare.php"class="w3-text-amber" style="text-decoration:none">Customer Care</a></h6>
            </li>
            <li>
                <h6><a href="supportUs.php"class="w3-text-amber" style="text-decoration:none">Support Us</a></h6>
            </li>
            <!-- <li>
                <h6><a href="#"class="w3-text-amber" style="text-decoration:none">Contact us</a></h6>
            </li> -->
            <li>
                <h6><a href="/view/payment.php"class="w3-text-amber" style="text-decoration:none">Payment</a></h6>
            </li>
            <li>
                <h6><a href="/view/reportMembers.php"class="w3-text-amber" style="text-decoration:none">Report Members</a></h6>
            </li>

            <?php if(isset($_SESSION['USER_ID']) && isset($_SESSION['USER_ID'])){
                echo "<li>";
                echo "<h6><a href='/view/profile.php'class='w3-text-amber' style='text-decoration:none'>Edit Profile</a></h6>";
                echo "</li>";

                echo "<li>";
                echo "<h6><a href='/view/giveTestimony.php'class='w3-text-amber' style='text-decoration:none'>Give Testimony</a></h6>";
                echo "</li>";

                echo "<li>";
                echo "<h6><a href='/controller/logoutControl.php'class='w3-text-amber' style='text-decoration:none'>Logout</a></h6>";
                echo "</li>";}
            ?>

        </ul>
    </div>
    <div class="col-md-4">
        <ul class="list-unstyled w3-text-amber">
            <li>
                <p></p>
            </li>
            <!-- <li><br></li> -->
            <li>
                <h4>Copyright<div class="w3-spin" style="display:inline-block">&copy;</div>2019 <span class="w3-text-amber w3-green pl-3 pr-2" style="font-size:30px;  border-bottom-right-radius:50%">P</span>illersMaker<h4></h4>
            </li>
            <li>
                <h5 class="w3-animate-fading">
                    <span class="dot w3-text-green">o
                    </span>

                    <span class="dot w3-text-green">o
                    </span>

                    <span class="dot w3-text-amber">O
                    </span>

                    <span class="dot w3-text-green">o
                    </span>

                    <span class="dot w3-text-green">o
                    </span>
                </h5>
            </li>
        </ul>
    </div>
</div>
<!-- </div>
</div>
</div> -->
<!-- 
<div class="spinner-grow text-primary" style="width:3rem; height: 3rem;" role="status">
    <span class="sr-only">Loading</span>
</div>
-->

<?php
if(isset($logoOn) && $logoOn == true){
?>
<script src="../script/logoClickable.js"></script>

<?php
}
?>


<script src="../js/jquery-3.3.1.min.js"></script>

<?php
    if(isset($jqueryLoad)){
        if($jqueryLoad == "chat"){
            ?>
            <script src="/../js/chat.js"></script>
            <?php
        }

        if($jqueryLoad == "aboutus"){
            ?>
            <script src="/../js/aboutUs.js"></script>
            <?php
        }
    }
?>

<script src="/../js/bootstrap.min.js"></script>

<!-- <script src="../css/css/js/bootstrap.min.js"></script> -->

</body>

</html>