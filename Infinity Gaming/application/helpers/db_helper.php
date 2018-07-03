<?php
//get Categories
function get_categories_h(){
  //we are not using controller so firstly we need to get instance
  $CI =get_instance();
  $CI->load->model('Product_Model', '', TRUE);
  $categories=$CI->Product_Model->get_categories();
  return $categories;

}
function get_popular_h(){
		$CI = get_instance();
		//$CI->load->model('product_model');
		$popular_products=$CI->Product_Model->get_popular();
		return $popular_products;
	}
