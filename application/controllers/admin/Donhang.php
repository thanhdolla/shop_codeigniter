<?php

class Donhang extends MY_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('donhang_model');
    }

    function index() {
//        $input0 = array();
//        $input0['where'] = array('stt_sp' => 0);
//tong sp
        $total_rows = $this->donhang_model->get_total();
        $this->data['total_rows'] = $total_rows;
        $this->load->library('pagination');

        $config = array();
        $config['total_rows'] = $total_rows;
        $config['base_url'] = admin_url('donhang/index');
        $config['per_page'] = 14; //14 sp 1 trang
        $config['uri_segment'] = 4; //phan doan hien thi so trang
        $config['next_link'] = 'Trang sau';
        $config['prev_link'] = 'Trang trước';
        $this->pagination->initialize($config); // khoi tao cau hinh phan trang       
        $segment = $this->uri->segment(4);
        $segment = intval($segment);
        $input['limit'] = array($config['per_page'], $segment);

        //tim sp theo id
        $id = $this->input->get('ID');
        $id = intval($id);
        // hien thi ra sp co stt_sp =0
        $input['where'] = array();
        if ($id > 0) {
            $input['where']['don_hangID'] = $id;
        }
        //tim khách hang
        $ten = $this->input->get('ten');
        if ($ten) {
            $input['like'] = array('ten', $ten);// trong bảng này tên khách hàng là ten
        }

        $mes = $this->session->flashdata('mes');
        $this->data['mes'] = $mes;
        $list = $this->donhang_model->get_list($input);
        $this->data['list'] = $list;
        $this->data['temp'] = 'admin/donhang/index';
        $this->load->view('admin/layout', $this->data);
    }

    
    function xuli() {
        //quy định stt =0  là đơn hàng chưa xử lí
        // stt=1 là đã xử lí
        $id = $this->uri->rsegment(3);
        $id = intval($id);

        $data['stt_don_hang'] = '1';
        
         $this->db->query("UPDATE don_hang_chi_tiet
INNER JOIN don_hang ON don_hang_chi_tiet.don_hangID = don_hang.don_hangID
SET don_hang_chi_tiet.stt_don_hang_chi_tiet = 1
WHERE don_hang.don_hangID = '$id'");
        
        $this->donhang_model->update($id, $data);
        
        
        $this->session->set_flashdata('mes', 'Xử lí thành công');
        redirect(admin_url('donhang'));
}
    function delete() {
        $id = $this->uri->rsegment(3);
        $id = intval($id);
        
        
               $this->db->where("don_hangID","$id");
               $this->db->delete("don_hang");
               
               $this->db->where("don_hangID","$id");
               $this->db->delete("don_hang_chi_tiet");
               
//      $data['stt_don_hang']=1;
        
//        $this->donhang_model->delete($id, $data);
        
//       $this->load->model('donhangchitiet_model');
//       $data2['don_hangID']=array($id);
//       $query= $this->donhangchitiet_model->delete($data2);
        
//        echo $query;
//        $this->session->set_flashdata('mes', 'Xóa thành công');
        redirect(admin_url('donhang'));
    }

}
