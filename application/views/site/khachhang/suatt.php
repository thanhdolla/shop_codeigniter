
<?php $this->load->view('site/head') ?>

<style>
    body > div > div.main > div.content > form{
      
        padding-left: 50px;
        background: whitesmoke;
        padding-top: 30px;
        min-height:800px;
    }
</style>


<div class="box-center"><!-- The box-center product-->
    <div><h2>Sửa thông tin khách hàng</h2>
    </div><hr></hr>
    <div class="box-content-center product"><!-- The box-content-center -->
        <form class="t-form form_action" method="post" action="<?php echo site_url('khachhang/edit') ?>" >

            <table >
                <tr style="height: 50px;"> 
                <div class="form-row">
                    <td> <label for="param_email" class="form-label">Email:<span class="req">*</span></label>
                    </td><td><div class="form-item">
                            <!--nếu có dữ liệu khách hàng thì echo ra không thì echo rỗng-->
                            <input type="text" class="input" id="email" name="email_kh" value="<?php echo  $kh_info->email_kh ?>">
                            <div class="clear"></div>
                            <div class="error" id="email_error"><?php echo form_error('email_kh') ?></div>
                        </div></td>
                    <div class="clear"></div>
                </div>
                </tr>

            
                <tr style="height: 50px;"> <div class="form-row">
                    <td><label for="param_name" class="form-label">Họ và tên:<span class="req">*</span></label>
                    </td><td>  <div class="form-item">
                            <input type="text" class="input" id="name" name="ten_kh" value="<?php echo $kh_info->ten_kh ?>">
                            <div class="clear"></div>
                            <div class="error" id="name_error"><?php echo form_error('ten_kh') ?></div>
                        </div></td>
                    <div class="clear"></div>
                </div>
                </tr>
                <tr style="height: 50px;">  <div class="form-row">
                    <td><label for="param_phone" class="form-label">Số điện thoại:<span class="req">*</span></label>
                    </td><td>     <div class="form-item">
                            <input type="text" class="input" id="phone" name="sdt_kh" value="<?php echo  $kh_info->sdt_kh  ?>">
                            <div class="clear"></div>
                            <div class="error" id="phone_error"><?php echo form_error('sdt_kh') ?></div>
                        </div></td>
                    <div class="clear"></div>
                </div>
                </tr>
                
                <tr style="height: 50px;">  <div class="form-row">
                    <td><label for="param_phone" class="form-label">Địa chỉ:<span class="req">*</span></label>
                    </td><td>     <div class="form-item">
                            <input type="text" class="input" id="phone" name="dia_chi_kh" value="<?php echo  $kh_info->dia_chi_kh  ?>">
                            <div class="clear"></div>
                            <div class="error" id="phone_error"><?php echo form_error('dia_chi_kh') ?></div>
                        </div></td>
                    <div class="clear"></div>
                </div>
                </tr>

              
            </table>
            <div class="form-row">
                <label class="form-label">&nbsp;</label>
                <div class="form-item">
                    <input type="submit" class="button" value="Sửa" name="submit">
                </div>
            </div>
        </form>
        <div class="clear"></div>
    </div><!-- End box-content-center -->

</div>
