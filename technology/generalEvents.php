<?php
  require_once  __DIR__ . '/../view/header.php';
  require_once  __DIR__ . '/../controller/checkSessionContol.php';
  checkNotSession();
  require_once  __DIR__ . '/../controller/checkPaidMember.php';
  require_once __DIR__ . '/../model/dailyPageView.php';
?>

<div class="accordion" id="accordionExample">

<div class="card">

<div class="card-header w3-green" id="headingOne">
  <h2 class="mb-0">
    <button class="btn" type="button" data-toggle="collapse" data-target="#event" aria-expanded="true" aria-controls="event">
        <h3 class="w3-text-green ">Entertainment Awards<h3>
    </button>
  </h2>
</div>

<div id="event" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
  <div class="card-body">
    <p>We are pushing the world of entertainment forward, pillersmaker present to you yearly entertainment award for members that are really dedicated to building up there talents, our awards comes with Recording Label deal and and tour trip withing african countries.</p>

  </div>
</div>
</div>

<!-- event1 -->
  <div class="card">
    <div class="card-header" id="headingOne">
      <h2 class="mb-0">
        <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#event1" aria-expanded="false" aria-controls="event1">
         BEST SINGER  <small class="text-danger "> </small>
        </button>
      </h2>
    </div>
    <div id="event1" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
      <div class="card-body">
       
        <p>Pillersmaker rewards best voted entertainers and best applied member
        for five categories.

        This awards is yearly and we intend to increase the number of selected members for this categories in future, surely we will..</p>

        <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header w3-green">
                       Details of Application
                    </div>
                    <div class="card-body ">
                        <p>
                        Click the apply button is you want PillersMaker to access your work and make you the best applied singer, This attract application fee of N5,000 or equivalent in bitcoin.
                        </p>
                        <p>
                        Click vote a friend if you know a friend on pillersmaker that has talent and have shown or display it through any from here. voting for a friend is for the voter and members voted for. 
                        <p></p>
                        
                        </p>
                    </div>
                    <div class="card-footer">
                        <a href="#" class="btn btn-success" >Apply Now</a>
                        <a href="#" class="btn btn-success" >Vote a friend</a>
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="card">
                    <div class="card-header w3-green">
                       Categories
                    </div>
                    <div class="card-body">
                      <ul>
                        <li>1 Best Voted Singer</li>
                        <li>1 Best applied Singer</li>
                        
                      </ul>
                      
                      <p></p>
                    </div>
                    <div class="card-footer">
                        Closing Date....<small class="text-danger"></small>
                    </div>
                    <p>
                    <div class="card-header w3-green">
                       Qualification Details
                    </div>
                    <div class="card-body">
                      <ul>
                        <li>2 best recorded singles</li>
                        <li>The lyrics of the songs</li>
                        <li>Download link</li>
                        <li>Producers name and contact</li>
                        <li>Your name and reachable contact</li>
                        <li>Profile Picture must be a face picture</li>
                        <li>Must have atleast five post of which two must contain the lyrics of your both presented musics each</li>
                        <li>each post must have atleast 50 likes and 100 views</li>
                        <li>You must have atleast 50 people you connected to and 50 people connecting to you</li>
                        <li>You are not on report list</li>
                        <li>You are not on ban list</li>
                        <li>Everything you posted are your original work and can prove it</li>
                        
                      </ul>
                      
                      <p></p>
                    </div>
                    <div class="card-footer">
                        Closing Date....<small class="text-danger"></small>
                    </div>
                </div>
            </div>
        </div>
    </div>
      </div>
      
    </div>
  </div>

<!-- event2 -->
  <div class="card">
    <div class="card-header" id="headingTwo">
      <h2 class="mb-0">
        <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#event2" aria-expanded="false" aria-controls="event2">
          BEST RAPPERS<small class="text-danger "></small>
        </button>
      </h2>
    </div>
    <div id="event2" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
      <div class="card-body">
      
      <p>Pillersmaker rewards best voted entertainers and best applied member
        for five categories.

        This awards is yearly and we intend to increase the number of selected members for this categories in future, surely we will..</p>
        <div class="container">
        <div class="row">
        <div class="col-md-6">
                <div class="card">
                    <div class="card-header w3-green">
                       Details of Application
                    </div>
                    <div class="card-body ">
                    <p>
                        Click the apply button if you want PillersMaker to access your work and make you the best Rapper, This attract application fee of N5,000 or equivalent in bitcoin.
                        </p>
                        <p>
                        Click vote a friend if you know a friend on pillersmaker that has talent and have shown or display it through any from here. voting for a friend is for the voter and members voted for. 
                        <p></p>
                        
                        
                    </div>
                    <div class="card-footer">
                    <a href="#" class="btn btn-success" >Apply Now</a>
                    <a href="#" class="btn btn-success" >Vote a friend</a>
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="card">
                    <div class="card-header w3-green">
                       Categories
                    </div>
                    <div class="card-body">
                      <ul>
                        <li>1 Best Voted Rapper</li>
                        <li>1 Best applied Rapper</li>
                        
                      </ul>
                      
                      <p></p>
                    </div>
                    <div class="card-footer">
                        Closing Date....<small class="text-danger"></small>
                    </div>
                    <p>
                    <div class="card-header w3-green">
                       Qualification Details
                    </div>
                    <div class="card-body">
                      <ul>
                        <li>2 best recorded singles</li>
                        <li>The lyrics of the songs</li>
                        <li>Download link</li>
                        <li>Producers name and contact</li>
                        <li>Your name and reachable contact</li>
                        <li>Profile Picture must be a face picture</li>
                        <li>Must have atleast five post of which two must contain the lyrics of your both presented musics each</li>
                        <li>each post must have atleast 50 likes and 100 views</li>
                        <li>You must have atleast 50 people you connected to and 50 people connecting to you</li>
                        <li>You are not on report list</li>
                        <li>You are not on ban list</li>
                        <li>Everything you posted are your original work and can prove it</li>
                        
                      </ul>
                      
                      <p></p>
                    </div>
                    <div class="card-footer">
                        Closing Date....<small class="text-danger"></small>
                    </div>
                </div>
            </div>
        </div>
    </div>
      </div>
      
    </div>
  </div>


<!-- event3 -->
  <div class="card">
    <div class="card-header" id="headingThree">
      <h2 class="mb-0">
        <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#event3" aria-expanded="false" aria-controls="event3">
        BEST COMEDIANS<small class="text-danger "></small>
        </button>
      </h2>
    </div>
    <div id="event3" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
      <div class="card-body">
     
        <p><p>Pillersmaker rewards best voted entertainers and best applied member
        for five categories.

        This awards is yearly and we intend to increase the number of selected members for this categories in future, surely we will..</p></p>
        <div class="container">
        <div class="row">
            <div class="col-md-6 ">
                <div class="card">
                    <div class="card-header w3-green">
                      Details of Application
                    </div>
                    <div class="card-body">
                    <p>
                        Click the apply button if you want PillersMaker to access your work and make you the best Comedian, This attract application fee of N5,000 or equivalent in bitcoin.
                        </p>
                        <p>
                        Click vote a friend if you know a friend on pillersmaker that has talent and have shown or display it through any from here. voting for a friend is for the voter and members voted for. 
                        <p></p>
                        
                    </div>
                    <div class="card-footer">
                    <a href="#" class="btn btn-success" >Apply Now</a>
                    <a href="#" class="btn btn-success" >Vote a friend</a>
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="card">
                    <div class="card-header w3-green">
                       Categories
                    </div>
                    <div class="card-body">
                      <ul>
                        <li>1 Best Voted Comedian</li>
                        <li>1 Best applied Comedian</li>
                        
                      </ul>
                      
                      <p></p>
                    </div>
                    <div class="card-footer">
                        Closing Date....<small class="text-danger"></small>
                    </div>
                    <p>
                    <div class="card-header w3-green">
                       Qualification Details
                    </div>
                    <div class="card-body">
                      <ul>
                        <li>2 best recorded jokes</li>
                        <li>The write up of the jokes</li>
                        <li>Download link</li>
                        <li>Producers name and contact</li>
                        <li>Your name and reachable contact</li>
                        <li>Profile Picture must be a face picture</li>
                        <li>Must have atleast five post of which two must contain the writeof of your both presented comedy each</li>
                        <li>each post must have atleast 50 likes and 100 views</li>
                        <li>You must have atleast 50 people you connected to and 50 people connecting to you</li>
                        <li>You are not on report list</li>
                        <li>You are not on ban list</li>
                        <li>Everything you posted are your original work and can prove it</li>
                        
                      </ul>
                      
                      <p></p>
                    </div>
                    <div class="card-footer">
                        Closing Date....<small class="text-danger"></small>
                    </div>
                </div>
            </div>
        </div>
    </div>
      </div>
      
    </div>
  </div>

<!-- event4 -->
<div class="card">
    <div class="card-header" id="headingThree">
      <h2 class="mb-0">
        <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#event4" aria-expanded="false" aria-controls="event4">
        BEST ACTORS<small class="text-danger "></small>
        </button>
      </h2>
    </div>
    <div id="event4" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
      <div class="card-body">
     
        <p><p>Pillersmaker rewards best voted entertainers and best applied member
        for five categories.

        This awards is yearly and we intend to increase the number of selected members for this categories in future, surely we will..</p></p>
        <div class="container">
        <div class="row">
            <div class="col-md-6 ">
                <div class="card">
                    <div class="card-header w3-green">
                      Details of Application
                    </div>
                    <div class="card-body">
                    <p>
                        Click the apply button if you want PillersMaker to access your work and make you the best Actor, This attract application fee of N5,000 or equivalent in bitcoin.
                        </p>
                        <p>
                        Click vote a friend if you know a friend on pillersmaker that has talent and have shown or display it through any from here. voting for a friend is for the voter and members voted for. 
                        <p></p>
                        
                    </div>
                    <div class="card-footer">
                    <a href="#" class="btn btn-success" >Apply Now</a>
                    <a href="#" class="btn btn-success" >Vote a friend</a>
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="card">
                    <div class="card-header w3-green">
                       Categories
                    </div>
                    <div class="card-body">
                      <ul>
                        <li>1 Best Voted Actor</li>
                        <li>1 Best applied Actor</li>
                        
                      </ul>
                      
                      <p></p>
                    </div>
                    <div class="card-footer">
                        Closing Date....<small class="text-danger"></small>
                    </div>
                    <p>
                    <div class="card-header w3-green">
                       Qualification Details
                    </div>
                    <div class="card-body">
                      <ul>
                        <li>2 best short video</li>
                        <li>The write up of the play</li>
                        <li>Download link</li>
                        <li>Producers name and contact</li>
                        <li>Your name and reachable contact</li>
                        <li>Profile Picture must be a face picture</li>
                        <li>Must have atleast five posts</li>
                        <li>2 posts must have atleast 50 likes and 100 views</li>
                        <li>You must have atleast 50 people you connected to and 50 people connecting to you</li>
                        <li>You are not on report list</li>
                        <li>You are not on ban list</li>
                        <li>Everything you posted are your original work and can prove it</li>
                        
                      </ul>
                      
                      <p></p>
                    </div>
                    <div class="card-footer">
                        Closing Date....<small class="text-danger"></small>
                    </div>
                </div>
            </div>
        </div>
    </div>
      </div>
      
    </div>
  </div>

<!-- events5 -->
<div class="card">
    <div class="card-header" id="headingThree">
      <h2 class="mb-0">
        <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#event5" aria-expanded="false" aria-controls="event5">
        BEST DANCERS<small class="text-danger "></small>
        </button>
      </h2>
    </div>
    <div id="event5" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
      <div class="card-body">
     
        <p><p>Pillersmaker rewards best voted entertainers and best applied member
        for five categories.

        This awards is yearly and we intend to increase the number of selected members for this categories in future, surely we will..</p></p>
        <div class="container">
        <div class="row">
            <div class="col-md-6 ">
                <div class="card">
                    <div class="card-header w3-green">
                      Details of Application
                    </div>
                    <div class="card-body">
                    <p>
                        Click the apply button if you want PillersMaker to access your work and make you the best Dancer, This attract application fee of N5,000 or equivalent in bitcoin.
                        </p>
                        <p>
                        Click vote a friend if you know a friend on pillersmaker that has talent and have shown or display it through any from here. voting for a friend is for the voter and members voted for. 
                        <p></p>
                        
                    </div>
                    <div class="card-footer">
                    <a href="#" class="btn btn-success" >Apply Now</a>
                    <a href="#" class="btn btn-success" >Vote a friend</a>
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="card">
                    <div class="card-header w3-green">
                       Categories
                    </div>
                    <div class="card-body">
                      <ul>
                        <li>1 Best Voted Dancer</li>
                        <li>1 Best applied Dancer</li>
                        
                      </ul>
                      
                      <p></p>
                    </div>
                    <div class="card-footer">
                        Closing Date....<small class="text-danger"></small>
                    </div>
                    <p>
                    <div class="card-header w3-green">
                       Qualification Details
                    </div>
                    <div class="card-body">
                      <ul>
                        <li>2 best short video</li>
                        <li>Download link</li>
                        <li>Producers name and contact</li>
                        <li>Your name and reachable contact</li>
                        <li>Profile Picture must be a face picture</li>
                        <li>Must have atleast five posts</li>
                        <li>2 posts must have atleast 50 likes and 100 views</li>
                        <li>You must have atleast 50 people you connected to and 50 people connecting to you</li>
                        <li>You are not on report list</li>
                        <li>You are not on ban list</li>
                        <li>Everything you posted are your original work and can prove it</li>
                        
                      </ul>
                      
                      <p></p>
                    </div>
                    <div class="card-footer">
                        Closing Date....<small class="text-danger"></small>
                    </div>
                </div>
            </div>
        </div>
    </div>
      </div>
      
    </div>
  </div>




  <!-- <div class="card">
    <div class="card-header" id="headingThree">
      <h2 class="mb-0">
        <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#event3" aria-expanded="false" aria-controls="event3">
          Collapsible Group Item #3
        </button>
      </h2>
    </div>
    <div id="event3" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
      <div class="card-body">
        Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
      </div>
    </div>
  </div> -->



</div>

<?php require_once   __DIR__ . '/../view/footer.php';?>