
<!-- Main Footer -->
<footer class="main-footer">
    <!-- To the right -->
    <div class="float-right d-none d-sm-block-down">
        Anything you want
    </div>
    <!-- Default to the left -->
    <strong>CopyLeft &copy; 2018 <a href="http://github.com/mratwan/">محمدرضا عطوان</a>.</strong>
</footer>
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->
<script src="/jquery/jquery.min.js"></script>
<!-- Bootstrap -->
<script src="/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE -->
<script src="/js/adminlte.js"></script>
@if (Session::has('sweet_alert.alert'))
    <script>
        swal({!! Session::get('sweet_alert.alert') !!});
    </script>
@endif
@include('sweet::alert')
@yield('footer')
</body>
</html>
