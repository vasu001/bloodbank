<?php require_once(APPROOT . "/views/inc/header-pages.php"); ?>
<div class="receiver-login container my-5 py-5">
    <h1 class="display-4 text-center text-danger">Receiver Login</h1>
    <div class="row">
        <div class="col-md-6 mx-auto mt-5 pt-5">
            <div id="display-flash" class="text-center text-white"><?php flash('register_success'); ?></div>
            <form action="<?php echo URLROOT . '/users/receiverlogin'; ?>" method="post" class="text-danger">
                <div class="col form-group">
                    <label for="donor-email"><strong>Email:</strong> <sup>*</sup></label>
                    <input type="email" id="donor-email" name="donor_email"
                           class="form-control form-control-lg" required>
                </div>
                <div class="col form-group">
                    <label for="donor-password"><strong>Password:</strong> <sup>*</sup></label>
                    <input type="password" id="donor-password" name="donor_password"
                           class="form-control form-control-lg" required>
                </div>
                <div class="form-row mt-4">
                    <div class="col-6 mx-auto form-group">
                        <input type="submit" value="Login" class="btn btn-lg btn-block btn-danger">
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<?php require_once(APPROOT . "/views/inc/footer.php"); ?>
