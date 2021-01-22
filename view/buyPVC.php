<?php require_once  __DIR__ . '/../view/header.php';?>
<?php require_once __DIR__ . '/../model/dailyPageView.php'; ?>
<?php $jqueryLoad = "aboutus"; ?>

<style>

.links{
  text-decoration: none;

}
</style>

<script>
    // title='Profile';
    titleTag('Pilllersmaker | Buy PVC');  
</script>

<div class="accordion" id="accordionExample">
 
  <div class="card">
    <div class="card-header w3-green" id="headingOne">
      <h2 class="mb-0">
        <button class="btn" type="button" data-toggle="collapse" data-target="#article1" aria-expanded="true" aria-controls="article1">
          <h3 class="w3-text-green ">Buying PVC<h3>
        </button>
      </h2>
    </div>

    <div id="article1" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
      <div class="card-body">

      <h6></h6>
       
      </div>
    </div>
  </div>

  <!-- article2 -->
  <div class="card">
    <div class="card-header" id="headingTwo">
      <h2 class="mb-0">
        <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#article2" aria-expanded="false" aria-controls="article2">
          <p class="w3-text-green">How to make payment for pvc</p>
        </button>
      </h2>  
    </div>
    <div id="article2" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
      <div class="card-body container">
       <ul>
        <li>Generate a <a href='generateTicket.php'>payment ticket </a></li>
        <li>Make payment through bank transfer or bank deposit</li>
        <li>Visit pillersmaker <a href='payment.php'>payment</a> page to enter payment detaile e.g tranfer id, teller id,
            payment ticket id </li>
        <li>Wait for few minute to see you pvc account credited</li>
        <li>Contact customer care if you need more details</li>
       </ul>
    </div>
  </div>

  <!-- paste aboutus.txt here if needed in future -->
</div>

<?php require_once  __DIR__ . '/../view/footer.php';?>