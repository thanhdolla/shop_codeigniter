<?php

Class Thongbao extends MY_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('thongbao_model');
    }

    function index() {
        $total_rows = $this->thongbao_model->get_total();
        $this->data['total_rows'] = $total_rows;
        //load ra thu vien phan trang
        $this->load->library('pagination');
        $config = array();
        $config['total_rows'] = $total_rows; //tong tat ca cac bài viết tren website
        $config['base_url'] = admin_url('thongbao/index'); //link hien thi ra danh sach bài viết
        $config['per_page'] = 1; //so luong bài viết hien thi tren 1 trang
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
            $input['where']['id'] = $id;
        }
        $title = $this->input->get('title');
        if ($title) {
            $input['like'] = array('ten_tb', $title);
        }

        //lay danh sach bai viet
        $list = $this->thongbao_model->get_list($input);
        $this->data['list'] = $list;

        //lay nội dung của biến message
        $message = $this->session->flashdata('message');
        $this->data['message'] = $message;

        //load view
        $this->data['temp'] = 'admin/thongbao/index';
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
            $this->form_validation->set_rules('tieu_de_tb', 'Tiêu đề bài viết', 'required|min_length[5]');
            $this->form_validation->set_rules('noi_dung_tb', 'Nội dung bài viết', 'required|min_length[5]');

            //nhập liệu chính xác
            if ($this->form_validation->run()) {

                //lay ten file anh minh hoa duoc update len
                $this->load->library('upload_library');
                $upload_path = './upload/thongbao';
                $upload_data = $this->upload_library->upload($upload_path, 'image');
                $anh_tb = ' ';
                if (isset($upload_data['file_name'])) {
                    $anh_tb = $upload_data['file_name'];
                }
                //luu du lieu can them
                $data = array(
                    'tieu_de_tb' => $this->input->post('tieu_de_tb'),
                    'anh_tb' => $anh_tb,
                    'noi_dung_tb' => $this->input->post('noi_dung_tb'),
                );
                //them moi vao csdl
                if ($this->thongbao_model->create($data)) {
                    //tạo ra nội dung thông báo
                    $this->session->set_flashdata('message', 'Thêm mới dữ liệu thành công');
                } else {
                    $this->session->set_flashdata('message', 'Không thêm được');
                }
                //chuyen tới trang danh sách
                redirect(admin_url('thongbao'));
            }
        }


        //load view
        $this->data['temp'] = 'admin/thongbao/add';
        $this->load->view('admin/layout', $this->data);
    }

//    /*
//     * Chinh sua bài viết
//     */
    function edit()
    {
        $id = $this->uri->rsegment('3');
        $info = $this->thongbao_model->get_info($id);
        if(!$info)
        {
            //tạo ra nội dung thông báo
            $this->session->set_flashdata('message', 'Không tồn tại bài viết này');
            redirect(admin_url('thongbao'));
        }
        $this->data['info'] = $info;
       
       
        //load thư viện validate dữ liệu
        $this->load->library('form_validation');
        $this->load->helper('form');
        
        //neu ma co du lieu post len thi kiem tra
        if($this->input->post())
        {
            $this->form_validation->set_rules('tieu_de_tb', 'Tiêu đề bài viết', 'required');
            $this->form_validation->set_rules('noi_dung_tb', 'Nội dung bài viết', 'required');
            
            //nhập liệu chính xác
            if($this->form_validation->run())
            {
               
                //lay ten file anh minh hoa duoc update len
                $this->load->library('upload_library');
                $upload_path = './upload/thongbao';
                $upload_data = $this->upload_library->upload($upload_path, 'image');
                $anh_tb= '';
                if(isset($upload_data['file_name']))
                {
                    $anh_tb = $upload_data['file_name'];
                }
            
                 //luu du lieu can them
                $data = array(
                  'tieu_de_tb' => $this->input->post('tieu_de_tb'),
                    'anh_tb' => $anh_tb,
                    'noi_dung_tb' => $this->input->post('noi_dung_tb'),
                ); 
                if($anh_tb != '')
                {
                    $data['anh_tb'] = $anh_tb;
                }
               
                //them moi vao csdl
                if($this->thongbao_model->update($id, $data))
                {
                    //tạo ra nội dung thông báo
                    $this->session->set_flashdata('message', 'Cập nhật dữ liệu thành công');
                }else{
                    $this->session->set_flashdata('message', 'Không cập nhật được');
                }
                //chuyen tới trang danh sách
                redirect(admin_url('thongbao'));
            }
        }
        
        
        //load view
        $this->data['temp'] = 'admin/thongbao/edit';
        $this->load->view('admin/layout', $this->data);
    }

    function delete()
    {
        $id = $this->uri->rsegment(3);
//        $this->delete($id);
        $this->thongbao_model->delete($id);
        //tạo ra nội dung thông báo
        $this->session->set_flashdata('message', 'Xóa bài viết thành công');
        redirect(admin_url('thongbao'));
    }
}