<?php

/**
 * Copyright (C) Vincy - All Rights Reserved
 * Unauthorized copying of this file, via any medium is strictly prohibited
 * Proprietary and confidential
 * Written by Vincy <vincy@phppot.com>
 */

namespace Phppot;

/**
 * This class contains the configuration options
 */
class Config
{

    const ADMIN_EMAIL = 'admin@gmail.com';

    const CURRENCY_CODE = 'COP';

    const DISPLAY_QUANTITY_INPUT = true;

    public static function getProduct()
    {
        $products = array(
            "productId" => 1,
            "name" => "Sistema de Gestión de Clientes en PHP y MySQL",
            "price" => 1500.00,
            "imageUrl" => 'images/producto.jpg'
        );

        return $products;
    }
}
