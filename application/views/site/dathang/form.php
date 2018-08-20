
<?php $this->load->view('site/head') ?>

<style>
   body > div.main > div > div.content > div.box-center > div.box-content-center.product > form > table{
      
        padding-left: 50px;
        background: #fcfcfc;
        padding-top: 20px;
        width:50%;
      
    }
</style>


<div class="box-center"><!-- The box-center product-->
    <div ><span  class="glyphicon glyphicon-pencil"></span> <b style="font-size:20px;padding-top: 5px;"> Nhập thông tin mua hàng</b>
    </div><hr></hr>
    <b>Tông số tiền cần thanh toán:<span style="color:red;"> <?php  $giohang = $this->cart->contents();$tong_tien=0;foreach ($giohang as $row) {
            $tong_tien = $tong_tien + $row['subtotal'];
        }
       echo $tong_tien ?></b></h2>
    <div class="box-content-center product"><!-- The box-content-center -->
        
        <form class="t-form form_action" method="post" action="<?php echo site_url('dathang/form') ?>" >

           <table width="400px"  class="table table-bordered table-hover">
                <tr style="height: 50px;"> 
                <div class="form-row">
                    <td> <label for="param_email" class="form-label">Email:<span class="req">*</span></label>
                    </td><td><div class="form-item">
                            <!--nếu có dữ liệu khách hàng thì echo ra không thì echo rỗng-->
                            <input type="text" class="input" id="email" name="email" value="<?php echo isset($kh_info->email_kh) ? $kh_info->email_kh :'' ?>">
                            <div class="clear"></div>
                            <div class="error" id="email_error"><?php echo form_error('email') ?></div>
                        </div></td>
                    <div class="clear"></div>
                </div>
                </tr>

            
                <tr style="height: 50px;"> <div class="form-row">
                    <td><label for="param_name" class="form-label">Họ và tên:<span class="req">*</span></label>
                    </td><td>  <div class="form-item">
                            <input type="text" class="input" id="name" name="ten" value="<?php echo isset($kh_info->ten_kh) ? $kh_info->ten_kh :'' ?>">
                            <div class="clear"></div>
                            <div class="error" id="name_error"><?php echo form_error('ten') ?></div>
                        </div></td>
                    <div class="clear"></div>
                </div>
                </tr>
                <tr style="height: 50px;">  <div class="form-row">
                    <td><label for="param_phone" class="form-label">Số điện thoại:<span class="req">*</span></label>
                    </td><td>     <div class="form-item">
                            <input type="text" class="input" id="phone" name="sdt" value="<?php echo isset($kh_info->sdt_kh) ? $kh_info->sdt_kh :'' ?>">
                            <div class="clear"></div>
                            <div class="error" id="phone_error"><?php echo form_error('sdt') ?></div>
                        </div></td>
                    <div class="clear"></div>
                </div>
                </tr>
                <tr style="height: 50px;">  <div class="form-row">
                    <td><label for="param_phone" class="form-label">Địa chỉ:<span class="req">*</span></label>
                    </td><td>     <div class="form-item">
                            <input type="text" class="input" id="phone" name="dia_chi" value="<?php echo isset($kh_info->dia_chi_kh) ? $kh_info->dia_chi_kh :'' ?>">
                            <div class="clear"></div>
                            <div class="error" id="phone_error"><?php echo form_error('dia_chi') ?></div>
                        </div></td>
                    <div class="clear"></div>
                </div>
                </tr>
                <tr style="height: 50px;">  <div class="form-row">
                    <td><label for="param_phone" class="form-label">Yêu cầu ngày:<span class="req">*</span></label>
                    </td><td>     <div class="form-item">
                            <input type="text" class="input" id="phone" name="thoi_gian" value="<?php echo isset($kh_info->thoi_gian) ? $kh_info->thoi_gian :'' ?>">
                            <div class="clear"></div>
                            <div class="error" id="phone_error"><?php echo form_error('thoi_gian') ?></div>
                        </div></td>
                    <div class="clear"></div>
                </div>
                </tr>

              
            </table>
            <div class="form-row">
                <label class="form-label">&nbsp;</label>
                <div class="form-item">
                    <button type="submit" class="btn btn-success">Đặt hàng</button>
                            <!--<input  class="btn btn-success" type="button" value="Đặt hàng" name="submit"> </a>-->
                </div>
            </div>
        </form>
        <div class="clear"></div>
    </div><!-- End box-content-center -->

</div>
