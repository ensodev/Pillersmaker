<?php 

require_once  __DIR__ . '/header.php';
require_once __DIR__ . '/../model/dailyPageView.php';

?>

<div class="accordion" id="accordionExample">

  <div class="card">
    <div class="card-header w3-green" id="headingOne">
      <h2 class="mb-0">
        <button class="btn" type="button" data-toggle="collapse" data-target="#article1" aria-expanded="true" aria-controls="article1">
          <h3 class="w3-text-green ">Our Partners<h3>
        </button>
      </h2>
    </div>
 
    <div id="article1" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
      <div class="card-body">
        We consider all our paid members as partner in this journey.
        <br />
        <br />
        For those who are willing to support or partnering in one way or the other please contact our <a href='customerCare.php'>Customer care</a>.
        <br />

      </div>
    </div>
  </div>

  <!-- article2 -->
  <div class="card">
    <div class="card-header" id="headingTwo">
      <h2 class="mb-0">
        <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#article2" aria-expanded="false" aria-controls="article2">
         

        </button>
      </h2>
    </div>
    <div id="article2" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
      <div class="card-body">
      

      </div>
    </div>
  </div>


<?php require_once  __DIR__ . '/../view/footer.php';?>