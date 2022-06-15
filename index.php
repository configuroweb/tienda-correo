<?php

use Phppot\Config;

require_once __DIR__ . '/config/Config.php';
$configModel = new Config();
$configResult = $configModel->getProduct();
?>
<HTML>

<HEAD>
	<TITLE>Tienda Correo ConfiguroWeb</TITLE>
	<link href="assets/css/style.css" type="text/css" rel="stylesheet" />
	<link rel="icon" type="image/png" sizes="16x16" href="./images/favicon.png">
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
</HEAD>

<BODY>
	<div class="txt-heading">Tienda Correo ConfiguroWeb</div>
	<div id="product-grid">
		<div class="product-item">
			<div>
				<img src="<?php echo $configResult["imageUrl"]; ?>">
			</div>
			<div class="product-tile-footer">
				<div class="product-title"><a href="https://www.configuroweb.com/sistema-de-gestion-de-clientes-en-php-y-mysql/" target="_blank"><?php echo $configResult["name"]; ?></a></div>
				<div class="product-price"><?php echo "$ " .  number_format($configResult["price"], 2); ?></div>
				<?php if (Config::DISPLAY_QUANTITY_INPUT == true) { ?><div class="quantity">
						<input type="text" class="product-quantity" id="productQuantity" name="quantity" value="1" size="2" />
					</div><?php } ?>
				<div>
					<button name="data" id="btn" onClick="buynow();" class="btnAddAction">Comprar Aplicación</button>
				</div>
			</div>
		</div>
	</div>
	<div id="customer-detail">
		<div class="txt-heading">Información de Cliente</div>
		<div class="product-item">
			<form method="post" action="" id="checkout-form">
				<div class="row">
					<div class="form-label">
						Nombre: <span class="required error" id="first-name-info"></span>
					</div>
					<input class="input-box" type="text" name="first-name" id="first-name">
				</div>
				<div class="row">
					<div class="form-label">
						Correo Electrónico: <span class="required error" id="email-info"></span>
					</div>
					<input class="input-box" type="text" name="email" id="email">
				</div>
				<div class="row">
					<div id="inline-block">
						<img id="loader" src="images/spinner.svg" /> <input type="button" class="checkout" name="checkout" id="checkout-btn" value="Enviar" onClick="Checkout();">
					</div>
				</div>
			</form>
		</div>
	</div>
	<div id="mail-status"></div>
	<script src="assets/js/shop.js"></script>
</BODY>
<footer>
	<h1>Para más desarrollos accede a <a href="https://www.configuroweb.com/46-aplicaciones-gratuitas-en-php-python-y-javascript/#Aplicaciones-gratuitas-en-PHP,-Python-y-Javascript" ; target="_blank" style="text-decoration:none" ;>ConfiguroWeb</h1>
</footer>

</HTML>