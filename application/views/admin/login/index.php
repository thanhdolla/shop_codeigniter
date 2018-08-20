<?php $this->load->view('admin/head') ?>

<style>
#form{
        background: whitesmoke;
        padding-top: 30px;
        margin: auto;
        width: 500px;
        padding-bottom: 30px;
    }
    #form > fieldset{
        margin: auto;
        width: 500px;
        text-align: center;
    }
    #form > fieldset>table{
        padding-left: 300px;
        margin: auto;
        width: 400px;
    }
    #form.form{
        margin-top: 100px;
    }
    #form > fieldset > p{
        color:red;
    }
    
   
</style>

<form id="form" class="form" enctype="multipart/form-data" method="post" action=""
>
    <fieldset>
        <table width="400px" id="main-content" border="0px" cellpadding="0px" cellspacing="0px">
            <legend>Đăng nhập</legend>


            <tr height="50px;">
            <div class="formRow">
                <td><label for="param_name" class="formLeft">Username</label></td>
                <td>
                    <div class="formRight">
                        <span class="oneTwo"><input placeholder="Tên đăng nhập" type="text" _autocheck="true" id="param_name"  name="ten_ad"></span>
                        <span class="autocheck" name="name_autocheck"></span>
                        <div class="clear error" name="name_error"></div>
                    </div>
                </td>
                <div class="clear"></div>
            </div>
            </tr>
            <tr height="50px;">
                <td><div class="formRow">
                        <label for="param_username" class="formLeft">Password</span></label></td>
                <td> 
                    <div class="formRight">
                        <span class="oneTwo"><input type="password" placeholder="Mật khẩu" _autocheck="true" id="param_re_password" name="mk_ad"></span>
                        <span class="autocheck" name="name_autocheck"></span>
                        <div class="clear error" name="name_error"></div>
                    </div>
                </td>

            <tr class="formSubmit" >
                <td> </td>

                <td ><button type="submit" class="btn btn-primary">Login</button></td>
                <?php echo form_error('login') ?>
            </tr>

        </table>
    </fieldset>
</form>