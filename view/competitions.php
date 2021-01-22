<?php require_once  __DIR__ . '/../view/header.php';?>
<?php require_once __DIR__ . '/../model/dailyPageView.php'; ?>


<div class="accordion" id="accordionExample">

  <div class="card">
    <div class="card-header w3-green" id="headingOne">
      <h2 class="mb-0">
        <button class="btn" type="button" data-toggle="collapse" data-target="#article1" aria-expanded="true" aria-controls="article1">
          <h3 class="w3-text-green ">General Competitions<h3>
        </button>
      </h2>
    </div>

    <div id="article1" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
      <div class="card-body">
        one of the best ways you can improve in your skills is to contest on a platform like this, We don't want you to improve only we also want you to earn something by winning our competitions and also to be position  for employements and unlimited oppurtunities on this platform.
      </div>
    </div>
  </div>

  <!-- article2 -->
  <div class="card">
    <div class="card-header" id="headingTwo">
      <h2 class="mb-0">
        <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#article2" aria-expanded="false" aria-controls="article2">
          <p class='text-danger'>IMPORTANT</p>
        </button>
      </h2>
    </div>
    <div id="article2" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
      <div class="card-body">
        <p>1. We presently dont have competion for the following talents but 
        we plan to add them to our list in the future</p>
        <ul>
          <li>Actor</li>
          <li>Comedians</li>
          <li>House Painter</li>
          <li>Barber</li>
          <li>Interior Decoration</li>
        </ul>
        <p>2. You can only participate in the competition with 5000'PVC or its equivalent in Naira.</p>
        <p>3. All rules that applies to our awards for each categories also applies to competition.
        <p>4. Two winner in each category.
        <p>5. Prizes are given out as PVC which can later be cash out or use on this platform
        <p>6. Competion Link page are posted periodically, and also annouced in the 
        chat tray and on the board for user to see.
      </div>
    </div>
  </div>

  <!-- article3 -->
  <div class="card">
    <div class="card-header" id="headingThree">
      <h2 class="mb-0">
        <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#article3" aria-expanded="false" aria-controls="article3">
          Available Competions
        </button>
      </h2>
    </div>
    <div id="article3" class="collapse pl-4" aria-labelledby="headingThree" data-parent="#accordionExample">

    
      <div class="card-body container">
          No competion now
      </div>
    </div>
  </div>
</div>

<?php require_once  __DIR__ . '/../view/footer.php';?>