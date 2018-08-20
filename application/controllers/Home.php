<?php

class Home extends MY_Controller{
    function index(){
        
        $this->load->model('sanpham_model');
        $input=array();
        $input['where']=array('stt_sp'=>0);
        $sanpham= $this->sanpham_model->get_list($input);
        $this->data['sanpham']=$sanpham;
        //in mess
        $mes = $this->session->flashdata('mes');
        $this->data['mes'] = $mes;
        
//        $data= array();
        $this->data['temp']='site/home/index';
        $this->load->view('site/layout',$this->data);
    }
}
