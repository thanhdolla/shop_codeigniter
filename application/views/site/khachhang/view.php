<style>
    #cart_ccontents > tbody > tr > td{
        height: 50px;
        border: 1px solid #f0f0f0;
    }

</style>

<div class="box-center"><!-- The box-center product-->
    <div><h2>Thông tin thành viên</h2>
    </div><hr></hr>
    <table  id="cart_ccontents" style="background: whitesmoke;width:300px;margin-top: 30px;font-size: 18px;color:black; ">
        <tr>
            <td>
                <b>  Họ và tên</b>
            </td>
            <td>
                <?php echo $info->ten_kh ?>
            </td>

        </tr>
        <tr>
            <td>
                <b> Đại chỉ</b> 
            </td>
            <td>
                <?php echo $info->dia_chi_kh ?>
            </td>

        </tr>
        <tr>
            <td>
                <b> Email</b> 
            </td>
            <td>
                <?php echo $info->email_kh ?>
            </td>

        </tr>
        <tr>
            <td>
                <b> Số điện thoại</b>  
            </td>
            <td >
                <?php echo $info->sdt_kh ?> 
            </td>

        </tr>
    </table>
    <a href="<?php echo site_url('khachhang/edit')?>">Sửa thông tin</a>
</div>

