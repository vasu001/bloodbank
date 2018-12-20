<?php require_once(APPROOT . "/views/inc/header-pages.php"); ?>
<div class="container my-5 py-5">
    <h1 class="display-4 text-center text-danger">Receiver Sign Up</h1>
    <div class="row mt-5">
        <div class="col-md-10 mx-auto">
            <form action="<?php echo URLROOT . '/users/receiversignup'; ?>" method="post" class="text-danger"
                  enctype="multipart/form-data">
                <div class="form-row">
                    <div class="col form-group">
                        <label for="donor-name"><strong>Name:</strong> <sup>*</sup></label>
                        <input type="text" id="donor-name" name="donor_name"
                               class="form-control form-control-lg" required>
                    </div>
                    <div class="col form-group">
                        <label for="father-name"><strong>Father's Name:</strong> <sup>*</sup></label>
                        <input type="text" id="father-name" name="father_name"
                               class="form-control form-control-lg" required>
                    </div>
                </div>
                <div class="form-row">
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
                </div>
                <div class="form-row">
                    <div class="col-3 form-group">
                        <label for="donor-gender"><strong>Gender:</strong> <sup>*</sup></label>
                        <select id="donor-gender" name="donor_gender" required
                                class="form-control form-control-lg input-sm">
                            <option value="">Select Gender</option>
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                        </select>
                    </div>
                    <div class="col-3 form-group">
                        <label for="donor-bloodgroup"><strong>Blood Group:</strong> <sup>*</sup></label>
                        <select id="donor-bloodgroup" name="donor_bloodgroup" required
                                class="form-control form-control-lg input-sm">
                            <option value="">Select Blood</option>
                            <option value="A+">A+</option>
                            <option value="B+">B+</option>
                            <option value="O+">O+</option>
                            <option value="AB+">AB+</option>
                            <option value="A1+">A1+</option>
                            <option value="A2+">A2+</option>
                            <option value="A1B+">A1B+</option>
                            <option value="A2B+">A2B+</option>
                            <option value="A-">A-</option>
                            <option value="B-">B-</option>
                            <option value="O-">O-</option>
                            <option value="AB-">AB-</option>
                            <option value="A1-">A1-</option>
                            <option value="A2-">A2-</option>
                            <option value="A1B">A1B-</option>
                            <option value="A2B">A2B-</option>
                            <option value="A2B">Bombay o+</option>
                            <option value="A2B">Bombay o-</option>
                        </select>
                    </div>
                    <div class="col-3 form-group">
                        <label for="donor-dob"><strong>DOB:</strong> <sup>*</sup></label>
                        <input type="date" id="donor-dob" name="donor_dob"
                               class="form-control form-control-lg" required>
                    </div>
                    <div class="col-3 form-group">
                        <label for="donor-mobile"><strong>Mobile:</strong> <sup>*</sup></label>
                        <input type="number" id="donor-mobile" name="donor_mobile"
                               class="form-control form-control-lg" required>
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-3 form-group">
                        <label for="donor-state"><strong>State:</strong> <sup>*</sup></label>
                        <input type="text" id="donor-state" name="donor_state"
                               class="form-control form-control-lg" required>
                    </div>
                    <div class="col-3 form-group">
                        <label for="donor-city"><strong>City:</strong> <sup>*</sup></label>
                        <input type="text" id="donor-city" name="donor_city"
                               class="form-control form-control-lg" required>
                    </div>
                    <div class="col-3 form-group">
                        <label for="donor-address"><strong>Address:</strong> <sup>*</sup></label>
                        <input type="text" id="donor-address" name="donor_address"
                               class="form-control form-control-lg" required>
                    </div>
                    <div class="col-3 form-group">
                        <label for="donor-pincode"><strong>Pincode:</strong> <sup>*</sup></label>
                        <input type="number" id="donor-pincode" name="donor_pincode"
                               class="form-control form-control-lg" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="fileToUpload"><strong>Upload Photo:</strong> <sup>*</sup></label>
                    <input type="file" id="fileToUpload"
                           class="form-control-file <?php echo ( ! empty($data['receiverdp_err'])) ? 'is-invalid' : ''; ?>"
                           name="donor_dp" required>
                    <span class="invalid-feedback"><?php echo $data['receiverdp_err']; ?></span>
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
