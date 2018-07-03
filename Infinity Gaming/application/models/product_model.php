<?php
class Product_Model extends CI_Model{
  //Get all Products
  public function get_products()
  {
    $this->db->select('*');
    $this->db->from('products');
    $query=$this->db->get();
    return $query->result();
  }
  //get single product
  public function get_product_details($id)
  {
    $this->db->select('*');
    $this->db->from('products');
    $this->db->where('id',$id);

    $query=$this->db->get();
    return $query->row();
  }
  public function get_categories(){
    $this->db->select('*');
    $this->db->from('categories');
    $query=$this->db->get();
    return $query->result();
  }
  public function get_popular(){
    $result=$this->db->query("SELECT * FROM `products` WHERE `id` IN(SELECT `product_id` FROM `order_product` GROUP BY product_id ORDER BY sum(`quantity`) DESC) LIMIT 5");
    return $result->result();
  }
  public function get_category($category_id)
  {
    $this->db->select('*');
    $this->db->from('products');
    $this->db->where('category_id',$category_id);
    $query=$this->db->get();
    return $query->result();
  }
}
 ?>
