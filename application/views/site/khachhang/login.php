
<?php $this->load->view('site/head') ?>

<style>
    .form{
      
        padding-left: 50px;
        background: whitesmoke;
        padding-top: 30px;
        min-height:auto;
        width:400px;
    }
</style>


<div class="box-center"><!-- The box-center product-->
    <div><h2>Đăng nhập</h2>
    </div><hr></hr>
    <div class="box-content-center product"><!-- The box-content-center -->
        <form class="form"  method="post" action="<?php echo site_url('khachhang/login') ?>" >
                          <h3 style="color:red"><?php echo form_error('login')?></h3>
            <table >
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
    
            </table>
            <div class="form-row">
                <label class="form-label">&nbsp;</label>
                <div class="form-item">
                     <input type="submit" class="btn btn-info" value="Đăng nhập" name="submit">
                </div>
            </div>
        </form>
        <div class="clear"></div>
    </div><!-- End box-content-center -->

</div>
