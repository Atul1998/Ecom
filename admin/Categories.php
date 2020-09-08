<?php 
 session_start();
 require_once'config/connect.php';
 if (!isset($_SAESSION['email'])& empty($_SESSION['email'])) {
 	header('location: login.php');
 }
?>

<?php include 'header.php' ?>
    <body class="sb-nav-fixed">
        <?php include 'nav.php' ?>
            </div>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid">
                        <h1 class="mt-4">View Categories</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
                            <li class="breadcrumb-item active">View Categories</li>
                        </ol>
                        <div class="card mb-4">
                            <div class="card-body">View Categories</div>
                        </div>
                        <div class="card mb-4">
                            <div class="card-header"><i class="fas fa-table mr-1"></i>Categories</div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Category Name</th>
                                                <th>Operations</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php 
                                                $sql = "SELECT * FROM category";
                                                $res = mysqli_query($connection, $sql);
                                                while ($r=mysqli_fetch_assoc($res)) {
                                            ?>
                                                <tr>
                                                    <th scope="row"><?php echo $r['id']?></th>
                                                    <td><?php echo $r['name'] ?></td>
                                                    <td><a href="editcategory.php ?id=<?php echo $r['id'];?>">Edit</a>|<a href="delcategory.php ?id=<?php echo $r['id'];?>">Delete</a></td>
                                                </tr>
                                            <?php } ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
<?php include'footer.php' ?>
    </body>
</html>
