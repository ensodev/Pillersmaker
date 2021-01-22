<?php
  require_once __DIR__ . '/../view/header.php';
  // require_once __DIR__ . '/../controller/checkSessionContol.php';
  // checkNotSession();
  // require_once __DIR__ . '/../controller/checkPaidMember.php';
  require_once __DIR__ . '/../model/dailyPageView.php';
?>

<div class="accordion" id="accordionExample">

<div class="card">

 
<div class="card-header w3-green" id="headingOne">
  <h2 class="mb-0">
    <button class="btn" type="button" data-toggle="collapse" data-target="#event" aria-expanded="true" aria-controls="event">
        <h3 class="w3-text-green ">Art/Graphic Awards<h3>
    </button>
    <div class="text-left">
      <!-- top/Down Short cut menu -->
                <small>
                <a href="/index1.php" class="btn btn-default btn-sm text-light">Home</a>
                <a href="/view/emailBoard.php" class="btn btn-default btn-sm text-light"> Message</a>
                <a href="/view/explore.php" class="btn btn-default btn-sm text-light">Explore</a>
                <a href="/view/settings.php" class="btn btn-default btn-sm text-light">Board</a>
                
               </small>
            <!-- shortcut menu end -->
      </div>

  </h2>

  
</div>

<div id="event" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
  <div class="card-body">
    <p></p>

  </div>
</div>
</div>

<!-- event1 -->
  <div class="card">
    <div class="card-header" id="headingOne">
      <h2 class="mb-0">
        <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#event1" aria-expanded="false" aria-controls="event1">
         BEST GRAPHIC DESIGNER  <small class="text-danger "> </small>
        </button>
      </h2>
    </div>
    <div id="event1" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
      <div class="card-body">
       
        <p>You can either Apply for this award or vote for members.</p>

        <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header w3-green">
                       Details of Application
                    </div>
                    <div class="card-body ">
                       
                    <p>
                        Click vote a friend if you know a friend on pillersmaker that has talent 
                        and have shown or display it through any form on this community. Voting 
                        for a friend will cost 1000'PVC' or equivalent in naira , 
                        you can also vote for yourself. 
                        </p>
                        <p>
                        Applying for this award means, pillersmaker panels will review your 
                        submitted works and other requirement, and the best in this category 
                        will be selected, by appling you are not waiting for members to vote 
                        for you, you are presenting your work directly to panel for review. 
                        2000 PVC or equivalent in naira is
                         the application fees
                        </p>

                        <p>
                        If you are applying click the Apply Now button, and submit all requirement to 
                        <a href='mailto:pillersmaker@pillersmaker.com'>Customer Care Email</a>.
                        </p>
                    </div>
                    <div class="card-footer">
                    <a href="../model/applyaward.php?applyaward=graphicdeigner" class="btn btn-success" >Apply Now</a>
                    <a href="../view/awardvote.php" class="btn btn-success">Vote</a>
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
                        <li>2 best Artwork</li>
                        <li>Inspiration behind the artwork</li>
                        <li>Download link to the artwork</li>
                        <li>Short Video of when you are creating the artwork</li>
                        <li>Your name and reachable contact</li>
                        <li>Profile Picture must be a face picture</li>
                       
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
         BEST PHOTOGRAPHER <small class="text-danger "></small>
        </button>
      </h2>
    </div>
    <div id="event2" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
      <div class="card-body">
      
      <p>You can either Apply for this award or vote for members.</p>
        <div class="container">
        <div class="row">
        <div class="col-md-6">
                <div class="card">
                    <div class="card-header w3-green">
                       Details of Application
                    </div>
                    <div class="card-body ">
                   
                    <p>
                        Click vote a friend if you know a friend on pillersmaker that has talent 
                        and have shown or display it through any form on this community. Voting 
                        for a friend will cost 1000'PVC' or equivalent in naira , 
                        you can also vote for yourself. 
                        </p>
                        <p>
                        Applying for this award means, pillersmaker panels will review your 
                        submitted works and other requirement, and the best in this category 
                        will be selected, by appling you are not waiting for members to vote 
                        for you, you are presenting your work directly to panel for review. 
                        2000 PVC or equivalent in naira is
                         the application fees
                        </p>

                        <p>
                        If you are applying click the Apply Now button, and submit all requirement to 
                        <a href='mailto:pillersmaker@pillersmaker.com'>Customer Care Email</a>.
                        </p>
                        
                        
                    </div>
                    <div class="card-footer">
                    <a href="../model/applyaward.php?applyaward=bestphotograher" class="btn btn-success" >Apply Now</a>
                    <a href="../view/awardvote.php" class="btn btn-success">Vote</a>
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
                        <li>1 Best Voted Photographer</li>
                        <li>1 Best applied Photographer</li>
                        
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
                        <li>2 best Artwork</li>
                        <li>Inspiration behind the artwork</li>
                        <li>Download link to the artwork</li>
                        <li>Short Video of when you are creating the artwork</li>
                        <li>Your name and reachable contact</li>
                        <li>Profile Picture must be a face picture</li>
                       
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
        BEST PAINTING ARTIST<small class="text-danger "></small>
        </button>
      </h2>
    </div>
    <div id="event3" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
      <div class="card-body">
     
        <p>You can either Apply for this award or vote for members.</p>
        <div class="container">
        <div class="row">
            <div class="col-md-6 ">
                <div class="card">
                    <div class="card-header w3-green">
                      Details of Application
                    </div>
                    <div class="card-body">
                    <p>
                        Click vote a friend if you know a friend on pillersmaker that has talent 
                        and have shown or display it through any form on this community. Voting 
                        for a friend will cost 1000'PVC' or equivalent in naira , 
                        you can also vote for yourself. 
                        </p>
                        <p>
                        Applying for this award means, pillersmaker panels will review your 
                        submitted works and other requirement, and the best in this category 
                        will be selected, by appling you are not waiting for members to vote 
                        for you, you are presenting your work directly to panel for review. 
                        2000 PVC or equivalent in naira is
                         the application fees
                        </p>

                        <p>
                        If you are applying click the Apply Now button, and submit all requirement to 
                        <a href='mailto:pillersmaker@pillersmaker.com'>Customer Care Email</a>.
                        </p>
                        
                    </div>
                    <div class="card-footer">
                    <a href="../model/applyaward.php?applyaward=bestpaintingartist" class="btn btn-success" >Apply Now</a>
                    <a href="../view/awardvote.php" class="btn btn-success">Vote</a>
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
                        <li>1 Best Voted Painter</li>
                        <li>1 Best applied painter</li>
                        
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
                        <li>2 best Artwork</li>
                        <li>Inspiration behind the artwork</li>
                        <li>Download link to the artwork</li>
                        <li>Short Video of when you are creating the artwork</li>
                        <li>Your name and reachable contact</li>
                        <li>Profile Picture must be a face picture</li>
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
        BEST PEN/PENCIL ARTIST<small class="text-danger "></small>
        </button>
      </h2>
    </div>
    <div id="event4" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
      <div class="card-body">
     
        <p>You can either Apply for this award or vote for members.</p>
        <div class="container">
        <div class="row">
            <div class="col-md-6 ">
                <div class="card">
                    <div class="card-header w3-green">
                      Details of Application
                    </div>
                    <div class="card-body">
                    <p>
                        Click vote a friend if you know a friend on pillersmaker that has talent 
                        and have shown or display it through any form on this community. Voting 
                        for a friend will cost 1000'PVC' or equivalent in naira , 
                        you can also vote for yourself. 
                        </p>
                        <p>
                        Applying for this award means, pillersmaker panels will review your 
                        submitted works and other requirement, and the best in this category 
                        will be selected, by appling you are not waiting for members to vote 
                        for you, you are presenting your work directly to panel for review. 
                        2000 PVC or equivalent in naira is
                         the application fees
                        </p>

                        <p>
                        If you are applying click the Apply Now button, and submit all requirement to 
                        <a href='mailto:pillersmaker@pillersmaker.com'>Customer Care Email</a>.
                        </p>
                    </div>
                    <div class="card-footer">
                    <a href="../model/applyaward.php?applyaward=bestpenartist" class="btn btn-success" >Apply Now</a>
                    <a href="../view/awardvote.php" class="btn btn-success">Vote</a>
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
                        <li>1 Best Voted Artist</li>
                        <li>1 Best applied Artist</li>
                        
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
                        <li>2 best Artwork</li>
                        <li>Inspiration behind the artwork</li>
                        <li>Download link to the artwork</li>
                        <li>Short Video of when you are creating the artwork</li>
                        <li>Your name and reachable contact</li>
                        <li>Profile Picture must be a face picture</li>
                        
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
        BEST FACE/BODY PAINTER<small class="text-danger "></small>
        </button>
      </h2>
    </div>
    <div id="event5" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
      <div class="card-body">
     
        <p>You can either Apply for this award or vote for members.</p>
        <div class="container">
        <div class="row">
            <div class="col-md-6 ">
                <div class="card">
                    <div class="card-header w3-green">
                      Details of Application
                    </div>
                    <div class="card-body">
                    
                    <p>
                        Click vote a friend if you know a friend on pillersmaker that has talent 
                        and have shown or display it through any form on this community. Voting 
                        for a friend will cost 1000'PVC' or equivalent in naira , 
                        you can also vote for yourself. 
                        </p>
                        <p>
                        Applying for this award means, pillersmaker panels will review your 
                        submitted works and other requirement, and the best in this category 
                        will be selected, by appling you are not waiting for members to vote 
                        for you, you are presenting your work directly to panel for review. 
                        2000 PVC or equivalent in naira is
                         the application fees
                        </p>

                        <p>
                        If you are applying click the Apply Now button, and submit all requirement to 
                        <a href='mailto:pillersmaker@pillersmaker.com'>Customer Care Email</a>.
                        </p>
                    </div>
                    <div class="card-footer">
                    <a href="../model/applyaward.php?applyaward=bestbodypainter" class="btn btn-success" >Apply Now</a>
                    <a href="../view/awardvote.php" class="btn btn-success">Vote</a>
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
                        <li>1 Best Voted Painter</li>
                        <li>1 Best applied Painter</li>
                        
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
                        <li>2 best Artwork</li>
                        <li>Inspiration behind the artwork</li>
                        <li>Download link to the artwork</li>
                        <li>Short Video of when you are creating the artwork</li>
                        <li>Your name and reachable contact</li>
                        <li>Profile Picture must be a face picture</li>
                        
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
        <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#event6" aria-expanded="false" aria-controls="event5">
        BEST HOUSE PAINTER<small class="text-danger "></small>
        </button>
      </h2>
    </div>
    <div id="event6" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
      <div class="card-body">
     
        <p>You can either Apply for this award or vote for members.</p>
        <div class="container">
        <div class="row">
            <div class="col-md-6 ">
                <div class="card">
                    <div class="card-header w3-green">
                      Details of Application
                    </div>
                    <div class="card-body">
                    
                    <p>
                        Click vote a friend if you know a friend on pillersmaker that has talent 
                        and have shown or display it through any form on this community. Voting 
                        for a friend will cost 1000'PVC' or equivalent in naira , 
                        you can also vote for yourself. 
                        </p>
                        <p>
                        Applying for this award means, pillersmaker panels will review your 
                        submitted works and other requirement, and the best in this category 
                        will be selected, by appling you are not waiting for members to vote 
                        for you, you are presenting your work directly to panel for review. 
                        2000 PVC or equivalent in naira is
                         the application fees
                        </p>

                        <p>
                        If you are applying click the Apply Now button, and submit all requirement to 
                        <a href='mailto:pillersmaker@pillersmaker.com'>Customer Care Email</a>.
                        </p>
                        
                    </div>
                    <div class="card-footer">
                    <a href="../model/applyaward.php?applyaward=besthousepainter" class="btn btn-success" >Apply Now</a>
                    <a href="../view/awardvote.php" class="btn btn-success">Vote</a>
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
                        <li>1 Best Voted Painter</li>
                        <li>1 Best applied Painter</li>
                        
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
                        <li>2 best Artwork</li>
                        <li>Inspiration behind the artwork</li>
                        <li>Download link to the artwork</li>
                        <li>Short Video of when you are creating the artwork</li>
                        <li>Your name and reachable contact</li>
                        <li>Profile Picture must be a face picture</li>
                       
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



</div>

<?php require_once  __DIR__ . '/../view/footer.php';?>