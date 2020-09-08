<?php
	session_start();
	require_once 'config/connect.php';
	if(!isset($_SESSION['email']) & empty($_SESSION['email'])){
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
                        <h1 class="mt-4">Home Page</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Home Page</li>
                        </ol>
                        <div class="row">
                            <div class="col-xl-12 col-md-6">
                                <div class="card bg-primary text-white mb-4">
                                    <div class="card-body">Edit Slider</div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="showslider.php">View Details</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
                <main>
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-xl-6 col-md-6">
                                <div class="card bg-primary text-white mb-4">
                                    <div class="card-body">Left Image</div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="#">View Details</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-6 col-md-6">
                                <div class="card bg-primary text-white mb-4">
                                    <div class="card-body">Right Image</div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="#">View Details</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
                <main>
                    <div class="container-fluid">
                        <h1 class="mt-4">Other pages</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Other pages</li>
                        </ol>
                        <div class="row">
                            <div class="col-xl-12 col-md-6">
                                <div class="card bg-primary text-white mb-4">
                                    <div class="card-body">Edit Slider</div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="#">View Details</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
                <main>
                    <div class="container-fluid">
                        <h1 class="mt-4">Title description</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Edit Title description of the website</li>
                        </ol>
                        <div class="row">
                            <div class="col-xl-12 col-md-6">
                                <div class="card bg-primary text-white mb-4">
                                    <div class="card-body">Edit Slider</div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="#">View Details</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
<?php include 'footer.php'?>
    </body>
</html>
