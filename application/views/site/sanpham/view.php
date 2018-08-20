       
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>
		
	</title>
	<link rel="stylesheet" href="">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
<script src="<?php echo public_url()?>js/jquery/bootstrap.min.js" type="text/javascript" charset="utf-8" ></script>
    <script src="<?php echo public_url()?>js/jquery/jquery.js" type="text/javascript"></script>
    <script src="<?php echo public_url()?>js/jquery/bootstrap.js" type="text/javascript"></script>
   <link type="text/css" href="<?php echo public_url()?>/js/jquery/jquery-ui/custom-theme/jquery-ui-1.8.21.custom.css" rel="stylesheet">
	    
        <script src="<?php echo public_url()?>site/js/script.js"></script>
    <script src="<?php echo public_url()?>js/jquery/jquery-ui.min.js" type="text/javascript"></script>

   
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <body>
<div class="box-center"><!-- The box-center product-->
    <div class="tittle-box-center">
        <h2>Chi tiết sản phẩm</h2>
    </div><hr></hr>
    <div class="box-content-center product"><!-- The box-content-center -->
        <div class='product_view_img' style="width:300px;float:right;text-align: center;">
            <div class="img" >
                <img  src="<?php echo base_url('upload/sanpham/' . $sanpham->anh_sp) ?>" style="text-align: cennter;width:200px !important">
            </div>
            <div class="gia" style="text-align: center;">
            <!--<p class='option' style="text-align:center;padding-left: 200px;">-->

                <?php $price_new = $sanpham->gia_sp - $sanpham->khuyen_mai ?>
                <?php if ($sanpham->khuyen_mai > 0): ?>
                    <p style="text-decoration:line-through;padding-top: 5px;font-size: 15x;">
                        <?php echo $sanpham->gia_sp; ?>Đ
                    </p>
                    Giá khuyến mại:<p class="ga" style="color:red;padding-top: 10px;font-size: 20px;">
                        <b><?php echo $price_new ?>Đ</b>
                    </p>
                <?php else: ?>
                    Giá:<p style="color:red;font-size: 20px;"><?php echo $sanpham->gia_sp; ?>Đ</p>
                <?php endif; ?>

            </div>
            <div class='clear' style='height:10px'></div>
            <div class="clearfix"  >
            
            </div>
        </div>

        <div class='product_view_content' style="width: 500px;">
            <h1><?php echo $sanpham->ten_sp ?></h1>



            <p class='option'>
               <b> Hãng sản xuất: </b>

                <?php echo $hang->ten_hang_sp ?>    

            </p>

            <p class='option'>
                
                  <b> Lượt xem: </b>
                <?php echo $sanpham->luot_view ?>
            </p>
            <p class='option'>
               <b> Ngày sản xuất:</b> <?php echo $sanpham->ngay_sx ?> 
            </p>
            <p class='option'>
                <table style="width:500px;">
                     <tr>
                    <td style="width:80px;">
                      <b>  Bảo hành: </b>
                    </td>
                    <td style="width:350px;padding-left: 10px;">
                        <?php echo $sanpham->bao_hanh ?></b>
                    </td>
                </tr>
            </table>
               
            </p>
            <p class='option'>
            <table style="width:540px;border: whitesmoke solid thin;">
                <tr>
                    <td style="border: whitesmoke solid thin;width:80px;">
                        <b>Cấu hình: </b>
                    </td>
                    <td style="width:450px;padding-left: 10px;">
                        <?php echo $sanpham->mo_ta_sp ?>
                    </td>
                </tr>
            </table>

            </p>  
           <a title="Mua ngay" type="button" value="Thêm vào giỏ hàng" href="<?php echo base_url('cart/add/' . $sanpham->san_phamID) ?>" style="padding-left:18px;height: 10px;padding-bottom: 5px;">
                            <!--&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;-->
                            <input  class="btn btn-success" type="button" value="Thêm vào giỏ hàng"> </a>
        
            </div>

        </div>
        <div class='clear' style='height:15px'></div>
        <div class="link" style="padding-top:60px;">
            <!-- AddThis Button BEGIN -->
            <script type="text/javascript">var switchTo5x = true;</script>
            <script type="text/javascript" src="http://w.sharethis.com/button/buttons.js"></script>
            <script type="text/javascript">stLight.options({publisher: "19a4ed9e-bb0c-4fd0-8791-eea32fb55964", doNotHash: false, doNotCopy: false, hashAddressBar: false});</script>
            <span class='st_facebook_hcount' displayText='Facebook'></span>
<!--            <span class='st_fblike_hcount' displayText='Facebook Like'></span>-->
            <span class='st_googleplus_hcount' displayText='Google +'></span>
            <span class='st_twitter_hcount' displayText='Tweet'></span>
            <!-- AddThis Button END -->
        </div>  
        <div class='clear' style='height:10px'></div>

        <div style="margin-top: 10px;">
            <hr></hr>
        </div>  
    </div>
</div>


</body>
