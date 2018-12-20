<?php require_once(APPROOT . "/views/inc/header-pages.php"); ?>
<div class="receiver-login container my-5 py-5">
    <h1 class="display-4 text-center text-danger">Hospital Registration</h1>
    <div class="row">
        <div class="col-md-6 mx-auto mt-5 pt-5">
            <div id="display-flash" class="text-center text-white"><?php flash('register_success'); ?></div>
            <form action="<?php echo URLROOT; ?>/hospitals/register" method="post" class="text-danger">
                <div class="col form-group">
                    <label for="hospital-name"><strong>Hospital's Name:</strong> <sup>*</sup></label>
                    <input type="text" id="hospital-name" name="hospital_name"
                           class="form-control form-control-lg" required>
                </div>
                <div class="col form-group">
                    <label for="hospital-id"><strong>Registration ID:</strong> <sup>*</sup></label>
                    <input type="text" id="hospital-id" name="hospital_id"
                           class="form-control form-control-lg" required>
                </div>
                <div class="col form-group">
                    <label for="hospital-email"><strong>Hospital's Email:</strong> <sup>*</sup></label>
                    <input type="email" id="hospital-email" name="hospital_email"
                           class="form-control form-control-lg" required>
                </div>
                <div class="col form-group">
                    <label for="hospital-password"><strong>Hospital's Password:</strong> <sup>*</sup></label>
                    <input type="password" id="hospital-password" name="hospital_password"
                           class="form-control form-control-lg" required>
                </div>
                <div class="form-row mt-4">
                    <div class="col-6 mx-auto form-group">
                        <input type="submit" value="Register" class="btn btn-lg btn-block btn-danger">
                    </div>
                </div>

            </form>
        </div>
    </div>
</div>
<?php require_once(APPROOT . "/views/inc/footer.php"); ?>
