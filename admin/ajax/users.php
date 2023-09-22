<?php 
    include("../config/config.php");
    include("../config/essentials.php");
    $del_user_img_absolute_path = USERS_IMG_ABSOLUTE_PATH;
    
    // ! load users from db
    if(isset($_POST['key']) && $_POST['key'] == 'get_users'){
        $user_img_path = USERS_IMG_PATH;
        $qry = "SELECT * FROM users ORDER BY id DESC";
        $exe = mysqli_query($con, $qry);
        $output = "";
        $status = "";
        $actionBtn = "";
        $no = 0;
        if (mysqli_num_rows($exe) > 0) {
            while ($row = mysqli_fetch_assoc($exe)) {
                $qry1 = "SELECT * FROM user_address WHERE user_id = '$row[id]'";
                $exe1 = mysqli_query($con, $qry1);
                $row1 = mysqli_fetch_array($exe1);
                
                $date = date("F j, Y, g:i a", strtotime($row['date_added']));
                $no++;
                if($row['status'] == '0'){
                    $status = '<span class="fw-bold status pending">&#9679; Pending</span>';
                    $actionBtn = "
                    <button class='btn btn-sm bg-9 text-white shadow-none fw-bold' id='approveUser' title='Approve' data-approve-id='$row[id]'><i class='bi bi-hand-thumbs-up'></i></button>
                    <button class='btn btn-sm bg-8 text-white shadow-none fw-bold' id='deleteUser' title='Delete' data-delete-id='$row[id]'><i class='bi bi-trash'></i></button>
                    ";
                }
                if($row['status'] == '1'){
                    $status = '<span class="fw-bold status active">&#9679; Active</span>';
                    $actionBtn = "
                    <button class='btn btn-sm bg-8 text-white shadow-none fw-bold' id='deleteUser' title='Delete' data-delete-id='$row[id]'><i class='bi bi-trash'></i></button>
                    ";
                }
                $output .= "
                    <tr>
                        <td class='bg-main-1 align-middle'>$no</td>
                        <td colspan='2' class='align-middle'>
                            <div class='d-flex align-items-center'>
                                <img src='$user_img_path/$row[img]' class='img-responsive rounded-circle border border-dark me-3' width='80px' height='80px'>
                                <div>
                                    <small class='fw-bold'>$row[email]</small><br>
                                    <small>$row[name]</small><br>
                                    <small>$date</small>
                                </div>
                            </div>
                        </td>
                        <td style='width: 40%' class='align-middle'>
                            <small class='fw-bold'>$row1[ph_no]</small><br>
                            <small>$row1[province]</small>,
                            <small>$row1[city]</small>,
                            <small>$row1[postal_code]</small><br>
                            <small>$row1[address]</small><br>
                        </td>
                        <td class='align-middle'>$status</td>
                        <td class='align-middle'>
                            $actionBtn
                        </td>
                    </tr>";
                }
                echo $output;
        } else {
            echo "<tr class='text-center'><td colspan='6'>No Data Exist</td></tr>";
        }
    }

    // ! approve user in db
    if(isset($_POST['key']) && $_POST['key'] == 'approve_user'){
        $id = $_POST['id'];
        $qry = "UPDATE users SET status = '1' WHERE id = '$id'";
        if(mysqli_query($con, $qry)){
            echo 'success';
        }else{
            echo 'error';
        }
    }

    // ! delete user from db
    if(isset($_POST['key']) && $_POST['key'] == 'delete_user'){
        $id = $_POST['id'];
        $select = "SELECT * FROM users WHERE id = '$id'";
        $run = mysqli_query($con, $select);
        $row = mysqli_fetch_array($run);
        $qry = "DELETE FROM users WHERE id = '$id'";
        if(mysqli_query($con, $qry)){
            unlink($del_user_img_absolute_path.'/'.$row['img']);
            echo 'success';
        }else{
            echo 'error';
        }
    }
?>