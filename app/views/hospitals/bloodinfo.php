<?php require_once(APPROOT . "/views/inc/header-pages.php"); ?>
<div class="container my-5 py-5">
    <h1 class="display-4 text-center text-danger">Add Blood Information</h1>
    <div class="row">
        <div class="col-lg-6 mx-auto mt-5 pt-5">
            <div id="display-flash" class="text-center text-white"><?php flash('register_success'); ?></div>
            <form action="#" method="post" class="text-danger">
                <div class="form-group">
                    <label for="bloodinfo-bloodgroup"><strong>Blood Group:</strong> <sup>*</sup></label>
                    <select id="bloodinfo-bloodgroup" name="bloodinfo_bloodgroup" required
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
                <div class="form-group">
                    <label for="bloodinfo-quantity"><strong>Blood Quantity:</strong> <span
                                class="text-muted">in litres</span> <sup>*</sup></label>
                    <input type="number" id="bloodinfo-quantity" name="bloodinfo_quantity"
                           class="form-control form-control-lg" required>
                </div>
                <div class="form-row mt-4">
                    <div class="col-6 mx-auto form-group">
                        <input type="submit" value="Add Blood" class="btn btn-lg btn-block btn-danger">
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<?php require_once(APPROOT . "/views/inc/footer.php"); ?>
