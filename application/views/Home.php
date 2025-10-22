<?php 
    defined('BASEPATH') OR exit('No direct script access allowed'); 
    require 'incld/header.php';
?>
    <h1 class="text-center">Welcome to AgileLabPlus</h1>
    <div class="container">
        <table class="table table-bordered">
            <tr class="bg-dark text-white">
                <th>#</th>
                <th>asset ID</th>
                <th>asset No</th>
                <th>asset Name</th>
                <th>Assigned to</th>
                <th>Location</th>
            </tr>
            <?php if(!empty($assets)) {
                foreach($assets as $key=> $asset) {
            ?>
            <tr>
                <td><?php echo $key;   ?></td>
                <td><?php echo $asset->asset_id;   ?></td>
                <td><?php echo $asset->asset_no;   ?></td>
                <td><?php echo $asset->asset_name; ?></td>
                <td><?php echo $asset->staff_name; ?></td>
                <td><?php echo $asset->site_name ; ?></td>
            </tr>
            <?php }
            } ?>
        </table>
    </div>
<?php
    require 'incld/jslib.php';
    require 'incld/footer.php';
?>



