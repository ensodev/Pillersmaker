<?php require_once __DIR__ .'/../view/header.php';?>
<?php require_once __DIR__ . '/../model/dailyPageView.php'; ?>

<div class="accordion" id="accordionExample">

  <div class="card">
    <div class="card-header w3-green" id="headingOne">
      <h2 class="mb-0">
        <button class="btn" type="button" data-toggle="collapse" data-target="#article1" aria-expanded="true" aria-controls="article1">
          <h3 class="w3-text-green ">Legal<h3>
        </button>
      </h2>
    </div>

    <div id="article1" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
      <div class="card-body">
        <h4></h4>

        All members are responsible for their contents on this platform. We will not take any responsility for your contents on this platform. 
        

      </div>
    </div>
  </div>

  <!-- article2 -->
  <div class="card">
    <div class="card-header" id="headingTwo">
      <h2 class="mb-0">
        <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#article2" aria-expanded="false" aria-controls="article2">
          <!-- What is pillersmaker all about -->
        </button>
      </h2>
    </div>
    <div id="article2" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
      <div class="card-body">
        <!-- Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus  -->
      </div>
    </div>
  </div>

  <!-- article3 -->
  <div class="card">
    <div class="card-header" id="headingThree">
      <h2 class="mb-0">
        <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#article3" aria-expanded="false" aria-controls="article3">
          <!-- How does Pillersmaker make money out of this site -->
        </button>
      </h2>
    </div>
    <div id="article3" class="collapse pl-4" aria-labelledby="headingThree" data-parent="#accordionExample">
      <div class="card-body">
        <!-- Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus  -->
      </div>
    
    </div>
  </div>
</div>

<?php require_once  __DIR__ .'/../view/footer.php';?>