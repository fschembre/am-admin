<!-- Jquery -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<!-- eModal
<script src="//rawgit.com/saribe/eModal/master/dist/eModal.min.js"></script>
-->
<!-- Bootstrap Core JavaScript -->
 <script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>

<!-- Menu Toggle Script -->
<script>
    $("#menu-toggle").click(function(e) {
        e.preventDefault();
        $("#wrapper").toggleClass("toggled");
    });
</script>