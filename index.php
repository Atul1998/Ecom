<?php 
session_start();
require_once 'admin/config/connect.php'; ?>
<?php include'header.php'?>
<?php include'nav.php'?>
<style> .cont {
  position: relative;
  text-align: center;
  color: black;
}
.cent {
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
}</style>

<div class="mainbanner">
  <div id="main-banner" class="owl-carousel home-slider">
      <?php 
        $sql = "SELECT * FROM slider";
        $res = mysqli_query($connection, $sql);
        while ($r=mysqli_fetch_assoc($res)) {
      ?>
    <div class="cont">
      <div class="item"><a href="#"><img src="admin/<?php echo $r['thumb']; ?>" alt="main-banner1" class="img-responsive" /></a></div>
      <div class="cent"><h2><?php echo $r['name']; ?></h2><a href="#center"><button class="btn">Shop Now</button></a></div>    
    </div>
    <?php } ?>
  </div>
</div>
<div class="container">
  <div class="row">
    <div class="cms_banner">
          <div class="col-xs-12 col-md-6">
            <div id="subbanner1" class="banner sub-hover">
              <a href="#"><img src="image/banners/subbanner1.jpg" alt="Sub Banner1" class="img-responsive"></a>
              <div class="bannertext">
                <h2>wonem online</h2>
                <p>Shop New Season Clothing</p>
                <a href="#center"><button class="btn">Shop Now</button></a>
              </div>
        </div>
      </div>
          <div class="col-xs-12 col-md-6">
            <div id="subbanner2" class="banner sub-hover">
              <a href="#"><img src="image/banners/subbanner2.jpg" alt="Sub Banner2" class="img-responsive"></a>
              <div class="bannertext">
                <h2>Accessories </h2>
                <p>Get Wide Range Selection</p>
                <a href="#center"><button class="btn">Shop Now</button></a>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<div id="center">
  <div class="container">
    <div class="row">
      <div class="content col-sm-12">
        <div class="customtab">
          <h3 class="productblock-title">For Your Best Look</h3>
          <div id="tabs" class="customtab-wrapper">
            <ul class='customtab-inner'>
            </ul>
          </div>
        </div>
        <!-- tab-furniture-->
        <div id="tab-furnitur" class="tab-content">
          <div class="row">
            <br>
            <br>
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
            <div class="viewmore">
              <a href="category.php"><div class="btn">View More All Products</div></a>
            </div>
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