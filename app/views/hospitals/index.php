<?php require_once(APPROOT . "/views/inc/header-pages.php"); ?>
<div class="container my-5 py-5">
    <h1 class="display-4 text-center text-danger">Choose What You Want?</h1>
    <div class="row">
        <div class="col-lg-6 mx-auto mt-5 pt-5">
            <div class="card bg-danger text-white text-center p-5">
                <div class="card-body">
                    <h1 class="display-4">Login</h1>
                    <p class="lead">Login here if your hospital is registered with us</p>
                    <a href="<?php echo URLROOT; ?>/hospitals/login"
                       class="btn btn-lg btn-block btn-outline-light mt-5">Login</a>
                </div>
            </div>
        </div>
        <div class="col-lg-6 mx-auto mt-5 pt-5">
            <div class="card bg-danger text-white text-center p-5">
                <div class="card-body">
                    <h1 class="display-4">Register</h1>
                    <p class="lead">Register your hospital with us</p>
                    <a href="<?php echo URLROOT; ?>/hospitals/register"
                       class="btn btn-lg btn-block btn-outline-light mt-5">Register
                        Your Hospital</a>
                </div>
            </div>
        </div>
    </div>
</div>
<?php require_once(APPROOT . "/views/inc/footer.php"); ?>
