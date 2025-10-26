

    <footer class="main-footer">
        <div class="pull-right hidden-xs">
          <b>CodeInsect</b> Admin System | Version 1.6
        </div>
        <strong>Copyright &copy; 2014-2015 <a href="">CodeInsect</a>.</strong> All rights reserved.
    </footer>
    
    <script src="assets/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="assets/dist/js/adminlte.min.js" type="text/javascript"></script>
    <!-- <script src="assets/dist/js/pages/dashboard.js" type="text/javascript"></script> -->
    <script src="assets/js/jquery.validate.js" type="text/javascript"></script>
    <script src="assets/js/validation.js" type="text/javascript"></script>
    <script type="text/javascript">
        var windowURL = window.location.href;
        pageURL = windowURL.substring(0, windowURL.lastIndexOf('/'));
        var x= $('a[href="'+pageURL+'"]');
            x.addClass('active');
            x.parent().addClass('active');
        var y= $('a[href="'+windowURL+'"]');
            y.addClass('active');
            y.parent().addClass('active');
    </script>
  </body>
</html>