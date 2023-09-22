<?php 
    include("config/config.php");
    function siteMaintenanceMode(){
        global $con;
        $alert = "";
        global $row_maintenance;
        global $checked;
        $maintenance_mode = "SELECT * FROM settings";
        $run_maintenance = mysqli_query($con, $maintenance_mode);
        $row_maintenance = mysqli_fetch_array($run_maintenance);

        if($row_maintenance['site_maintenance'] == 1){
            $checked = 'checked';
            echo <<<maintenance
            <div class="card text-white bg-danger bg-gradient mb-3">
                <div class="card-body fw-bold">
                    <i class="bi bi-exclamation-triangle-fill fs-5"></i> Maintenance Mode is Active
                </div>
            </div>
            maintenance;
        }
    }
?>