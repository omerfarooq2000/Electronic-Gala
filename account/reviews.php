
<div class="card rounded-0">
    <div class="card-body">
        <h4 class="">My Reviews</h4>
        <div class="table-responsive-md" style="height: 450px; overflow-y: scroll;">
            <table class="table table-hover border table-sm">
                <thead class="sticky-top">
                    <tr class="bg-orange text-light">
                        <th>Date</th>
                        <th width='30%'>Product</th>
                        <th width='40%'>Review</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                        $img1 = '';
                        $img2 = '';
                        $img3 = '';
                        $rating = '';
                        $review_path = REVIEWS_IMG_PATH;
                        $select = "SELECT * FROM reviews WHERE user_id = '$u_id'";
                        $run = mysqli_query($con, $select);
                        if(mysqli_num_rows($run) > 0){
                            while($row = mysqli_fetch_array($run)){
                                $date = date("F j, Y", strtotime($row['date']));
                                $time = date("g:i a", strtotime($row['date']));

                                $product = "SELECT * FROM products WHERE id = '$row[product_id]'";
                                $exe = mysqli_query($con, $product);
                                $row_product = mysqli_fetch_array($exe);
                                
                                if($row['img_one'] != ''){
                                    $img1 = "<div style='width: 40px; height: 40px; position: relative' class='me-1'><img src='$review_path/$row[img_one]' class='img-responsive' style='position: absolute; width: 100%; height: 100%'></div>";
                                }
                                if($row['img_two'] != ''){
                                    $img2 = "<div style='width: 40px; height: 40px; position: relative' class='me-1'><img src='$review_path/$row[img_two]' class='img-responsive' style='position: absolute; width: 100%; height: 100%'></div>";
                                }
                                if($row['img_three'] != ''){
                                    $img3 = "<div style='width: 40px; height: 40px; position: relative' class='me-1'><img src='$review_path/$row[img_three]' class='img-responsive' style='position: absolute; width: 100%; height: 100%'></div>";
                                }

                                if($row['rating'] == 1){
                                    $rating = '
                                        <i class="bi bi-star-fill text-warning"></i>
                                        <i class="bi bi-star text-warning"></i>
                                        <i class="bi bi-star text-warning"></i>
                                        <i class="bi bi-star text-warning"></i>
                                        <i class="bi bi-star text-warning"></i>
                                    ';
                                }
                                if($row['rating'] == 2){
                                    $rating = '
                                        <i class="bi bi-star-fill text-warning"></i>
                                        <i class="bi bi-star-fill text-warning"></i>
                                        <i class="bi bi-star text-warning"></i>
                                        <i class="bi bi-star text-warning"></i>
                                        <i class="bi bi-star text-warning"></i>
                                    ';
                                }
                                if($row['rating'] == 3){
                                    $rating = '
                                        <i class="bi bi-star-fill text-warning"></i>
                                        <i class="bi bi-star-fill text-warning"></i>
                                        <i class="bi bi-star-fill text-warning"></i>
                                        <i class="bi bi-star text-warning"></i>
                                        <i class="bi bi-star text-warning"></i>
                                    ';
                                }
                                if($row['rating'] == 4){
                                    $rating = '
                                        <i class="bi bi-star-fill text-warning"></i>
                                        <i class="bi bi-star-fill text-warning"></i>
                                        <i class="bi bi-star-fill text-warning"></i>
                                        <i class="bi bi-star-fill text-warning"></i>
                                        <i class="bi bi-star text-warning"></i>
                                    ';
                                }
                                if($row['rating'] == 5){
                                    $rating = '
                                        <i class="bi bi-star-fill text-warning"></i>
                                        <i class="bi bi-star-fill text-warning"></i>
                                        <i class="bi bi-star-fill text-warning"></i>
                                        <i class="bi bi-star-fill text-warning"></i>
                                        <i class="bi bi-star-fill text-warning"></i>
                                    ';
                                }

                                echo <<<review
                                <tr>
                                    <td><small>$date<br>$time</small></td>
                                    <td>
                                        <p class='m-0 p-0' style="width: 100%; white-space: nowrap; overflow: hidden; text-overflow: ellipsis;">$row_product[name]</p>
                                    </td>
                                    <td>
                                        <p class='m-0 p-0' style="width: 100%; white-space: nowrap; overflow: hidden; text-overflow: ellipsis;">$row[feedback]</p>
                                        $rating
                                        <div class='d-flex'>
                                            $img1
                                            $img2
                                            $img3
                                        </div>
                                    </td>
                                </tr>
                                review;
                            }
                        }else{
                            echo <<<review
                            <tr colspan='3' class='text-center'>
                                <td>No Data Exist</td>
                            </tr>
                            review;
                        }
                    ?>
                    
                </tbody>
            </table>
        </div>
    </div>
</div>