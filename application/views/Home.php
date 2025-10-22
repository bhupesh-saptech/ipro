<?php 
    defined('BASEPATH') OR exit('No direct script access allowed'); 
    require 'incld/header.php';
?>
    <h1 class="text-center">Welcome to AgileLabPlus</h1>
    <div class="container">
        <table class="table table-bordered">
            <tr>
                <th>#</th>
                <th>asset ID</th>
                <th>asset No</th>
                <th>asset Desc</th>
                <th>Assigned to</th>
                <th>Location</th>
            </tr>
            <tr>
                <td colspan="6"><?php echo $sum; ?></td>
            </tr>
        </table>
    </div>
<?php
    require 'incld/jslib.php';
    require 'incld/footer.php';
?>



