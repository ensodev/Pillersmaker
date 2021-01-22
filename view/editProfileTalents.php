<?php 
    require_once __DIR__ . '/header.php';
    require_once __DIR__ . '/../controller/checkSessionContol.php';
    checkNotSession();
    require_once  __DIR__ . '/../model/sessionExpire.php';
    require_once __DIR__ . '/../model/dailyPageView.php';
?> 
<body>
 
<script>
    title='Edit Talents';
    titleTag(title); 
</script>


  <div class="">
    <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-6 w3-green mt-4 mb-4 pt-3 pb-3 m-3 p-3" style="border-radius:2px">
        <h3 class="text-right w3-text-white"><span class="w3-text-amber">OOO </span>EDIT TALENTS</h3>
        <hr>
        
            <form action="../model/editTalentsProcess.php" method="POST">
                 

                 <div class="form">
                  <label>Your Main Talent</label>
                  <select name="main_talent" class="form-control"                       placeholder="Your Main Talent">
                  <option value="None">None</option>
                  <option value="singing">Singing</option>
                  <option value="Rapping">Rapping</option>
                  <option value="Comedy">Comedy</option>
                  <option value="Acting">Acting</option>
                  <option value="Motivational">Motivational Speaking</option>
                  <option value="Motivational">Motivational Writing</option>
                  <option value="Religion Leader">Religion Leader</option>
                  <option value="Graphic Designer">Graphic Designer</option>
                  <option value="Photography">Photography</option>
                  <option value="Portriat Painting">Portriat Painting</option>
                  <option value="House Painting">House Painting</option>
                  <option value="Web Design">Web Design</option>
                  <option value="Software Development">Software                                 Development</option>
                  <option value="Mobile Application">Mobile Application</option>
                  <option value="Game Development">Game Development</option>
                  <option value="Tailoring">Tailoring</option>
                  <option value="Beading">Beading</option>
                  <option value="Fashion Design">fashion Design</option>
                  <option value="Barbing">Barbing</option>
                  <option value="Hair Styling">Hair Styling</option>
                  <option value="Interior Decoration">Interior                                  Decoration</option>
                  <option value="Modeling">Modeling</option>
                  <option value="Production Startup">Production Startup</option>
                  <option value="Service Startup">Service Startup</option>
                  <option value="Tech Startup">Tech Startup</option>
                  <option value="Farm Startup">Farm Startup</option>
                  <option value="Others">Others</option>               
                  </select>
                </div>

                <br>

                <div class="form">
                <label>Second Talent</label>
                  <select name="second_talent" class="form-control"                       placeholder="Second Talent">
                  <option value="None">None</option>
                  <option value="singing">Singing</option>
                  <option value="Rapping">Rapping</option>
                  <option value="Comedy">Comedy</option>
                  <option value="Acting">Acting</option>
                  <option value="Motivational">Motivational Speaking</option>
                  <option value="Motivational">Motivational Writing</option>
                  <option value="Religion Leader">Religion Leader</option>
                  <option value="Graphic Designer">Graphic Designer</option>
                  <option value="Photography">Photography</option>
                  <option value="Portriat Painting">Portriat Painting</option>
                  <option value="House Painting">House Painting</option>
                  <option value="Web Design">Web Design</option>
                  <option value="Software Development">Software                                 Development</option>
                  <option value="Mobile Application">Mobile Application</option>
                  <option value="Game Development">Game Development</option>
                  <option value="Tailoring">Tailoring</option>
                  <option value="Beading">Beading</option>
                  <option value="Fashion Design">fashion Design</option>
                  <option value="Barbing">Barbing</option>
                  <option value="Hair Styling">Hair Styling</option>
                  <option value="Interior Decoration">Interior                                  Decoration</option>
                  <option value="Modeling">Modeling</option>
                  <option value="Production Startup">Production Startup</option>
                  <option value="Service Startup">Service Startup</option>
                  <option value="Tech Startup">Tech Startup</option>
                  <option value="Farm Startup">Farm Startup</option>
                  <option value="Others">Others</option>               
                  </select>
                </div>
                <br>

                <div class="form mt-3">
                    <button type="submit" value="submit" name="submit" class="btn btn-info w3-amber form-control mb-1">Submit</button>                    
                </div>

               

                                
            </form>
        </div>
        <div class="col-md-3"></div>
    </div>
</div>


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
