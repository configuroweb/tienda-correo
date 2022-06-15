<?php
/**
 * Copyright (C) Vincy - All Rights Reserved
 * Unauthorized copying of this file, via any medium is strictly prohibited
 * Proprietary and confidential
 * Written by Vincy <vincy@phppot.com>
 */
namespace Phppot;

require_once __DIR__ . '/../config/Config.php';

class CheckoutService
{

    private $dbConn;

    public function __construct()
    {
        require_once __DIR__ . '/../config/DataSource.php';
        $this->dbConn = new DataSource();
    }

    function insertOrder($orderId, $name, $email, $currency, $amount)
    {
        $query = "INSERT INTO tbl_order (order_id, name, email, currency, amount) VALUES (?, ?, ?, ?, ?)";
        $paramType = "ssssd";
        $paramValue = array(
            $orderId,
            $name,
            $email,
            $currency,
            $amount
        );

        $insertId = $this->dbConn->insert($query, $paramType, $paramValue);
        return $insertId;
    }

    function insertOrderItems($orderId, $name, $quantity, $item_price)
    {
        $query = "INSERT INTO tbl_order_items (order_id, name, quantity, item_price) VALUES (?, ?, ?, ?)";
        $paramType = "ssid";
        $paramValue = array(
            $orderId,
            $name,
            $quantity,
            $item_price
        );

        $insertId = $this->dbConn->insert($query, $paramType, $paramValue);
        return $insertId;
    }

    function getOrder($orderId)
    {
        $query = "SELECT * FROM tbl_order WHERE order_id='" . $orderId . "'";
        $orderResult = $this->dbConn->select($query);
        return $orderResult;
    }

    function getOrderItems($orderId)
    {
        $query = "SELECT * FROM tbl_order_items WHERE order_id='" . $orderId . "'";
        $orderItemResult = $this->dbConn->select($query);
        return $orderItemResult;
    }

    function getToken()
    {
        $token = "";
        $codeAlphabet = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
        $codeAlphabet .= "abcdefghijklmnopqrstuvwxyz";
        $codeAlphabet .= "0123456789";
        $max = strlen($codeAlphabet) - 1;
        for ($i = 0; $i < 10; $i ++) {
            $token .= $codeAlphabet[mt_rand(0, $max)];
        }
        return $token;
    }
}
?>