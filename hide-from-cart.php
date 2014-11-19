<? php



//
function select_categories_non_purchasable( $purchasable, $product){
	$array_categories = array('Names', 'of', 'all', 'the', htmlspecialchars('Sweet & Sour', ENT_QUOTES), 'non-purchasable', 'categories');

	$cats = $product->get_categories(',');
	$cats_array = explode(',' , $cats);
	for($i = 0; $i < count($cats_array); $i++){
		if(in_array(strip_tags($cats_array[$i]), $array_categories)){
			$purchasable = false;
		}
	}
	return $purchasable;
}

add_filter('woocommerce_is_purchasable', 'select_categories_non_purchasable', 10, 2);
//