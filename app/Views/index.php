<!DOCTYPE html>
<html lang="en-US">
<head>
<title>Products - Stripe Payment Gateway Integration</title>
<meta charset="utf-8">

<!-- Stylesheet file -->
<link rel="stylesheet" href="<?php echo base_url('assets/css/style.css'); ?>">

</head>
<body>
<div class="container">
	<h1>Products - Stripe Payment Gateway Integration</h1>
	<!-- List all products -->
	<?php if(!empty($products)){ foreach($products as $row){ ?>
    <div class="pro-box">
		<div class="info">
			<h4><?php echo $row['name']; ?></h4>
			<h5>Price: <?php echo '$'.$row['price'].' '.$row['currency']; ?></h5>
		</div>
        <div class="action">
            <a href="<?php echo base_url('products/purchase/'.$row['id']); ?>">Purchase</a>
        </div>
    </div>
	<?php } }else{ ?>
    <p>Product(s) not found...</p>
	<?php } ?>
</div>
</body>
</html>