
<header>
  <div class="header-top">
    <div class="container">
      <div class="row">
        <div class="col-sm-12">
          <div class="top-left pull-left">
            <div class="language">
              <form action="#" method="post" enctype="multipart/form-data" id="language">
                <div class="btn-group">
                  <button class="btn btn-link dropdown-toggle" data-toggle="dropdown" aria-expanded="false"> Welcome to Basti Online </button>
                </div>
              </form>
            </div>
            <div class="wel-come-msg"><div id="logo"><img src="image/india.png" class="img-responsive" /></div></div>
          </div>
          <div class="top-right pull-right">
            <div id="top-links" class="nav pull-right">
              <ul class="list-inline">
                <?php if(isset($_SESSION['customer'])& !empty($_SESSION['customer'])){ ?>
                <li class="dropdown"><a href="#" title="My Account" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user" aria-hidden="true"></i><span>My Account</span> <span class="caret"></span></a>
                  <ul class="dropdown-menu dropdown-menu-right">
                    <li><a href="view-order.php">My orders</a></li>
                    <li><a href="edit-address.php">Edit Address</a></li>
                    <li><a href="logout.php">logout</a></li>
                  </ul>
                </li>
                <li><a href="wishlist.php" id="wishlist-total" title="Wish List (0)"><i class="fa fa-heart" aria-hidden="true"></i><span>Wish List</a></li>
                <?php }else{ ?>
                <li><a href="login.php" id="wishlist-total" title="login"><i class="fa fa-user" aria-hidden="true"></i><span>Login</a></li>
                <li><a href="login.php" id="wishlist-total" title="register"><i class="fa fa-user" aria-hidden="true"></i><span>Register</a></li>
              <?php }?>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="container">
    <div class="header-inner">
      <div class="col-sm-3 col-xs-3 header-left">
        <div id="logo"> <a href="index.php"><img src="image/logo1.png" title="E-Commerce" alt="E-Commerce" class="img-responsive" /></a> </div>
      </div>
      <div class="col-sm-9 col-xs-9 header-right">
        <div id="search" class="input-group">
          <form action="search.php" method="GET">
          <input type="text" name="search" value="" placeholder="Enter your keyword ..." class="form-control input-lg" />
          <span class="input-group-btn">
          <button type="submit" class="btn btn-default btn-lg"><span>Search</span></button>
          </span>
          </form>
           </div>
    <?php if (isset($_SESSION['cart'])) { $cart = $_SESSION['cart']; ?>
        <div id="cart" class="btn-group btn-block">
          <button type="button" class="btn btn-inverse btn-block btn-lg dropdown-toggle cart-dropdown-button"> <span id="cart-total"><span>Shopping Cart</span><br><?php
                echo count($cart); ?> items</span></button>
          <ul class="dropdown-menu pull-right cart-dropdown-menu">
            <li>
              <table class="table table-striped">
                <tbody>
                  <tr>
                    <div class="cart-info">
              <small>You have <em class="highlight"><?php
                echo count($cart); ?> item(s)</em> in your shopping bag</small>
              <br>
              <br>
              <?php
                //print_r($cart);
                $total = 0;
                foreach ($cart as $key => $value) {
                  //echo $key . " : " . $value['quantity'] ."<br>";
                  $navcartsql = "SELECT * FROM products WHERE id=$key";
                  $navcartres = mysqli_query($connection, $navcartsql);
                  $navcartr = mysqli_fetch_assoc($navcartres);

                
               ?>
              <div class="ci-item">
                <img src="admin/<?php echo $navcartr['thumb']; ?>" width="70" alt=""/>
                <div class="ci-item-info">
                  <h5><a href="single.php?id=<?php echo $navcartr['id']; ?>"><?php echo substr($navcartr['name'], 0 , 20); ?></a></h5>
                  <p><?php echo $value['quantity']; ?> x INR <?php echo $navcartr['price']; ?>.00/-</p>
                  <div class="ci-edit">
                    <!-- <a href="#" class="edit fa fa-edit"></a> -->
                    <a href="delcart.php?id=<?php echo $key; ?>" class="edit fa fa-trash"></a>
                    <hr>
                  </div>
                </div>
              </div>
              <?php 
              $total = $total + ($navcartr['price']*$value['quantity']);
              } ?>
                  </tr>
                </tbody>
              </table>
            </li>
            <li>
              <div>
                <div class="ci-total">Subtotal: INR <?php echo $total; ?>.00/-</div>
              <div class="cart-btn">
                <br>
                <a href="cart.php"><button class="btn">View Bag</button></a>
                <a href="checkout.php"><button class="btn">Checkout</button></a>
              </div>
            </div>
              </div>
            </li>
          </ul>
        </div>
        <?php } ?>
      </div>
    </div>
  </div>
</header>
<nav id="menu" class="navbar">
  <div class="nav-inner">
    <div class="navbar-header"><span id="category" class="visible-xs">Categories</span>
      <button type="button" class="btn btn-navbar navbar-toggle" ><i class="fa fa-bars"></i></button>
    </div>
    <div class="navbar-collapse">
      <ul class="main-navigation">
        <li><a href="index.php"   class="parent"  >Home</a> </li>
        <li><a href="#" class="active parent">Category</a>
          <ul>
            <?php
              $catsql = "SELECT * FROM category";
              $catres = mysqli_query($connection, $catsql);
              while($catr = mysqli_fetch_assoc($catres)){
             ?>
            <li><a href="category.php?id=<?php echo $catr['id']; ?>"><?php echo $catr['name']; ?></a></li>
            <?php } ?>
          </ul>
        </li>
        <li><a href="#" class="parent"  >Blog</a></li>
        <li><a href="#" >About us</a></li>
        <li><a href="#" >Contact Us</a> </li>
      </ul>
    </div>
  </div>
</nav>