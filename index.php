<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include('inc/links.php') ?>
    <?php include('functions/functions.php') ?>
    <title>Home | <?php echo $site_title .' - ' . $site_tagline; ?></title>
</head>
<body>
    <!-- header area -->
    <header>
        <?php include('inc/header.php') ?>
    </header>

    <!-- main content area -->
    <main>
        <!-- Carousel -->
        <div id="mainCarousel" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                <?php slider_images() ?>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#mainCarousel" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#mainCarousel" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>

        <!-- products -->
        <div class="container-fluid">
            <h3 class="text-center my-4 text-orange fw-bold">Latest Products</h3>
            <div class="row">
                <?php get_index_page_products() ?>
            </div>

            <div class="d-flex justify-content-center">
                <a href="shop.php" class="btn bg-orange rounded-0">Explore More Products >>></a>
            </div>
        </div>
    </main>

    <!-- footer area -->
    <footer>
        <?php include('inc/footer.php') ?>
    </footer>
</body>
</html>