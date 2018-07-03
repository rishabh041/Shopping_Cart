<?php

class Products extends CI_Controller{
  public function index()
  {
    //get all Products by using models
    $data['products'] = $this->Product_Model->get_products();

    //Load View
    $data['main_content']='products';//assigning a view
    $this->load->view('layouts/main', $data);//passing the data array
  }
  public function details($id){
    //get product details
    $data['product']=$this->Product_Model->get_product_details($id);

    //load view
    $data['main_content']='details';
    $this->load->view('layouts/main', $data);
  }
  public function category($category_id)
  {
    $data['products']=$this->Product_Model->get_category($category_id);
    $data['main_content']='category';//assigning a view
    $this->load->view('layouts/main',$data);
  }
}
