
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
            <legend>Cập nhật thông tin thông báo</legend>
            
     <tr height="70px;">
            <div class="formRow" style="padding-top:20px;">
                <td><label for="param_name" class="formLeft">Tiêu đề:<span class="req"></span></label></td>
                <td>
                    <div class="formRight">
                        <span class="oneTwo"><input placeholder="tiêu đề" type="text" _autocheck="true" id="param_name" value="<?php echo $info->tieu_de_tb?>" name="tieu_de_tb"></span>
                        <span class="autocheck" name="name_autocheck"></span>
                        <div class="clear error" name="name_error"><?php echo form_error('tieu_de_tb') ?></div>
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
                    <div class="clear error" name="image_error"><?php echo form_error('anh_tb') ?></div>
                </div>
                    </td>
                <div class="clear"></div>
            </div>
            </tr>

            
              <tr height="50px;">
            <div class="formRow">
                <td>  <label for="param_username" class="formLeft">Nội dung:<span class="req"></span></label></td>
                <td> 
                    <div class="formRight">
                        <!--<span class="oneTwo"><input type="textarea" _autocheck="true" placeholder="cấu hình" value="" id="param_username" name="mo_ta_sp"></span>-->
                        <textarea style="width:400px;height: 200px; "_autocheck="true" name="noi_dung_tb"placeholder="nội dung" value="" id="param_username" name="noi_dung_tb"><?php echo $info->noi_dung_tb?> </textarea>
                        <span class="autocheck" name="name_autocheck"></span>
                        <div class="clear error" name="name_error"><?php echo form_error('noi_dung_tb') ?></div>
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