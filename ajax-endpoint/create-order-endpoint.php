<?php
/**
 * Copyright (C) Vincy - All Rights Reserved
 * Unauthorized copying of this file, via any medium is strictly prohibited
 * Proprietary and confidential
 * Written by Vincy <vincy@phppot.com>
 */
use Phppot\CheckoutService;
use Phppot\Config;
use Phppot\MailService;
require_once __DIR__ . '/../lib/CheckoutService.php';
require_once __DIR__ . '/../config/Config.php';
require_once __DIR__ . '/../lib/MailService.php';
$configModel = new Config();
$configResult = $configModel->getProduct();
$checkoutService = new CheckoutService();
$mailService = new MailService();
$orderId = $checkoutService->getToken();
$productQuantity = 1;
if (! empty($_POST["productQuantity"])) {
    $productQuantity = $_POST["productQuantity"];
}
$checkoutService->insertOrder($orderId, $_POST["userName"], $_POST["userEmail"], Config::CURRENCY_CODE, $configResult["price"]);

$checkoutService->insertOrderItems($orderId, $configResult["name"], $productQuantity, $configResult["price"]);

$orderResult = $checkoutService->getOrder($orderId);
$orderItemResult = $checkoutService->getOrderItems($orderId);
$recipientArr = array(
    'email' => $orderResult[0]["email"]
);
$mailService->sendUserEmail($orderResult, $recipientArr);
$mailService->sendAdminEmail($orderItemResult, $orderResult);

?>
