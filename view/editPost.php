<?php if(!isset($_SESSION))
{
session_start();
} 
?>
<?php require_once  __DIR__ . '/../controller/checkSessionContol.php';?> 
<?php checkNotSession(); ?>
<?php require_once  __DIR__ . '/../model/sessionExpire.php';?>
<?php require_once  __DIR__ . '/header3.php';?>
<?php require_once __DIR__ . '/../model/dailyPageView.php'; ?>

<?php require_once  __DIR__ . '/../model/editPostArticle.php';?>

<?php
$replaceString = $article;

require_once __DIR__ . "/../model/msgReformatRead.php";

$article = $replaceString;
?>
 
<script>
    // title='Profile';
    titleTag('Edit Post');  
</script>

<div class="container text-center">
    
  <div class="row mt-3 text-center">
    <div class="col-md-2">    
    </div>
         
    <div class="col-md-8 w3-green mt-2 mb-4 pt-3 pb-3 " style="opacity:0.8; border-radius:2px"> 
      <div >
        <h3 class="m-3 text-right"><span class="w3-text-amber w3-animate-left">OOO </span>Edit Article</h3>
      </div> 
     
      <div class="p-3 border rounded">
      <form method="POST" action="/model/myWorkspaceEditProcess.php" enctype="multipart/form-data">
        <div>
          <input type="text" name="topic" class="form-control"
          <?php 
          if(isset($topic)){
            ?>
              value="<?php echo $topic;?>"
            <?php
          }
          ?> 
          >
        </div>
        <br>
        
        <div class="form">       
                  <select name="category" class="form-control" placeholder="Your Main Talent">
                  <option value="
                  <?php 
                    if(isset($topic)){
                      ?>
                        <?php echo $category;?>
                      <?php
                    }
                    ?>
                  ">
                  <?php 
                    if(isset($topic)){
                      ?>
                        <?php echo $category;?>
                      <?php
                    }
                    ?>
                  </option>
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
          <textarea id="article" name="article" class="form-control" style="height:200px">
          <?php 
          if(isset($topic)){
            ?>
              <?php echo $article;?>
            <?php
          }
          ?>
            
          </textarea>
        </div>
        <br>
        <div>
          <input type="file" name="file" placeholder="Post Article" class="form-control">
        </div>

         <br>
         <div>
          <input type="text" name="id" placeholder="Post Article" class="form-control" 
          
          <?php 
          if(isset($topic)){
            ?>
              value="<?php echo $id;?>"
            <?php
          }
          ?>
          
          hidden>
        </div>

         <br>
         <div>
          <input type="text" name="user_id" placeholder="Post Article" class="form-control"
          <?php 
          if(isset($topic)){
            ?>
value="<?php echo $user_id;?>"
            <?php
          }
          ?>
          
          hidden>
        </div>

        <br>
         
        <div>
          <input type="text" name="oldPic" placeholder="Post Article" class="form-control"
          <?php 
          if(isset($topic)){
            ?>
              value="<?php echo $oldPostFile;?>"
            <?php
          }
          ?>
          
          hidden>
        </div>

        <br>

        <div>
          <input type="submit" name="submit" value="Submit" class="form-control btn-warning">
        </div>
      </form>
    
    </div>
    </div>

    <div class="col-md-2"></div>
    </div>
</div>


<?php require_once __DIR__ . '/testimony.php';?>
<?php require_once __DIR__ . '/footer.php';?>
