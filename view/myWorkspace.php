<?php if(!isset($_SESSION))
{
session_start();
}
?>

<?php require_once  __DIR__ .'/../controller/checkSessionContol.php';?> 
<?php checkNotSession(); ?>
<?php require_once  __DIR__ .'/../model/sessionExpire.php';?>
<?php require_once __DIR__ .'/../controller/checkPaidMember.php'; ?>
<?php require_once  __DIR__ .'/header3.php';?>
<?php require_once __DIR__ . '/../model/dailyPageView.php'; ?>
<?php require_once  __DIR__ .'/../model/connection.php';?>
<?php require_once  __DIR__ .'/../model/checkBalancePost.php' ;?>
 
<?php
  if(isset($_GET)){
    if(isset($_GET['color']) AND isset($_GET['error']) ){
      $color =$_GET['color'];
      $error =$_GET['error'];    
    
?>
      <div class="container mt-4 text-center">
      <div class='alert alert-<?php echo $color;?>'><?php echo $error; ?></div>
      </div>
<?php    
    
    }
  }
 ?>

<script>
    // title='Profile';
    titleTag('Post article on pillersmaker.com.ng');  
</script>

<div class="container text-center">
    
  <div class="row mt-3 text-center">
    <div class="col-md-1">    
    </div>         
         
    <div class="col-md-10 w3-green mt-2 mb-4 pt-3 pb-3 " style="opacity:0.8; border-radius:2px"> 
      <div > 
        <h3 class="m-3 text-right"><span class="w3-text-amber w3-animate-left">OOO </span>Post Article</h3>
        <hr />
          <?php require_once __DIR__ . '/../advert/advert1.php';?>
        <hr />
      </div> 
           
      <div class="p-3 border rounded">
      <form method="POST" action="/model/myWorkspaceProcess.php" enctype="multipart/form-data">
        <div>
          <input type="text" name="topic" placeholder="Post Topic" class="form-control">
        </div>
        <br>
         
        <div class="form">       
                  <select name="category" class="form-control" placeholder="Your Main Talent">
                  <option value="holder">Select Category....</option>
                  <option value="Sales Adverts">Sales Advertisement</option>
                  <option value="Job Adverts">Job Advertisement</option>
                  <option value="Entertainment">Entertainment</option>
                  <option value="Leadership">Leadership</option>
                  <option value="Art and Grahics">Art and Grahics</option>
                  <option value="Technology">Technology</option>
                  <option value="Fashion and Style">Fashion and Style</option>
                  <option value="Startups">Startups</option>
                  </select>
          </div>
      
        <p class='text-center mt-2'>
              <span style='color:black; font-size:12px'>.. | New Line;
              {p | New paragraph,
              p} | end Paragrph,
              {h | Heading,
              h} | end Heading,
              </span>
              
            </p>
        <div>
          <textarea id="article" name="article" placeholder="Post Article" class="form-control" style="height:200px"></textarea>
        </div>
        <br>
        <div>
          <input type="file" name="file" placeholder="Post Article" class="form-control">
        </div>

         <br>
        <div>
          <input type="submit" name="submit" value="Submit" class="form-control btn-warning">
        </div>
      </form>
    
    </div>
    </div>

    <div class="col-md-1"></div>
    </div>
</div>


<?php require_once __DIR__ .'/testimony.php';?>
<?php require_once __DIR__ .'/footer.php';?>
