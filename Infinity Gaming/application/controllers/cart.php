<?php
class Cart extends CI_Controller{
  //for transferring data to paypal finally
  public $paypal_data = '';
  public $tax;
  public $shipping;
  public $total=0;
  public $grand_total;

  public function index()
  {
    $data['main_content']='cart';
    $this->load->view('layouts/main',$data);
  }
  public function add1()
  {
    $var=$this->input->post('c_id');
    $data=array(
      'id' =>$this->input->post('item_number'),
			'qty' =>$this->input->post('qty'),
			'price' =>$this->input->post('price'),
			'name' =>$this->input->post('title')
    );
    //print_r($data);die();
    $this->cart->insert($data);
    //header('Location: '.$_SERVER['PHP_SELF']);
    //die;
    redirect('products/category/'.$var );
  }
  public function add()
  {
    $data=array(
      'id' =>$this->input->post('item_number'),
			'qty' =>$this->input->post('qty'),
			'price' =>$this->input->post('price'),
			'name' =>$this->input->post('title')
    );
    //print_r($data);die();
    $this->cart->insert($data);
    redirect('products');
  }
  public function update($in_cart=null)//so that if we update from main page it doesn't go to cart
  //but if we update from sidebar cart then it goes to cart
  {
    //here we dont need to filter the fields as the data added is only updated
    //therefore it will be stored aready in id,qty,price and name fields unlike in add function
    $data=$_POST;
    $this->cart->update($data);
    redirect('products','refresh');
  }

}
 ?>
