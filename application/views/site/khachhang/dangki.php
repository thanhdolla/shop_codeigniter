
<?php $this->load->view('site/head') ?>

<style>
   .form{
      
        padding-left: 50px;
        background: whitesmoke;
        padding-top: 30px;
        min-height:auto;
        width:500px;
    }
</style>


<div class="box-center"><!-- The box-center product-->
    <div><h2>Đăng ký thành viên</h2>
    </div><hr></hr>
    <div class="box-content-center product"><!-- The box-content-center -->
        <form class="form" method="post" action="<?php echo site_url('khachhang/dangki') ?>" >

            <table style="width:500px;" >
                <tr style="height: 50px;"> 
                <div class="form-row">
                    <td> <label for="param_email" class="form-label">Email:<span class="req">*</span></label>
                    </td><td><div class="form-item">
                            <input type="text" class="input" id="email" name="email_kh" value="<?php echo set_value('email_kh') ?>">
                            <div class="clear"></div>
                            <div class="error" id="email_error"><?php echo form_error('email_kh') ?></div>
                        </div></td>
                    <div class="clear"></div>
                </div>
                </tr>

                <tr style="height: 50px;"> <div class="form-row">
                    <td> <label for="param_password" class="form-label">Mật khẩu:<span class="req">*</span></label>
                    </td><td><div class="form-item">
                            <input type="password" class="input" id="password" name="mk_kh">
                            <div class="clear"></div>
                            <div class="error" id="password_error"><?php echo form_error('mk_kh') ?></div>
                        </div></td>
                    <div class="clear"></div>
                </div>
                </tr>
                <tr style="height: 50px;">  <div class="form-row">
                    <td> <label for="param_re_password" class="form-label">Gõ lại mật khẩu:<span class="req">*</span></label>
                    </td><td> <div class="form-item">
                            <input type="password" class="input" id="re_password" name="re_password">
                            <div class="clear"></div>
                            <div class="error" id="re_password_error"><?php echo form_error('re_password') ?></div>
                        </div></td>
                    <div class="clear"></div>
                </div>
                </tr>

                <tr style="height: 50px;"> <div class="form-row">
                    <td><label for="param_name" class="form-label">Họ và tên:<span class="req">*</span></label>
                    </td><td>  <div class="form-item">
                            <input type="text" class="input" id="name" name="ten_kh" value="<?php echo set_value('ten_kh') ?>">
                            <div class="clear"></div>
                            <div class="error" id="name_error"><?php echo form_error('ten_kh') ?></div>
                        </div></td>
                    <div class="clear"></div>
                </div>
                </tr>
                <tr style="height: 50px;">  <div class="form-row">
                    <td><label for="param_phone" class="form-label">Số điện thoại:<span class="req">*</span></label>
                    </td><td>     <div class="form-item">
                            <input type="text" class="input" id="phone" name="sdt_kh" value="<?php echo set_value('sdt_kh') ?>">
                            <div class="clear"></div>
                            <div class="error" id="phone_error"><?php echo form_error('sdt_kh') ?></div>
                        </div></td>
                    <div class="clear"></div>
                </div>
                </tr>

                <tr style="height: 50px;">  <div class="form-row">
                    <td>  <label for="param_address" class="form-label">Địa chỉ:<span class="req">*</span></label>
                    </td><td>  <div class="form-item">
                            <textarea class="input" style="width:200px;"id="address" name="dia_chi_kh"><?php echo set_value('dia_chi_kh') ?></textarea>
                            <div class="clear"></div>
                            <div class="error" id="address_error"><?php echo form_error('dia_chi_kh') ?></div>
                        </div></td>
                    <div class="clear"></div>
                </div>
                </tr>
            </table>
            <div class="form-row" >
               </br>
                <div class="form-item" >
                    <input type="submit" style="margin-botton:10px;" class="btn btn-info" value="Đăng ký" name="submit">
                </div>
            </div>
        </form>
        <div class="clear"></div>
    </div><!-- End box-content-center -->

</div>
