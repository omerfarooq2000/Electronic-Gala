<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include('inc/links.php') ?>
    <title>Contact Us - <?php echo $site_title .' - ' . $site_tagline; ?></title>
</head>
<body>
    <?php include('inc/header.php') ?>

    <div class="container">
        <h3 class="text-center mt-4 mb-5">Contact Us</h3>
        <div class="card rounded-0">
            <div class="row mb-2">
                <div class="col-lg-6 col-md-6 col-sm-12 p-4">
                    <iframe src="<?php echo $c_iframe ?>" width="100%" height="350" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                    <div class="my-4">
                        <h5 class="card-subtitle text-orange fw-bold mb-1">Address</h5>
                        <i class="bi bi-geo-alt-fill text-orange me-1"></i><?php echo $c_address ?>
                    </div>
                    <div class="mb-4">
                        <h5 class="card-subtitle text-orange fw-bold mb-1">Phone #</h5>
                        <i class="bi bi-telephone-fill text-orange me-1"></i><?php echo $c_ph ?>
                    </div>
                    <div class="mb-4">
                        <h5 class="card-subtitle text-orange fw-bold mb-1">Email</h5>
                        <i class="bi bi-envelope-fill text-orange me-1"></i><?php echo $c_email ?>
                    </div>
                    <div>
                        <h5 class="card-subtitle text-orange fw-bold mb-2">Follow Us</h5>
                        <i class="bi bi-facebook text-primary me-1 mb-1"></i><a href="<?php echo $c_fb ?>" class="text-decoration-none text-black" target="_blank">Facebook</a><br>
                        <i class="bi bi-instagram text-danger me-1 mb-1"></i><a href="<?php echo $c_insta ?>" class="text-decoration-none text-black" target="_blank">Instagram</a><br>
                        <i class="bi bi-twitter text-info me-1"></i><a href="<?php echo $c_tw ?>" class="text-decoration-none text-black" target="_blank">Twitter</a>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12 p-4">
                    <form id="send_message_form">
                        <div class="form-group mb-2">
                            <label class="mb-2">Name:</label>
                            <input type="text" name="name" class="form-control shadow-none" placeholder="Enter Name" required>
                        </div>
                        <div class="form-group mb-2">
                            <label class="mb-2">Subject:</label>
                            <input type="text" name="subject" class="form-control shadow-none" placeholder="Enter Subject" required>
                        </div>
                        <div class="form-group mb-2">
                            <label class="mb-2">Email:</label>
                            <input type="email" name="email" class="form-control shadow-none" placeholder="Enter Email" required>
                        </div>
                        <div class="form-group mb-2">
                            <label class="mb-2">Message:</label>
                            <textarea name="message" rows="3" class="form-control shadow-none" placeholder="Enter Message"></textarea>
                        </div>
                        <button type="submit" name="submit" id="send_message_btn" class="btn bg-orange shadow-none float-end rounded-0">Send Message <i class="ms-2 bi bi-send"></i></button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- footer area -->
    <footer>
        <?php include('inc/footer.php') ?>
        <script src="public/ajax/send_message.js"></script>
    </footer>
</body>
</html>