<?php
$product_ids = array();
if(isset($_POST['addtocart'])){

	if(isset($_SESSION['shopping_cart'])){
        $count = count($_SESSION['shopping_cart']);	
        $product_ids = array_column($_SESSION['shopping_cart'], 'id');

        if (!in_array(filter_input(INPUT_GET, 'id'), $product_ids)){
            $_SESSION['shopping_cart'][$count] = array
            (		
            'id' => filter_input(INPUT_GET, 'id'),
            'name' => filter_input(INPUT_POST, 'name'),
            'price' => filter_input(INPUT_POST, 'price'),
            'qty' => filter_input(INPUT_POST, 'qty'),
            'size' => filter_input(INPUT_POST, 'size'),
            'color' => filter_input(INPUT_POST, 'color'),
            'img' => filter_input(INPUT_POST, 'img'),
            );
            echo "<br><br><div style='margin: 20px' class='alert alert-success' role='alert'> Product Added to cart </div>";
        }else{
            echo "<br><br><div style='margin: 20px' class='alert alert-info' role='alert'>Product Already added to cart</div>";		
        }	
	}else{
        $_SESSION['shopping_cart'][0] = array
        (
        'id' => filter_input(INPUT_GET, 'id'),
        'name' => filter_input(INPUT_POST, 'name'),
        'price' => filter_input(INPUT_POST, 'price'),
        'qty' => filter_input(INPUT_POST, 'qty'),
        'size' => filter_input(INPUT_POST, 'size'),
        'color' => filter_input(INPUT_POST, 'color'),
        'img' => filter_input(INPUT_POST, 'img'),
        );
	}
}

if (filter_input(INPUT_GET, 'action') == 'delete'){
    foreach($_SESSION['shopping_cart'] as $key => $r){
        if ($r['id'] == filter_input(INPUT_GET, 'id')){
        unset($_SESSION['shopping_cart'][$key]);
        echo "<br><br><div style='margin: 20px' class='alert alert-warning' role='alert'>Product Removed from cart</div>";		
    }
}
    $_SESSION['shopping_cart'] = array_values($_SESSION['shopping_cart']);
}
?>