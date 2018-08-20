<?php $this->load->view('admin/head') ?>

<style>
    body > div > div.main > div.content > form{
      
        padding-left: 50px;
        background: #fcfcfc;
        padding-top: 20px;
        height:auto;
    }
   
</style>

<form id="form" class="form" enctype="multipart/form-data" method="post" action="">
    <fieldset>
       <table width="400px"  class="table table-bordered table-hover">
            <legend>Cập nhật thông tin</legend>


            <tr height="50px;">
            <div class="formRow">
                <td><label for="param_name" class="formLeft">Tên:<span class="req">*</span></label></td>
                <td>
                    <div class="formRight">
                        <span class="oneTwo"><input value="<?php echo $info->ten_ad?> " placeholder="Tên" type="text" _autocheck="true" id="param_name"  name="ten_ad"></span>
                        <span class="autocheck" name="name_autocheck"></span>
                        <div class="clear error" name="name_error"><?php echo form_error('ten_ad') ?></div>
                    </div>
                </td>
                <div class="clear"></div>
            </div>
            </tr>
            <tr height="50px;">
                <td><div class="formRow">
                        <label for="param_username" class="formLeft">Mật khẩu:<span class="req">*</span></label></td>
                <td> 
                    <div class="formRight">
                        <span class="oneTwo"><input value="<?php echo $info->mk_ad?>"type="password" placeholder="Mật khẩu" _autocheck="true" id="param_re_password" name="mk_ad"></span>
                        <span class="autocheck" name="name_autocheck"></span>
                        <div class="clear error" name="name_error"><?php echo form_error('mk_ad') ?></div>
                    </div>
                </td>
            <div class="clear"></div>
            </div>
            </tr>
            <tr height="50px;">
            <div class="formRow">
                <td>  <label for="param_username" class="formLeft">Số điện thoại:<span class="req">*</span></label></td>
                <td> 
                    <div class="formRight">
                        <span class="oneTwo"><input type="text" _autocheck="true" placeholder="Số điện thoại" value="<?php echo $info->sdt_ad?>" id="param_username" name="sdt_ad"></span>
                        <span class="autocheck" name="name_autocheck"></span>
                        <div class="clear error" name="name_error"><?php echo form_error('sdt_ad') ?></div>
                    </div>
                </td>
                <div class="clear"></div>
            </div>
            </tr>
            <tr height="90px;">
            <div class="formRow">
                <td> <label for="param_username" class="formLeft">Email:<span class="req">*</span></label></td>
                <td> 
                    <div class="formRight">
                        <span class="oneTwo"><input type="text" _autocheck="true"placeholder="Email" value="<?php echo $info->email_ad ?>" id="param_username" name="email_ad"></span>
                        <span class="autocheck" name="name_autocheck"></span>
                        <div class="clear error" name="name_error"><?php echo form_error('email_ad') ?></div>
                    </div>
                </td>
                <div class="clear"></div>
            </div>
            </tr>

            <tr class="formSubmit" >
                <td> </td>
          
                <td ><button type="submit" class="btn btn-primary">Sửa</button></td>
            </tr>

        </table>
    </fieldset>
</form>