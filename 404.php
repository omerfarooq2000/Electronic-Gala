<!DOCTYPE html>
<html lang="en">
<head>
    <title>404 Not Found | Electronic Gala</title>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include('inc/links.php') ?>
</head>
<body>
    <!-- header area -->
    <header>
        <?php include('inc/header.php') ?>
    </header>

    <!-- main content area -->
    <main class="container-fluid d-flex justify-content-center align-items-center" style="height: 65vh">
        <div class="page-not-found text-center">
            <h1 class="text-orange fw-bold m-0">Oops!<i class="bi bi-emoji-frown ms-2"></i></h1>
            <h3 class="fw-bold text-uppercase">404, page not found</h3>
            <h3 class="text-capitalize">the page you are looking for doesn't exist.</h3>
            <a href="index.php" class="btn bg-orange shadow-none rounded-0 mt-3">Return To Home</a>
        </div>
    </main>

    <!-- footer area -->
    <footer>
        <?php include('inc/footer.php') ?>
        <!-- Ajax -->
        <script src="public/ajax/account.js"></script>
    </footer>
</body>
</html>

