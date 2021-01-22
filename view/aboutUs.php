<?php require_once  __DIR__ . '/../view/header.php';?>
<?php require_once __DIR__ . '/../model/dailyPageView.php'; ?>
<?php $jqueryLoad = "aboutus"; ?>

<style>

.links{
  text-decoration: underline;
  cursor: pointer;
}
</style>

<script>
    // title='Profile';
    titleTag('About Us');  
</script>

<div class="accordion" id="accordionExample">
 
  <div class="card">
    <div class="card-header w3-green" id="headingOne">
      <h2 class="mb-0">
        <button class="btn" type="button" data-toggle="collapse" data-target="#article1" aria-expanded="true" aria-controls="article1">
          <h3 class="w3-text-green ">About Pillersmaker<h3>
        </button>
      </h2>
    </div>

    <div id="article1" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
      <div class="card-body">

      <h4> We are here to help you grow your talent.</h4>
       
      </div>
    </div>
  </div>

  <!-- article2 -->
  <div class="card">
    <div class="card-header" id="headingTwo">
      <h2 class="mb-0">
        <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#article2" aria-expanded="false" aria-controls="article2">
          <p class="w3-text-green">Our Vision and Mission</p>
        </button>
      </h2>
    </div>
    <div id="article2" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
      <div class="card-body container">
        <h3 class="text-light badge-lg badge-success p-2">Vision</h3>

        Our vision is to become the most supportive platform
         for people of great talents in Nigeria and in Africa.
        <p></p>

        PillersMaker is a platform invented to help talented individual to easily display thier talents, grow it, earn a living from it, help others with it, get appreciated and encouraged.  

             
        <hr>

        <h3 class="text-light badge-lg badge-success p-2">Mission</h3>
        Our Mission is to promote and support people of great talents in 
        achieving thier goals in life. We bring talented 
        individual out of the natural focus market to a community where 
        most things that makes it difficult for people to actualise thier 
        dreams in life are eliminated to the least minimum.
        <p></p>
        <p>PillersMaker 
        is a community where all talents can be display, get appreciated 
        and dreams becomes achievable. </p>
        
      </div>
    </div>
  </div>

  <!-- paste aboutus.txt here if needed in future -->
</div>

<?php require_once  __DIR__ . '/../view/footer.php';?>