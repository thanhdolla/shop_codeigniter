<?php

class Nhaphang extends MY_Controller{
    function __construct() {
        parent::__construct();
        $this->load->model('nhaphang_model');
    }
        function index() {
        $total_rows = $this->nhaphang_model->get_total();
        $this->data['total_rows'] = $total_rows;
        //load ra thu vien phan trang
        $this->load->library('pagination');
        $config = array();
        $config['total_rows'] = $total_rows; //tong tat ca cac bài viết tren website
        $config['base_url'] = admin_url('news/index'); //link hien thi ra danh sach bài viết
        $config['per_page'] = 14; //so luong bài viết hien thi tren 1 trang
        $config['uri_segment'] = 4; //phan doan hien thi ra so trang tren url
        $config['next_link'] = 'Trang sau';
        $config['prev_link'] = 'Trang trước';
        //khoi tao cac cau hinh phan trang
        $this->pagination->initialize($config);

        $segment = $this->uri->segment(4);
        $segment = intval($segment);

        $input = array();
        $input['limit'] = array($config['per_page'], $segment);

        //kiem tra co thuc hien loc du lieu hay khong
        $id = $this->input->get('id');
        $id = intval($id);
        $input['where'] = array();

        if ($id > 0) {
            $input['where']['nhap_hangID'] = $id;
        }
        $title = $this->input->get('title');
        if ($title) {
            $input['like'] = array('ten_sp', $title);
        }

        //lay danh sach bai viet
        $list = $this->nhaphang_model->get_list($input);
        $this->data['list'] = $list;

        //lay nội dung của biến message
        $message = $this->session->flashdata('message');
        $this->data['message'] = $message;

        //load view
        $this->data['temp'] = 'admin/nhaphang/index';
        $this->load->view('admin/layout', $this->data);
    }

    /*
     * Them bai viet moi
     */

    function add() {
        //load thư viện validate dữ liệu
        $this->load->library('form_validation');
        $this->load->helper('form');
        //neu ma co du lieu post len thi kiem tra
        if ($this->input->post()) {
            $this->form_validation->set_rules('ten_sp', 'tên sản phẩm', 'required|min_length[3]');
            $this->form_validation->set_rules('so_luong', 'số lượng', 'required');
            $this->form_validation->set_rules('gia', 'giá', 'required|min_length[1]');
            $this->form_validation->set_rules('nha_cung_cap', 'nhà cung cấp', 'required|min_length[1]');
            $this->form_validation->set_rules('sdt_ncc', 'số điện thoại', 'required');
            $this->form_validation->set_rules('bao_hanh', 'bảo hành', 'required|min_length[3]');
            
            $this->form_validation->set_rules('thoi_gian', 'thời gian', 'required|min_length[8]');

            //nhập liệu chính xác
            if ($this->form_validation->run()) {

                //lay ten file anh minh hoa duoc update len
               
                //luu du lieu can them
                $data = array(
                    'ten_sp' => $this->input->post('ten_sp'),
                    'so_luong' => $this->input->post('so_luong'),
                    'gia' => $this->input->post('gia'),
                    'nha_cung_cap' => $this->input->post('nha_cung_cap'),
                    'sdt_ncc' => $this->input->post('sdt_ncc'),
                    'bao_hanh' => $this->input->post('bao_hanh'),
                    'thoi_gian' => $this->input->post('thoi_gian'),
                );
                //them moi vao csdl
                if ($this->nhaphang_model->create($data)) {
                    //tạo ra nội dung thông báo
                    $this->session->set_flashdata('message', 'Thêm mới dữ liệu thành công');
                } else {
                    $this->session->set_flashdata('message', 'Không thêm được');
                }
                //chuyen tới trang danh sách
                redirect(admin_url('nhaphang'));
            }
        }


        //load view
        $this->data['temp'] = 'admin/nhaphang/add';
        $this->load->view('admin/layout', $this->data);
    }


    function edit()
    {
        $id = $this->uri->rsegment('3');
        $info = $this->nhaphang_model->get_info($id);
        if(!$info)
        {
            //tạo ra nội dung thông báo
            $this->session->set_flashdata('message', 'Không tồn tại bài viết này');
            redirect(admin_url('nhaphang'));
        }
        $this->data['info'] = $info;
       
       
        //load thư viện validate dữ liệu
        $this->load->library('form_validation');
        $this->load->helper('form');
        
        //neu ma co du lieu post len thi kiem tra
        if ($this->input->post()) {
            $this->form_validation->set_rules('ten_sp', 'tên sản phẩm', 'required|min_length[3]');
            $this->form_validation->set_rules('so_luong', 'số lượng', 'required');
            $this->form_validation->set_rules('gia', 'giá', 'required|min_length[1]');
            $this->form_validation->set_rules('nha_cung_cap', 'nhà cung cấp', 'required|min_length[1]');
            $this->form_validation->set_rules('sdt_ncc', 'số điện thoại', 'required');
            $this->form_validation->set_rules('bao_hanh', 'bảo hành', 'required|min_length[3]');
            
            $this->form_validation->set_rules('thoi_gian', 'thời gian', 'required|min_length[8]');

            //nhập liệu chính xác
            if ($this->form_validation->run()) {

                //lay ten file anh minh hoa duoc update len
               
                //luu du lieu can them
                $data = array(
                    'ten_sp' => $this->input->post('ten_sp'),
                    'so_luong' => $this->input->post('so_luong'),
                    'gia' => $this->input->post('gia'),
                    'nha_cung_cap' => $this->input->post('nha_cung_cap'),
                    'sdt_ncc' => $this->input->post('sdt_ncc'),
                    'bao_hanh' => $this->input->post('bao_hanh'),
                    'thoi_gian' => $this->input->post('thoi_gian'),
                );
//                echo $data;
                //them moi vao csdl
                if ($this->nhaphang_model->update($id,$data)) {
                    //tạo ra nội dung thông báo
                    $this->session->set_flashdata('message', 'Thêm mới dữ liệu thành công');
                } else {
                    $this->session->set_flashdata('message', 'Không thêm được');
                }
                //chuyen tới trang danh sách
                redirect(admin_url('nhaphang'));
            }
        }
        
        //load view
        $this->data['temp'] = 'admin/nhaphang/edit';
        $this->load->view('admin/layout', $this->data);
    }

    function delete()
    {
        $id = $this->uri->rsegment(3);
//        $this->delete($id);
        $this->nhaphang_model->delete($id);
        //tạo ra nội dung thông báo
        $this->session->set_flashdata('message', 'Xóa thành công');
        redirect(admin_url('nhaphang'));
    }

}
