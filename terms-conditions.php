<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include('inc/links.php') ?>
    <title>Terms & Conditions - <?php echo $site_title .' - ' . $site_tagline; ?></title>
</head>
<body>
    <?php include('inc/header.php') ?>

    <div class="container">
        <h3 class="text-center my-4 text-orange fw-bold">Terms & Conditions</h3>
        <div class="card">
            <div class="card-body">
                <?php 
                    $select = "SELECT* FROM settings";
                    $run = mysqli_query($con, $select);
                    $row = mysqli_fetch_array($run);
                    echo <<<terms
                    $row[terms_condition]
                    terms;
                ?>
            </div>
        </div>
    </div>

    <!-- footer area -->
    <footer>
        <?php include('inc/footer.php') ?>
    </footer>
</body>
</html>