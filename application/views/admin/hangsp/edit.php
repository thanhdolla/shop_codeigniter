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
                        <span class="oneTwo"><input value="<?php echo $info->ten_hang_sp?> " placeholder="Tên hãng" type="text" _autocheck="true" id="param_name"  name="ten_hang_sp"></span>
                        <span class="autocheck" name="name_autocheck"></span>
                        <div class="clear error" name="name_error"><?php echo form_error('ten_hang_sp') ?></div>
                    </div>
                </td>
                <div class="clear"></div>
            </div>
            </tr>
             <tr height="70px;">
            <div class="formRow">
               <td> <label class="formLeft">Chọn hình ảnh:<span class="req"></span></label></td>
                <td><div class="formRight">
                    <div class="left">
                        <input type="file" name="image" id="image" >
                    </div>
                    <div class="clear error" name="image_error"></div>
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