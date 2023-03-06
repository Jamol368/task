<?php

require __DIR__ . '/vendor/autoload.php';

use App\Controller\SiteController;

$app = new SiteController();

session_start();

$time = 3600;
if (isset($_POST) && isset($_SESSION['time']) && (time() - $_SESSION['time']) > $time) {

    header('location: http://localhost:8000/login.php');
    exit();
} else {
    $_SESSION['time'] = time();
    $_SESSION['username'] = time();
}

$request = $_GET['url'];

header("Content-Type:application/json");
switch ($request) {
    case '/' :
        $app->index();
        break;
    case '/sku/update' :
        $app->skuUpdate($_GET['prefix'], $_GET['sku_index'], $_GET['suffix']);
        break;
    case '/product/create' :
        $app->productCreate($_GET['name']);
        break;
    case '/product/update' :
        $app->productUpdate($_GET['id'], $_GET['name']);
        break;
    case '/product/delete' :
        $app->productDelete($_GET['id']);
        break;
    default:
        echo json_encode(['error' => 404]);
        break;
}

?>
