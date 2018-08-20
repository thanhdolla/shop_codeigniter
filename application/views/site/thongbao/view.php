
<div class="box-center">
    <div class="tittle-box-center">
        <h1><?php echo $tb->tieu_de_tb ?></h1>
    </div><hr></hr>

    <table>
        <tr>
            <td  style="background-color:#2e8ece;margin-left: 50px;">



                <img src="<?php echo base_url('upload/thongbao/' . $tb->anh_tb) ?>" style="text-align: cennter;width:850px;height: 400px;">
            </td>
          
        </tr>
        <tr>
            <td>
                <div class="nd" style="padding-left: 20px;padding-top:20px;text-align: cennter;width:850px;margin:auto;font-size: 16px;">
                    <p style="line-height: 200%;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $tb->noi_dung_tb ?> </p>
                </div>
            </td>
        </tr>
    </table>

</div>
