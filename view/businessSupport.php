<?php require_once  __DIR__ . '/../view/header.php';?>
<?php require_once __DIR__ . '/../model/dailyPageView.php'; ?>

<div class="accordion" id="accordionExample">

  <div class="card">
    <div class="card-header w3-green" id="headingOne">
      <h2 class="mb-0">
        <button class="btn" type="button" data-toggle="collapse" data-target="#article1" aria-expanded="true" aria-controls="article1">
          <h3 class="w3-text-green ">General Business Support<h3>
        </button>
      </h2>
    </div>

    <div id="article1" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
      <div class="card-body">
        Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat 
      </div>
    </div>
  </div>

  <!-- article2 -->
  <div class="card">
    <div class="card-header" id="headingTwo">
      <h2 class="mb-0">
        <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#article2" aria-expanded="false" aria-controls="article2">
          Collapsible Group Item #2
        </button>
      </h2>
    </div>
    <div id="article2" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
      <div class="card-body">
        Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
      </div>
    </div>
  </div>

  <!-- article3 -->
  <div class="card">
    <div class="card-header" id="headingThree">
      <h2 class="mb-0">
        <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#article3" aria-expanded="false" aria-controls="article3">
          Collapsible Group Item #3
        </button>
      </h2>
    </div>
    <div id="article3" class="collapse pl-4" aria-labelledby="headingThree" data-parent="#accordionExample">

    <h3 class="mt-3">Key Habits for Success</h3>
    <p>Posted by: Steve Marr on <small class="text-danger">Feb 14, 2019 </small></p>
      <div class="card-body container">

          

          Our businesses need our best.  Make it a priority in your business to practice these habits for success and see your business grow.
          <p></p>

          Subscribe to the free Business Proverbs e-mail here: http://bit.ly/ncixc1
      </div>
    </div>
  </div>
</div>

<?php require_once  __DIR__ . '/../view/footer.php';?>

