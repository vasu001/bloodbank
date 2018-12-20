<?php if( ! isReceiverLoggedIn()): ?>
  <?php if( ! isHospitalLoggedIn()): ?>
        <nav class="navbar navbar-expand-lg navbar-dark bg-danger py-3 fixed-top" id="main-nav">
            <div class="container">
                <a href="<?php echo URLROOT; ?>" class="navbar-brand"><i class="fas fa-heartbeat"></i> Naya Jeevan</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarlist"
                        aria-controls="navbarlist" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarlist">
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item"><a href="<?php echo URLROOT; ?>" class="nav-link"><i
                                        class="fas fa-home"></i>
                                Home</a>
                        </li>
                        <li class="nav-item"><a href="<?php echo URLROOT; ?>/pages/about" class="nav-link"><i
                                        class="fas fa-info-circle"></i> About</a></li>
                        <li class="nav-item"><a href="<?php echo URLROOT; ?>/pages/bloodsamples" class="nav-link"><i
                                        class="fas fa-tint"></i> Blood
                                Samples</a></li>
                    </ul>
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item"><a href="<?php echo URLROOT; ?>/users/receiverlogin" class="nav-link"><i
                                        class="fas fa-sign-in-alt"></i> Receiver Login</a>
                        </li>
                        <li class="nav-item"><a href="<?php echo URLROOT; ?>/users/receiversignup" class="nav-link"><i
                                        class="fas fa-user-plus"></i> Receiver Sign
                                Up</a></li>
                        <li class="nav-item"><a href="<?php echo URLROOT; ?>/hospitals/index" class="nav-link"><i
                                        class="fas fa-user-md"></i> Hospitals</a></li>
                    </ul>
                </div>
            </div>
        </nav>
  <?php elseif(isHospitalLoggedIn()): ?>
        <nav class="navbar navbar-expand-lg navbar-dark bg-danger py-3 fixed-top" id="main-nav">
            <div class="container">
                <a href="<?php echo URLROOT; ?>/hospitals/dashboard" class="navbar-brand"><i
                            class="fas fa-heartbeat"></i> Naya Jeevan</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarlist"
                        aria-controls="navbarlist" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarlist">
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item"><a href="<?php echo URLROOT; ?>/pages/about" class="nav-link"><i
                                        class="fas fa-info-circle"></i> About</a></li>
                        <li class="nav-item"><a href="<?php echo URLROOT; ?>/pages/bloodsamples" class="nav-link"><i
                                        class="fas fa-tint"></i> Blood
                                Samples</a></li>
                    </ul>
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item">
                            <a href="<?php echo URLROOT; ?>/hospitals/dashboard"
                               class="nav-link">Welcome <?php echo $_SESSION['admin_name']; ?></a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo URLROOT; ?>/hospitals/logout" class="nav-link"><i
                                        class="fas fa-sign-out-alt"></i> Logout</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
  <?php endif; ?>
<?php elseif(isReceiverLoggedIn()): ?>
    <nav class="navbar navbar-expand-lg navbar-dark bg-danger py-3 fixed-top" id="main-nav">
        <div class="container">
            <a href="<?php echo URLROOT; ?>/users/dashboard" class="navbar-brand"><i class="fas fa-heartbeat"></i> Naya
                Jeevan</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarlist"
                    aria-controls="navbarlist" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarlist">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item"><a href="<?php echo URLROOT; ?>/pages/about" class="nav-link"><i
                                    class="fas fa-info-circle"></i> About</a></li>
                    <li class="nav-item"><a href="<?php echo URLROOT; ?>/pages/bloodsamples" class="nav-link"><i
                                    class="fas fa-tint"></i> Blood
                            Samples</a></li>
                </ul>
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a href="<?php echo URLROOT; ?>/users/dashboard"
                           class="nav-link">Welcome <?php echo $_SESSION['user_name']; ?></a>
                    </li>
                    <li class="nav-item">
                        <a href="<?php echo URLROOT; ?>/users/logout" class="nav-link"><i
                                    class="fas fa-sign-out-alt"></i> Logout</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
<?php endif; ?>
