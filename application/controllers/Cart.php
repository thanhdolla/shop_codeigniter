<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Cart extends MY_Controller {

//
    function __construct() {
        parent::__construct();
        $this->load->library('cart'); // thư viện giỏ hàng
//         $data =array();
    }

    function add() {
        //lay ra san pham muon them vao gio hang
        $this->load->model('sanpham_model');
        $id = $this->uri->rsegment(3);
        $sanpham = $this->sanpham_model->get_info($id);
////        print_r($sanpham);
        if (!$sanpham) {
            redirect();
        }
////        tong so san pham trong gio hang
        $qty = 1;
        $price = $sanpham->gia_sp;
        if ($sanpham->khuyen_mai > 0) {
            $price = $sanpham->gia_sp - $sanpham->khuyen_mai;
        }
////        thong tin them vao gio hang
        //thu viên cart bắt buộc phải có trường id, name,qty,price , nếu k đủ thì lỗi
        $data = array();
        $data['id'] = $sanpham->san_phamID;
        $data['qty'] = $qty;
        $data['name'] = url_title($sanpham->ten_sp);
        $data['anh_sp'] = $sanpham->anh_sp;
        $data['price'] = $price;

        $this->cart->insert($data);
        redirect(base_url('cart'));
//
    }

    function index() {
        $giohang = $this->cart->contents();
        $total_items = $this->cart->total_items();
//        
        $this->data['giohang'] = $giohang;
        $this->data['total_items'] = $total_items;
        $this->data['temp'] = 'site/cart/index';
        $this->load->view('site/layout', $this->data);
    }
    
    function update(){
        $giohang = $this->cart->contents();//lấy nội dung cart
        foreach ($giohang as $key=>$row){
            $tong_sp= $this->input->post('qty_'.$row['id']);
            $data=array();
            $data['rowid']=$key;
            $data['qty']=$tong_sp;
            $this->cart->update($data);
        }
        redirect(base_url('cart'));
    }
    function delete(){
        $id= $this->uri->rsegment(3);
        $id= intval($id);//ep kieu nguyen
        
        //khi xoa 1 sp
        if($id>0){
            $giohang=$this->cart->contents();
            foreach ($giohang as $key=>$row){
                if($row['id']==$id){
                    $data= array();
                    $data['rowid']=$key;
                    $data['qty']= 0;
                    $this->cart->update($data);
                }
            }
                    
        }else{
            //xoa toàn bô
            $this->cart->destroy();
        }
        redirect(base_url('cart'));
    }

}
