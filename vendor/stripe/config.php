<?php
require('stripe-php-master/init.php');

$publishAbleKey = "pk_test_51MpUWhGXZkxnRxKw40ilQtDRCiVP2jkY1zSDpseuT0vkV7E0pJk4KP737fUwnawaM1bPWUZqdUJWu4nvfZJ0Ow6400C2mT5PNX";

$privateKey = "sk_test_51MpUWhGXZkxnRxKwgwIdshXftswzaac5vb9k4XBwlcEZjxE9FDrZbinLOmF8tE8nyVsIeFeMD2cQJUYRmg0Yn6qB00XbQ5kJ6a";

\Stripe\Stripe::setApiKey($privateKey);