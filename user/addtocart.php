<?php
session_start();

// unset($_SESSION['cart']);
$_SESSION['cart'] = $_SESSION['cart'] ?? [];




if(empty($_SESSION['auth'])){

	header('location:customerlogin.php');

}
else{

	$id=$_GET['id'];
	$count =  $_GET['product_count'] ?? 1;

	if(isset($_GET['increase']))
	{
		
		if(is_numeric($id) && isset($_GET['id']) && isset($count))
		{


			if(array_key_exists($id,$_SESSION['cart']))
			{
				// echo "it's adding count";
				$_SESSION['cart'][$id]['count']  = $_SESSION['cart'][$id]['count'] + $count;
			}
			else
			{
				$price = $_GET['price'];

				// echo "it's adding product";	
				$_SESSION['cart'][$id] =  [ 'product_id' => $id, 'count' => $count, 'price' => $price ];
			}

			if(!isset($_COOKIE['cart_count']))
			{
				setcookie('cart_count', '', time() + (86400 * 30), "/");
			}
	 

		}

	}
	elseif (isset($_GET['remove'])) 
	{
		unset($_SESSION['cart'][$id]);
	}
	else
	{
		if(array_key_exists($id,$_SESSION['cart']))
		{
			$_SESSION['cart'][$id]['count']  = $_SESSION['cart'][$id]['count'] - 1;
		}	

		if($_SESSION['cart'][$id]['count'] < 1)
		{

			unset($_SESSION['cart'][$id]);
		}
	}
	    $count = 0;
        $cart_items = $_SESSION['cart'];

        foreach($cart_items as $k => $a)
        {
        	if(isset($a['product_id']))
        	{
            	$count += $a['count'];
        	}else {
        		unset($_SESSION['cart'][$k]);
        	}


            
        }

        $count = ($count > 9 ) ? '9+' : $count;
   		$_COOKIE['cart_count']  = $count;






   		if(isset($_GET['page']) && $_GET['page'] == 'display')
   		{
   			 echo "<script>localStorage.setItem('cart_count', '".$count."'); location.href='display.php?id=".$id."'</script>";
   		}
   		else{
   			echo "<script>localStorage.setItem('cart_count', '".$count."'); location.href='cart.php'</script>";
   		}

	// echo "<pre>".var_dump($_SESSION['cart'])."</pre>";
}


?>