<?php require_once(APPROOT . "/views/inc/header-pages.php"); ?>
<div class="container my-5 py-5">
    <h1 class="display-4 text-center text-danger">Requests</h1>
    <div class="row mt-5">
        <div class="col-md-12">
            <div id="display-flash" class="text-center text-white"><?php flash('register_success'); ?></div>
            <table class="table table-bordered table-hover">
                <thead class="bg-danger text-white text-center">
                    <tr>
                        <th>Requester's Name</th>
                        <th>Blood Group</th>
                        <th>Confirm Blood Availability</th>
                    </tr>
                </thead>
                <tbody class="text-center">
                  <?php if( ! empty($data['row'])): foreach($data['row'] as $d): ?>
                      <tr>
                          <td><?php echo $d->{'name'}; ?></td>
                          <td><?php echo $d->{'blood'}; ?></td>
                          <td>
                              <button class="btn btn-sm bg-success text-white">
                                  Available
                              </button>
                              </form>
                          </td>
                      </tr>
                  <?php endforeach;
                  endif; ?>
                </tbody>
            </table>
            <nav aria-label="blood-navigation">
                <ul class="pagination">
                    <li class="page-item"><a class="page-link disabled" href="#"><i
                                    class="fas fa-chevron-circle-left"></i></a></li>
                  <?php
                    for($i = 0; $i < $data['pages']; $i++):
                      ?>
                        <li class="page-item">
                            <a class="page-link"
                               href="<?php echo URLROOT; ?>/hospitals/requestblood/<?php echo $i + 1; ?>"
                               name="pages"><?php echo $i + 1; ?></a>
                        </li>
                    <?php
                    endfor;
                  ?>
                    <li class="page-item"><a class="page-link disabled" href=""><i
                                    class="fas fa-chevron-circle-right"></i></a></li>
                </ul>
            </nav>
        </div>
    </div>
</div>
<?php require_once(APPROOT . "/views/inc/footer.php"); ?>
