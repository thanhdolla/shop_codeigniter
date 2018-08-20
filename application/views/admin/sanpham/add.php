<?php $this->load->view('admin/head') ?>

<style>
    body > div > div.main > div.content > form{
      
        padding-left: 50px;
        background: #fcfcfc;
        padding-top: 30px;
        height:auto;
    }
   
</style>

<form id="form" class="form" enctype="multipart/form-data" method="post" action=" <?php echo admin_url('sanpham/add')?>">
    <fieldset>
        <table  width="500px" id="main-content" border="0px" cellpadding="0px" cellspacing="0px">
            <legend>Thêm quản sản phẩm mới</legend>


            <tr height="70px;">
            <div class="formRow" style="padding-top:20px;">
                <td><label for="param_name" class="formLeft">Tên:<span class="req"></span></label></td>
                <td>
                    <div class="formRight">
                        <span class="oneTwo"><input placeholder="tên" type="text" _autocheck="true" id="param_name" value="" name="ten_sp"></span>
                        <span class="autocheck" name="name_autocheck"></span>
                        <div class="clear error" name="name_error"></div>
                    </div>
                </td>
                <div class="clear"></div>
            </div>
            </tr>
           
            <tr height="50px;">
               
                <div class="formRow" >
                       <td><label for="param_username" class="formLeft">Hãng sản phẩm:<span class="req"></span></label></td>
                    
            <td>
                <select name="hang_spID"  style="width:100px;">
                <option value="" ></option>
                 kiem tra danh muc co danh muc con hay khong 
                <?php foreach ($hang as $row): ?>
                    <?php if (count($row->subs) > 1): ?>
                        <optgroup label="<?php echo $row->ten_hang_sp ?>">
                            <?php foreach ($row->subs as $sub): ?>
                                <option value="<?php echo $sub->hang_spID ?>"> <?php echo $sub->ten_hang_sp ?> </option>
                            <?php endforeach; ?>
                        </optgroup>
                    <?php else: ?>
                        <option value="<?php echo $row->hang_spID ?>" ><?php echo $row->ten_hang_sp ?></option>
                    <?php endif; ?>
                <?php endforeach; ?>
            </select>
                </td><!--

-->            <div class="clear"></div>
            </div>
            </tr>
            
            <tr height="70px;">
            <div class="formRow">
                <td><label for="param_name" class="formLeft">Ngày sản xuất:<span class="req"></span></label></td>
                <td>
                    <div class="formRight">
                        <span class="oneTwo"><input placeholder="ngày sản xuất" type="text" _autocheck="true" id="param_name" value="" name="ngay_sx"></span>
                        <span class="autocheck" name="name_autocheck"></span>
                        <div class="clear error" name="name_error"></div>
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
                        <input type="file" name="anh_sp" id="image" >
                    </div>
                    <div class="clear error" name="image_error"></div>
                </div>
                    </td>
                <div class="clear"></div>
            </div>
            </tr>

            <tr height="50px;">
            <div class="formRow">
                <td>  <label for="param_username" class="formLeft">Cấu hình:<span class="req"></span></label></td>
                <td> 
                    <div class="formRight">
                        <!--<span class="oneTwo"><input type="textarea" _autocheck="true" placeholder="cấu hình" value="" id="param_username" name="mo_ta_sp"></span>-->
                        <textarea style="width:400px;height: 200px; "_autocheck="true" placeholder="cấu hình" value="" id="param_username" name="mo_ta_sp"> </textarea>
                        <span class="autocheck" name="name_autocheck"></span>
                        <div class="clear error" name="name_error"></div>
                    </div>
                </td>
                <div class="clear"></div>
            </div>
            </tr>
            <tr height="50px;">
            <div class="formRow">
                <td>  <label for="param_username" class="formLeft">Bảo hành:<span class="req"></span></label></td>
                <td> 
                    <div class="formRight">
                        <span class="oneTwo"><input type="text" _autocheck="true" placeholder="bảo hành" value="" id="param_username" name="bao_hanh"></span>
                        <span class="autocheck" name="name_autocheck"></span>
                        <div class="clear error" name="name_error"></div>
                    </div>
                </td>
                <div class="clear"></div>
            </div>
            </tr>

            <tr height="50px;">
            <div class="formRow">
                <td>  <label for="param_username" class="formLeft">Khuyến mại:<span class="req">*</span></label></td>
                <td> 
                    <div class="formRight">
                        <span class="oneTwo"><input type="text" _autocheck="true" placeholder="khuyên mại" value="" id="param_username" name="khuyen_mai"></span>
                        <span class="autocheck" name="name_autocheck"></span>
                        <div class="clear error" name="name_error"></div>
                    </div>
                </td>
                <div class="clear"></div>
            </div>
            </tr>
            <tr height="70px;">
            <div class="formRow">
                <td> <label for="param_username" class="formLeft">Giá:<span class="req"></span></label></td>
                <td> 
                    <div class="formRight">
                        <span class="oneTwo"><input type="text" _autocheck="true"placeholder="giá" value="" id="param_username" name="gia_sp"></span>
                        <span class="autocheck" name="name_autocheck"></span>
                        <div class="clear error" name="name_error"></div>
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