<?php 
ob_start();
session_start();
require_once 'admin/config/connect.php';
if(isset($_GET['id']) & !empty($_GET['id'])){
  $id = $_GET['id'];
  $prodsql = "SELECT * FROM products WHERE id=$id";
  $prodres = mysqli_query($connection, $prodsql);
  $prodr = mysqli_fetch_assoc($prodres);
}else{
  header('location: index.php');
}
if(isset($_SESSION['customer'])& !empty($_SESSION['customer'])){
$uid = $_SESSION['customerid'];
}
if(isset($_POST) & !empty($_POST)){
  
  $review = filter_var($_POST['review'], FILTER_SANITIZE_STRING);

  $revsql = "INSERT INTO reviews (pid, uid, review) VALUES ($id, $uid, '$review')";
  $revres = mysqli_query($connection, $revsql);
  if($revres){
    $smsg = "Review Submitted Successfully";
  }else{
    $fmsg = "Failed to Submit Review";
  }
}

?>
<?php include'header.php'?>
<?php include'nav.php'?>
<div class="breadcrumb parallax-container">
  <div class="parallax"><img src="image/prlx.jpg" alt="#"></div>
  <h1>Product</h1>
  <ul>
    <li><a href="index.html">Home</a></li>
    <li><a href="category.html">Desktops</a></li>
    <li><a href="#">Casual Shirt With Ruffle Hem</a></li>
  </ul>
</div>
<div class="container">
  <div class="row">
    <div class="content col-sm-12">
      <div class="row">
        <div class="col-sm-5">
          <div class="thumbnails">
            <div><a class="thumbnail fancybox" href="#" title="Casual Shirt With Ruffle Hem"><img src="admin/<?php echo $prodr['thumb']; ?>" title="Casual Shirt With Ruffle Hem" alt="iPod Classic" /></a></div>
            <div id="product-thumbnail" class="owl-carousel">
              <div class="item">
                <div class="image-additional"><a class="thumbnail fancybox" href="image/product/product1.jpg" title="iPod Classic"> <img src="admin/<?php echo $prodr['thumb']; ?>" title="iPod Classic" alt="iPod Classic" /></a></div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-sm-7 prodetail">
          <h1 class="productpage-title"><?php echo $prodr['name']; ?></h1>
          <ul class="list-unstyled productinfo-details-top">
            <li>
              <hr>
              <h2 class="productpage-price">INR <?php echo $prodr['price']; ?>.00/-</h2>
            </li>
          </ul>
          <ul class="list-unstyled product_info">
            <li>
              <label>Category:</label>
              <span>
                <?php 
                $prodcatsql = "SELECT * FROM category WHERE id={$prodr['catid']}"; 
                $prodcatres = mysqli_query($connection, $prodcatsql);
                $prodcatr = mysqli_fetch_assoc($prodcatres);
                ?> 
                <a href="#"><?php echo $prodcatr['name']; ?></a></span></li>
              <label>Availability:</label>
              <span> In Stock</span></li>
          </ul>
          <hr>
          <p class="product-desc"> <?php echo $prodr['description']; ?></p>
          <form method="get" action="addtocart.php">
          <div id="product">
            <div class="form-group">
              <div class="qty">
                <span>Quantity:</span> 
                  <input type="hidden" name="id" value="<?php echo $prodr['id']; ?>">
                  <input type="text" name="quant" placeholder="1">
              </div>
              <div class="row">
                <div class="col-md-6">
                   <?php if(isset($_SESSION['customer']) & !empty($_SESSION['customer'])){ ?><a href="addtowishlist.php?id=<?php echo $prodr['id']; ?>"><input type="button" class="btn btn-primary" value="Wishlist"></a><?php } ?>
                    <input type="submit" class="btn btn-primary" value="Add to Cart">
                </div>
                <div class="Color col-md-6">
                </div>
              </div>
            </div>
          </div>
        </form>  
        </div>
      </div>
    
      <?php if(isset($fmsg)){ ?><div class="alert alert-danger" role="alert"> <?php echo $fmsg; ?> </div><?php } ?>
            <?php if(isset($smsg)){ ?><div class="alert alert-success" role="alert"> <?php echo $smsg; ?> </div><?php } ?>
      <div class="productinfo-tab">
        <ul class="nav nav-tabs">
          <li class="active"><a href="#tab-description" data-toggle="tab">Description</a></li>
          <li><a href="#tab-review" data-toggle="tab">Reviews</a></li>
        </ul>
        <div class="tab-content">
          <div class="tab-pane active" id="tab-description">
            <div class="cpt_product_description ">
              <div>
                <p><?php echo $prodr['description']; ?></p>
              </div>
            </div>
            <!-- cpt_container_end --></div>
          <div class="tab-pane" id="tab-review">
            <form class="form-horizontal">
              <div id="review"></div>
              <?php
                  $revcountsql = "SELECT count(*) AS count FROM reviews r WHERE r.pid=$id";
                  $revcountres = mysqli_query($connection, $revcountsql);
                  $revcountr = mysqli_fetch_assoc($revcountres);

                 ?>
                  <h4 class="uppercase space35"><?php echo $revcountr['count']; ?> Reviews for <?php echo substr($prodr['name'], 0, 20); ?></h4>
                  <br>
                  <?php 
                    $selrevsql = "SELECT u.firstname, u.lastname, r.`timestamp`, r.review FROM reviews r JOIN usersmeta u WHERE r.uid=u.uid AND r.pid=$id";
                    $selrevres = mysqli_query($connection, $selrevsql);
                    while($selrevr = mysqli_fetch_assoc($selrevres)){
                  ?>
                  <h4 class="uppercase space35"><a href="#"><?php echo $selrevr['firstname']." ". $selrevr['lastname']; ?></a>
                        <span>
                        <em><?php echo $selrevr['timestamp']; ?></em>
                        </span>
                  </h4>
                  <p>
                    <?php echo $selrevr['review']; ?>
                  </p>
                  <?php } ?>
                  <br>
               <?php 

                  if(isset($_SESSION['customer'])& !empty($_SESSION['customer'])){
                    $chkrevsql = "SELECT * FROM reviews r WHERE r.uid=$uid";
                    $chkrevres = mysqli_query($connection, $chkrevsql);
                    $chkrevr = mysqli_fetch_assoc($chkrevres);
                  ?>
                  <h4 class="uppercase space20">Add a review</h4>
                  <form id="form" class="review-form" method="post">
                  <?php
                    $usersql = "SELECT u.email, u1.firstname, u1.lastname FROM users u JOIN usersmeta u1 WHERE u.id=u1.uid AND u.id=$uid";
                    $userres = mysqli_query($connection, $usersql);
                    $userr = mysqli_fetch_assoc($userres);
                   ?>   
              <div class="form-group required">
                <div class="row">
                      <div class="col-md-6 space20">
                        <input name="name" class="input-md form-control" placeholder="Name *" maxlength="100" required="" type="text" value="<?php echo $userr['firstname'] . " " . $userr['lastname'];?>" disabled>
                      </div>
                      <div class="col-md-6 space20">
                        <input name="email" class="input-md form-control" placeholder="Email *" maxlength="100" required="" type="email" value="<?php echo $userr['email']; ?>" disabled>
                      </div>
                    </div>
              </div>
              <div class="form-group required">
                <div class="col-sm-12">
                  <label class="control-label" for="input-review">Your Review</label>
                  <textarea name="review" id="text" class="input-md form-control" rows="6" placeholder="Add review.." maxlength="400"></textarea>
                  <div class="help-block"><span class="text-danger">Note:</span> HTML is not translated!</div>
                </div>
              </div>
              <div class="buttons clearfix">
                <div class="pull-right">
                  <button type="submit" class="btn">
                    Submit Review
                    </button>
                </div>
              </div>
            </form>
            <?php } ?>
          </div>
        </div>
      </div>
      <h3 class="productblock-title">Related Products</h3>
      <h4 class="title-subline">What’s so special? Check it out!</h4>
      <div class="box">
        <div id="related-slidertab" class="row owl-carousel product-slider">
          <?php
                $relsql = "SELECT * FROM products WHERE id != $id ORDER BY rand() LIMIT 4";
                $relres = mysqli_query($connection, $relsql);
                while($relr = mysqli_fetch_assoc($relres)){
               ?>
          <div class="item">
            <div class="product-thumb transition">
              <div class="image product-imageblock"> <a href="product.php?id=<?php echo $r['id']; ?>">
                <a href="product.php?id=<?php echo $relr['id']; ?>"><div class="image product-imageblock"><img src="admin/<?php echo $relr['thumb']; ?>" alt="iPod Classic" title="iPod Classic" class="img-responsive" /> <img src="admin/<?php echo $relr['thumb']; ?>" alt="iPod Classic" title="iPod Classic" class="img-responsive" /></div></a>
                   
              </div>
              <div class="caption product-detail">
                    <h4 class="product-name"><a href="product.php?id=<?php echo $relr['id']; ?>" title="Casual Shirt With Ruffle Hem"><?php echo $relr['name']; ?></a></h4>
                    <p class="price product-price">INR <?php echo $relr['price']; ?>.00/-</span></p>
              </div>
            </div>
          </div>
          <?php } ?>
        </div>
      </div>
    </div>
  </div>
</div>
<?php include 'footer.php' ?>
</body>
</html>
