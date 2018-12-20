<?php require_once(APPROOT . "/views/inc/header-pages.php"); ?>
<div class="container my-5 py-5">
    <h1 class="display-4 text-center text-danger">Welcome <?php echo $_SESSION['user_name']; ?></h1>
    <div class="row">
        <div class="col-md-6 mx-auto mt-5 pt-5">
            <div class="card mb-5">
                <div class="card-header bg-primary text-white">
                    <h1 class="text-center"><?php echo $_SESSION['user_name']; ?></h1>
                </div>
                <div class="card-body text-center">
                    <img src="<?php echo URLROOT . '/' . $_SESSION['user_dp']; ?>" alt="Profile Pic" class="img-fluid">
                </div>
            </div>
            <a href="<?php echo URLROOT; ?>/pages/bloodsamples" class="btn btn-danger btn-block btn-lg h2">
                Go to Blood Sample List
            </a>
        </div>
    </div>
</div>
<?php require_once(APPROOT . "/views/inc/footer.php"); ?>
