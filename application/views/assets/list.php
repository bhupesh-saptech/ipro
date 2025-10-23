<?php 
    defined('BASEPATH') OR exit('No direct script access allowed'); 
    require 'assets/incld/header.php';
?>
    <h1 class="text-center">Welcome to AgileLabPlus</h1>
    <div class="container">
        <table class="table table-bordered">
            <tr class="bg-primary text-white">
                <th>#</th>
                <th>asset ID</th>
                <th>asset No</th>
                <th>asset Name</th>
                <th>Assigned to</th>
                <th>Location</th>
                <th>Asset Value</th>
                <th colspan="3">Action</th>
            </tr>
            <?php if(!empty($assets)) {
                foreach($assets as $key => $asset) {
            ?>
            <tr>
                <td><?php echo ++$key;   ?></td>
                <td><?php echo $asset->asset_id;   ?></td>
                <td><?php echo $asset->asset_no;   ?></td>
                <td><?php echo $asset->asset_name; ?></td>
                <td><?php echo $asset->staff_name; ?></td>
                <td><?php echo $asset->site_name ; ?></td>
                <td class="text-right"><?php echo $asset->net_value ; ?></td>
                <td><i class="fas fa-eye"></i></td>
                <td><i class="fas fa-eye"></i></td>
                <td><i class="fas fa-eye"></i></td>
            </tr>
            <?php }
            } ?>
        </table>
    </div>
<?php
    require 'assets/incld/jslib.php';
    require 'assets/incld/footer.php';
?>



