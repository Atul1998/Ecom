<?php 
session_start();
require_once 'admin/config/connect.php'; ?>
<?php include'header.php'?>
<?php include'nav.php'?>
<div class="breadcrumb parallax-container">
  <div class="parallax"><img src="image/prlx.jpg" alt="#"></div>
  <h1>Category</h1>
  <ul>
    <li><a href="index.php">Home</a></li>
    <li><a href="#">Category</a></li>
  </ul>
</div>
<div id="center">
  <div class="container">
    <div class="row">
      <div class="content col-sm-12">
        <!-- tab-furniture-->
        <div id="tab-furnitur" class="tab-content">
          <div class="row">
            <?php 
                $sql = "SELECT * FROM products";
                if(isset($_GET['id']) & !empty($_GET['id'])){
                  $id = $_GET['id'];
                  $sql .= " WHERE catid=$id";
                }
                

                $res = mysqli_query($connection, $sql);
                while($r = mysqli_fetch_assoc($res)){
              ?>
            <div class="product-layout  product-grid  col-lg-3 col-md-4 col-sm-6 col-xs-12">
              <div class="item">
                <div class="product-thumb">
                   <a href="product.php?id=<?php echo $r['id']; ?>"><div class="image product-imageblock"><img src="admin/<?php echo $r['thumb']; ?>" alt="iPod Classic" title="iPod Classic" class="img-responsive" /> <img src="admin/<?php echo $r['thumb']; ?>" alt="iPod Classic" title="iPod Classic" class="img-responsive" /></div></a>
                    
                  
                  <div class="caption product-detail">
                    <h4 class="product-name"><a href="product.php?id=<?php echo $r['id']; ?>" title="Casual Shirt With Ruffle Hem"><?php echo $r['name']; ?></a></h4>
                    <p class="price product-price">INR <?php echo $r['price']; ?>.00/-</span></p>
                    <a href="addtocart.php?id=<?php echo $r['id']; ?>"><button type="button" class="btn btn-primary" title="Add to Cart"  > Add to Cart </button></a>
                  </div>
                </div>
              </div>
            </div>
            <?php } ?>
            
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<?php include'footer.php' ?>
</body>

<!-- Mirrored from html.lionode.com/moonstore/ms01/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 22 May 2020 17:27:09 GMT -->
</html>