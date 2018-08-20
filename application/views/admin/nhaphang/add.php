<?php $this->load->view('admin/head') ?>

<style>
    body > div > div.main > div.content > form{
      
        padding-left: 50px;
        background: whitesmoke;
        padding-top: 30px;
        min-height:800px;
    }
    body > div > div.main > div.content > div.wrap > div.bang > table > tbody > tr:hover{
        color:burlywood;
    }
</style>

<form id="form" class="form" enctype="multipart/form-data" method="post" action="">
    <fieldset>
        <table width="400px"  class="table table-bordered table-hover">
            <legend>Thêm hàng nhập mới</legend>


            <tr height="50px;">
            <div class="formRow">
                <td><label for="param_name" class="formLeft">Tên:<span class="req">*</span></label></td>
                <td>
                    <div class="formRight">
                        <span class="oneTwo"><input placeholder="Tên" type="text" _autocheck="true" id="param_name" value="<?php echo set_value('ten_sp') ?>" name="ten_sp"></span>
                        <span class="autocheck" name="name_autocheck"></span>
                        <div class="clear error" name="name_error"><?php echo form_error('ten_sp') ?></div>
                    </div>
                </td>
                <div class="clear"></div>
            </div>
            </tr>
           
            <tr height="50px;">
            <div class="formRow">
                <td>  <label for="param_username" class="formLeft">Số lượng:<span class="req">*</span></label></td>
                <td> 
                    <div class="formRight">
                        <span class="oneTwo"><input type="text" _autocheck="true" placeholder="Số lượng" value="<?php echo set_value('so_luong') ?>" id="param_username" name="so_luong"></span>
                        <span class="autocheck" name="name_autocheck"></span>
                        <div class="clear error" name="name_error"><?php echo form_error('so_luong') ?></div>
                    </div>
                </td>
                <div class="clear"></div>
            </div>
            </tr>
            <tr height="50px;">
            <div class="formRow">
                <td>  <label for="param_username" class="formLeft">Giá:<span class="req">*</span></label></td>
                <td> 
                    <div class="formRight">
                        <span class="oneTwo"><input type="text" _autocheck="true" placeholder="giá" value="<?php echo set_value('gia') ?>" id="param_username" name="gia"></span>
                        <span class="autocheck" name="name_autocheck"></span>
                        <div class="clear error" name="name_error"><?php echo form_error('gia') ?></div>
                    </div>
                </td>
                <div class="clear"></div>
            </div>
            </tr>
            <tr height="50px;">
            <div class="formRow">
                <td>  <label for="param_username" class="formLeft">Tên nhà cung cấp:<span class="req">*</span></label></td>
                <td> 
                    <div class="formRight">
                        <span class="oneTwo"><input type="text" _autocheck="true" placeholder="nhà cung cấp" value="<?php echo set_value('nha_cung_cap') ?>" id="param_username" name="nha_cung_cap"></span>
                        <span class="autocheck" name="name_autocheck"></span>
                        <div class="clear error" name="name_error"><?php echo form_error('nha_cung_cap') ?></div>
                    </div>
                </td>
                <div class="clear"></div>
            </div>
            </tr>
            <tr height="50px;">
            <div class="formRow">
                <td>  <label for="param_username" class="formLeft">Điện thoại:<span class="req">*</span></label></td>
                <td> 
                    <div class="formRight">
                        <span class="oneTwo"><input type="text" _autocheck="true" placeholder="số điện thoại" value="<?php echo set_value('sdt_ncc') ?>" id="param_username" name="sdt_ncc"></span>
                        <span class="autocheck" name="name_autocheck"></span>
                        <div class="clear error" name="name_error"><?php echo form_error('sdt_ncc') ?></div>
                    </div>
                </td>
                <div class="clear"></div>
            </div>
            </tr>
            <tr height="90px;">
            <div class="formRow">
                <td> <label for="param_username" class="formLeft">Bảo hành:<span class="req">*</span></label></td>
                <td> 
                    <div class="formRight">
                        <span class="oneTwo"><input type="text" _autocheck="true"placeholder="bảo hành" value="<?php echo set_value('bao_hanh') ?>" id="param_username" name="bao_hanh"></span>
                        <span class="autocheck" name="name_autocheck"></span>
                        <div class="clear error" name="name_error"><?php echo form_error('bao_hanh') ?></div>
                    </div>
                </td>
                <div class="clear"></div>
            </div>
            </tr>
            <tr height="90px;">
            <div class="formRow">
                <td> <label for="param_username" class="formLeft">Ngày nhập:<span class="req">*</span></label></td>
                <td> 
                    <div class="formRight">
                        <span class="oneTwo"><input type="text" _autocheck="true"placeholder="ngày nhập" value="<?php echo set_value('thoi_gian') ?>" id="param_username" name="thoi_gian"></span>
                        <span class="autocheck" name="name_autocheck"></span>
                        <div class="clear error" name="name_error"><?php echo form_error('thoi_gian') ?></div>
                    </div>
                </td>
                <div class="clear"></div>
            </div>
            </tr>

            <tr class="formSubmit" >
                <td> </td>
          
                <td ><button type="submit" class="btn btn-primary">Thêm mới</button></td>
            </tr>

        </table>
    </fieldset>
</form>