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
    titleTag('Pilllersmaker | Buy PVC Card');  
</script>

<div class="accordion" id="accordionExample">
 
  <div class="card">
    <div class="card-header w3-green" id="headingOne">
      <h2 class="mb-0">
        <button class="btn" type="button" data-toggle="collapse" data-target="#article1" aria-expanded="true" aria-controls="article1">
          <h3 class="w3-text-green ">Buy Pvc Card <h3>
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
          <p class="w3-text-green">How to make payment for pvc card.</p>
        </button>
      </h2>
    </div>
    <div id="article2" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
      <div class="card-body container">
       <ul>
        <li>Generate a <a href="/view/generateTicket.php">payment ticket.</a></li>
        <li>Make payment through bank transfer, bank deposit or from your pvc wallet</li>
        <li>Visit pillersmaker <a href='payment.php'>payment</a> page to enter payment detaile e.g tranfer id, teller id,
            payment ticket id.</li>
        <li>Wait for few minute to see you pvc cards available.</li>
        <li>Contact customer care if you need more details.</li>
       </ul>
    </div>
  </div>

  <!-- paste aboutus.txt here if needed in future -->
</div>



<div class="card">
    <div class="card-header" id="headingTwo">
      <h2 class="mb-0">
        <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#article2" aria-expanded="false" aria-controls="article2">
          <p class="w3-text-green">Learn more about pvc card</p>
        </button>
      </h2>
    </div>
    <div id="article2" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
      <div class="card-body container">
       <ul>
        <li>PVC card hold a certain value of pvc and appreciated within period of few months.</li>
        <li>PVC card least worth is 75000PVC</li>
        <li>For more details contact customer care.</li>
       </ul>
    </div>
  </div>

  <!-- paste aboutus.txt here if needed in future -->
</div>


<div class="card">
    <div class="card-header" id="headingTwo">
      <h2 class="mb-0">
        <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#article2" aria-expanded="false" aria-controls="article2">
          <p class="w3-text-green">Where is the increase in pvc card coming from</p>
        </button>
      </h2>
    </div>
    <div id="article2" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
      <div class="card-body container">
       <ul>
        <li>Pillersmaker organise activities during the year. 
        We make few profits from Seminals, Workshops, Trade fair, Shows, Trainings, advertisement, 
        some of our empowerment programms and donation from members, we consider any one with pvc as part of the organiser and you have
        to get something for your indirect involement in letting us impact lives.</li>

        <li>Money paid for pvc card are used to found most of these programmes and the profit make
           are where the increase on pvc card comes from.</li>

        <li>PVC is not another pyramid scheme or high yield investment of any kind, the increase on pvc
           is not 100% certain, but we also know that percentage of losing your pvc is very low because 
           we only invest in talents that have be proven profitable.</li>

        <li>One of the major focus of pillersmaker in to increase local production and service, also 
           promoting Nigerian local products usage among Nigerians and abroad. we are able to work thi out 
           by pioneering through our own local productions and advertisements on our platform and also .</li>

        

       </ul>
    </div>
  </div>

  <!-- paste aboutus.txt here if needed in future -->
</div>
<?php require_once  __DIR__ . '/../view/footer.php';?>