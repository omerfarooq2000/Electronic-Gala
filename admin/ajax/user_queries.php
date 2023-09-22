<?php 
    include("../config/config.php");
    include("../config/essentials.php");

    // ! load and show user queries from db
    if(isset($_POST['key']) && $_POST['key'] == 'load_user_queries'){
        $qry = "SELECT * FROM user_queries ORDER BY id DESC";
        $exe = mysqli_query($con, $qry);
        $output = "";
        $status = "";
        $mark_as_read = "";
        $no = 0;
        if (mysqli_num_rows($exe) > 0) {
            while ($row = mysqli_fetch_assoc($exe)) {
                $no++;
                $date = date("F j, Y, g:i a", strtotime($row['date']));
                if($row['status'] == 0){
                    $status = "<span class='text-danger fw-bold'>Unread</span>";
                    $mark_as_read = "<button class='btn btn-sm btn-success text-white shadow-none fw-bold' id='markAsRead' title='Mark As Read' data-read-id='$row[id]'><i class='bi bi-hand-thumbs-up'></i></button>";
                }else{
                    $status = '<span class="text-success fw-bold">Read</span>';
                    $mark_as_read = '';
                }
                $output .= "
                <tr>
                    <td class='bg-main-1 align-middle'>$no</td>
                    <td>$date</td>
                    <td>
                        <span class='badge bg-dark me-1'>Name:</span> $row[name]<br>
                        <span class='badge bg-dark me-1'>Email:</span> $row[email]<br>
                        <span class='badge bg-dark me-1'>Subject:</span> $row[subject]<br>
                        <p style='white-space: nowrap; width: 250px; overflow: hidden; text-overflow: ellipsis;'><span class='badge bg-dark me-1'>Message:</span> $row[message]</p>
                    </td>
                    <td>$status</td>
                    <td>
                        <button type='button' class='btn btn-sm bg-14 text-white shadow-none fw-bold' title='View' data-bs-toggle='modal' data-bs-target='#viewUserQueries' id='viewQueries' data-view-id='$row[id]'><i class='bi bi-eye'></i></button>
                        $mark_as_read
                        <button class='btn btn-sm bg-8 text-white shadow-none fw-bold' id='deleteQueries' title='Delete' data-delete-id='$row[id]'><i class='bi bi-trash'></i></button>
                    </td>
                </tr>";
                }
                echo $output;
        } else {
            echo "<tr class='text-center'><td colspan='5'>No Data Exist</td></tr>";
        }
    }

    // ! delete user queries
    if(isset($_POST['key']) && $_POST['key'] == 'delete_user_queries'){
        $id = $_POST['id'];
        $qry = "DELETE FROM user_queries WHERE id = '$id'";
        if(mysqli_query($con, $qry)){
            echo 'success';
        }else{
            echo 'error';
        }
    }

    // ! mark user queries as read
    if(isset($_POST['key']) && $_POST['key'] == 'mark_user_queries'){
        $id = $_POST['id'];
        $qry = "UPDATE user_queries SET status = '1' WHERE id = '$id'";
        if(mysqli_query($con, $qry)){
            echo 'success';
        }else{
            echo 'error';
        }
    }

    // ! view user queries in popup modal
    if(isset($_POST['key']) && $_POST['key'] == 'view_user_queries'){
        $id = $_POST['id'];
        $output = "";
        $qry = "SELECT * FROM user_queries WHERE id = '$id'";
        $exe = mysqli_query($con, $qry);
        if ($exe) {
            while ($row = mysqli_fetch_assoc($exe)) {
                $output .= "
                    <div class='form-group mb-2'>
                        <label class='mb-2'>Name:</label>
                        <input type='text' value='$row[name]' class='form-control shadow-none' disabled>
                    </div>
                    <div class='form-group mb-2'>
                        <label class='mb-2'>Email:</label>
                        <input type='text' value='$row[email]' class='form-control shadow-none' disabled>
                    </div>
                    <div class='form-group mb-2'>
                        <label class='mb-2'>Subject:</label>
                        <input type='text' value='$row[subject]' class='form-control shadow-none' disabled>
                    </div>
                    <div class='form-group mb-2'>
                        <label class='mb-2'>Message:</label>
                        <textarea class='form-control shadow-none' disabled>$row[message]</textarea>
                    </div>
                ";
                }
                echo $output;
        } else {
            echo " <div class='alert alert-danger'>Something went wrong</div>";
        }
    }
?>
