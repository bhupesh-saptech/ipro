<?php 
    defined('BASEPATH') OR exit('No direct script access allowed'); 
    require 'assets/incld/header.php';
?>
    <h1 class="text-center">Welcome to AgileLabPlus</h1>
    <div class="container">
        <form>
            <label class="form-label">Asset No </label>
            <input class="form-control" name="asset_no">
             <label class="form-label">Asset Name </label>
            <input class="form-control" name="asset_name">
        </form>
    </div>
<?php
    require 'assets/incld/jslib.php';
    require 'assets/incld/footer.php';
?>