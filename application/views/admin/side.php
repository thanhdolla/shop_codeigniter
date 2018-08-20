<style>
    body > div > div.main > div.side > div > div > div.panel-body > ul > li{
    
    text-decoration: none;
    list-style-type: none;
    color:brown;
    font-size: 16px;
    padding-top: 3px;
    }
    body > div > div.main > div.side > div > div> div.panel-body > ul > li>a:hover{
        color:red;
        
    }
</style>

<div class="side" 
     >
    <div class="panel panel-success">
        <div class="panel-heading"  >
            <h3 class="panel-title">Quản lí sản phẩm</h3>
        </div>
        <div class="panel-body">
            <ul>
               
                <li><a href="<?php echo admin_url('sanpham')?>">Danh sách sản phẩm</a></li>
               <li><a href="<?php echo admin_url('hangsp')?>">Các hãng sản phẩm</a></li>
                
            </ul>
        </div>
    </div>
    <div class="panel panel-success">
        <div class="panel-heading"  ">
            <h3 class="panel-title">Quản lí đơn hàng</h3>
        </div>
        <div class="panel-body">
            <ul>
                
                <li><a href="<?php echo admin_url('donhang')?>">Đơn hàng </a></li>
                <li><a href="<?php echo admin_url('donhangchitiet')?>">Đơn hàng chi tiết</a></li>
                
            </ul>
        </div>
    </div>
    <div class="panel panel-success">
        <div class="panel-heading" >
            <h3 class="panel-title">Quản lí nhập hàng</h3>
        </div>
        <div class="panel-body">
            <ul>
                <li><a href="<?php echo admin_url('nhaphang')?>">Danh sánh nhập hàng</a></li>
                
                
            </ul>
        </div>
    </div>
    <div class="panel panel-success">
        <div class="panel-heading" >
            <h3 class="panel-title">Quản lí tin tức</h3>
        </div>
        <div class="panel-body">
            <ul>
                <li><a href="<?php echo admin_url('thongbao')?>">Thông báo</a></li>
                
                
            </ul>
        </div>
    </div>
    <div class="panel panel-success">
        <div class="panel-heading"  >
            <h3 class="panel-title">Quản lí tài khoản</h3>
        </div>
        <div class="panel-body">
            <ul>
                <li><a href="<?php echo admin_url('admin')?>">Admin</a></li>
                <li><a href="<?php echo admin_url('thanhvien')?>">Thành viên</a></li>
                
            </ul>
        </div>
    </div>
    </div>