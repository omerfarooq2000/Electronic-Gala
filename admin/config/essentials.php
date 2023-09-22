<?php
// ! frontend purpose data
define('SITE_URL', 'http://127.0.0.1/electronic-gala/');
define('USERS_IMG_PATH', SITE_URL . 'public/img/users');
define('ADMINS_IMG_PATH', SITE_URL . 'public/img/admins');
define('PRODUCTS_IMG_PATH', SITE_URL . 'public/img/products');
define('BRANDS_IMG_PATH', SITE_URL . 'public/img/brands');
define('CATEGORIES_IMG_PATH', SITE_URL . 'public/img/categories');
define('REVIEWS_IMG_PATH', SITE_URL . 'public/img/reviews');
define('FAVICON_IMG_PATH', SITE_URL . 'public/img/favicon');
define('CAROUSAL_IMG_PATH', SITE_URL . 'public/img/carousal');

// ! Backend load process needs this data
define('UPLOAD_IMAGE_PATH', $_SERVER["DOCUMENT_ROOT"] . '/electronic-gala/public/img/');
define('USERS_FOLDER', 'users/');
define('ADMINS_FOLDER', 'admins/');
define('PRODUCTS_FOLDER', 'products/');
define('BRANDS_FOLDER', 'brands/');
define('CATEGORIES_FOLDER', 'categories/');
define('REVIEWS_FOLDER', 'reviews/');
define('FAVICON_FOLDER', 'favicon/');
define('CAROUSAL_FOLDER', 'carousal/');

// ! absolute path for deleting images
define('ADMINS_IMG_ABSOLUTE_PATH', $_SERVER['DOCUMENT_ROOT']. '/electronic-gala/public/img/admins/');
define('USERS_IMG_ABSOLUTE_PATH', $_SERVER['DOCUMENT_ROOT']. '/electronic-gala/public/img/users/');
define('BRAND_IMG_ABSOLUTE_PATH', $_SERVER['DOCUMENT_ROOT']. '/electronic-gala/public/img/brands/');
define('CATEGORY_IMG_ABSOLUTE_PATH', $_SERVER['DOCUMENT_ROOT']. '/electronic-gala/public/img/categories/');
define('PRODUCTS_IMG_ABSOLUTE_PATH', $_SERVER['DOCUMENT_ROOT']. '/electronic-gala/public/img/products/');
define('CAROUSAL_IMG_ABSOLUTE_PATH', $_SERVER['DOCUMENT_ROOT']. '/electronic-gala/public/img/carousal/');