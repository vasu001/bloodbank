<footer class="bg-danger py-2 text-center text-white">
    <p class="lead pt-3">Copyright &copy; 2018 - <span id="year"></span> Saurabh Srivastava</p>
</footer>


<!-- jQuery and Bootstrap 4 dependency scripts -->
<script src="https://code.jquery.com/jquery-3.3.1.min.js"
        integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
        crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"
        integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49"
        crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"
        integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy"
        crossorigin="anonymous"></script>

<!-- Custom Scripts -->
<script>
    $('[data-fancybox^="gallery"]').fancybox({
        transitionEffect: "circular",
        loop: "true"
    });
</script>
<script>
    // Get the current year for the copyright
    $('#year').text(new Date().getFullYear() + 1);

    // Init Scrollspy
    $('body').scrollspy({
        target: '#main-nav'
    })

    // Smooth Scrolling
    $('#main-nav a').on('click', function (event) {
        if (this.hash !== "") {
            event.preventDefault();
            const hash = this.hash;
            $('html, body').animate({
                scrollTop: $(hash).offset().top
            }, 1200, function () {
                window.location.hash = hash;
            });
        }
    });
</script>
<script src="<?php echo URLROOT; ?>/js/jquery.fancybox.min.js"></script>
<script src="<?php echo URLROOT; ?>/js/main.js"></script>
</body>
</html>