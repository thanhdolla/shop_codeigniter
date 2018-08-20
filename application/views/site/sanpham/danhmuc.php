<style>
    body > div.main > div > div.content > div > div.box-content-center.product > div{
        /*background:;*/
        width: 250px;
        border:#D0D0D0 solid thin;
        height: 340px;
        float: left;
        margin-left: 20px;
        margin-top: 10px;
        -moz-border-radius: 15px;
        border-radius: 15px;

    }

    body > div.main > div > div.content > div > div.box-content-center.product >div> div> div.image{
        margin:auto;
        width:210px;
        height: 220px;
        margin-left: 20px;
        background:#dfd;
        margin-bottom: 5px;
    }
    body > div.main > div > div.content > div > div.box-content-center.product > div >div> div.image >a> img{
        width:190px;
        height: 210px;
        padding-left: 20px;
    }
    body > div.main > div > div.content > div > div.box-content-center.product > div:hover{
        transition: 0.5s;
        background: #EAF2F5;
        border:1px solid white;
    }
 
    .hover{
        width: 270px;
        border:#D0D0D0 solid thin;
        height: 340px;
        position: absolute;
        overflow: hidden;
        z-index: 5;
        transition: 0.4s;
        opacity: 0;
        transform: scale(0);
      -moz-border-radius: 15px;
        border-radius: 15px;
         background: white;
        /*padding-top: 10px;*/
        margin-left: -10px;
    }
    .text{
        font-family: arial;
        font-size: 12px;
        position: absolute;
        overflow: hidden;
        z-index: 10;
        opacity: 0;
        transition: 0.8s;
                padding-top: 10px;
                padding-left: 5px;
        font-weight: bold;
    }
    .sp:hover .hover{
        transform: scale(1);
        opacity: 1;
    }
    .sp:hover .orange{
        opacity: 0.8;
    }
    .sp:hover .text{
        opacity: 1;
    }
    .hover>a>button{
        text-align: center;
        margin-top: 300px;
        margin-left: 60px;
    }

</style>
<div class="box-center"> 
    <div style="color:#002166;font-size: 27px;">
        <b><span class="glyphicon glyphicon-th-list"></span> Danh sách sản phẩm</b> (<?php echo count($sanpham); ?>)<hr>
    </div>
    <div class="box-content-center product"> 
        <?php foreach ($sanpham as $row): ?>
        <div class="sp" onclick="location.href = '<?php echo base_url('sanpham/view/' . $row->san_phamID) ?>'">
            <div class="orange"></div>
            <div class="hover">
                <a href="<?php echo base_url('cart/add/' . $row->san_phamID) ?>"><button  class="btn btn-success">Thêm vào giỏ hàng</button></a>
            </div>
            <div class="text">
                <p style="font-size:15px;"><?php echo $row->ten_sp ?></p>
                <p>Bảo hành: <?php echo $row->bao_hanh ?></p>
                <p><?php echo $row->mo_ta_sp ?></p>
                <p style="color:red;padding-top:0px;font-size: 15px;">
                        Giá: 
                        <?php $price_new = $row->gia_sp - $row->khuyen_mai ?>
                        <?php if ($row->khuyen_mai > 0): ?>

                            <?php echo number_format($price_new) ?> Đ</br>
                        
                            <span style="text-decoration:line-through;color:black;"> <?php echo number_format($row->gia_sp); ?> Đ</span> 
                        
                        <?php else: ?>
                            <span style="color:red;"><?php echo number_format($row->gia_sp); ?> Đ</span>
                        <?php endif; ?>
                    </p>
            </div>
            <div class="sanpham">
                <div class="tensp" style="text-align:center;margin-top: 10px;">

                    <b style="" title=" <?php echo $row->ten_sp ?>" >
                        <?php echo $row->ten_sp ?>
                    </b>

                </div>
                <div class="image">

                   
                    <a style="height:70px;" href="<?php echo base_url('sanpham/view/' . $row->san_phamID) ?>"><img alt="" src="<?php echo base_url('upload/sanpham/' . $row->anh_sp) ?>"></a>

                </div>


               <div class="gia" style="height: 45px;background:#e1fded;margin-top:3px;;text-align: center;">
                        <?php $price_new = $row->gia_sp - $row->khuyen_mai ?>
                        <?php if ($row->khuyen_mai > 0): ?>

                            <p style="color:red">
                                <?php echo number_format($price_new) ?> Đ</br>
                            <!--<p style="text-decoration:line-through;padding-top: -5px;">-->
                                <span style="text-decoration:line-through;color:black;"> <?php echo number_format($row->gia_sp); ?> Đ</span> 
                            </p>
                        <?php else: ?>
                            <p style="color:red;padding-top:8px;"><?php echo number_format($row->gia_sp); ?> Đ</p>
                        <?php endif; ?>
                    </div>

                <div class="action">
                    <p>
                    <p style="float:left;margin-left:10px;margin-top: 0px;">Lượt xem:</p> <b><?php echo $row->luot_view ?></b>
<!--                    <a title="Mua ngay" type="button" value="mua ngay" href="<?php // echo base_url('dathang/form/' . $row->san_phamID) ?>" style="padding-left:18px;height: 10px;padding-bottom: 5px;">
                        &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                        <input  class="btn btn-success" type="button" value="Mua ngay"> </a>-->
                    <div class="clear"></div>
                </div>
            </div>
            </div>
            <?php endforeach; ?>
        </div>

    </div>
