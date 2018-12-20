<?php require_once(APPROOT . "/views/inc/header-pages.php"); ?>
<div class="container my-5 py-5">
    <h1 class="display-4 text-center text-danger">Dashboard</h1>
    <div class="row">
        <div class="col-lg-8 mx-auto mt-3 pt-3">
            <div id="display-flash" class="text-center text-white"><?php flash('register_success'); ?></div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-6 mx-auto mt-5 pt-5">
            <div class="card bg-danger text-white text-center p-5">
                <div class="card-body">
                    <h1 class="h2">Add Blood Information</h1>
                    <p class="lead">Add the available blood groups</p>
                    <a href="<?php echo URLROOT; ?>/hospitals/bloodinfo"
                       class="btn btn-lg btn-block btn-outline-light mt-5">Fill Blood Bank</a>
                </div>
            </div>
        </div>
        <div class="col-lg-6 mx-auto mt-5 pt-5">
            <div class="card bg-danger text-white text-center p-5">
                <div class="card-body">
                    <h1 class="h2">View Blood Request</h1>
                    <p class="lead">Check the request received for the blood</p>
                    <a href="<?php echo URLROOT; ?>/hospitals/requestblood"
                       class="btn btn-lg btn-block btn-outline-light mt-5">Check Request for Blood</a>
                </div>
            </div>
        </div>
    </div>
</div>
<?php require_once(APPROOT . "/views/inc/footer.php"); ?>
