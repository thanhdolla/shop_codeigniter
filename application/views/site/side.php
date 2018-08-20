

<head>


<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<title>

</title>
<link rel="stylesheet" href="">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
<script src="<?php echo public_url() ?>js/jquery/bootstrap.min.js" type="text/javascript" charset="utf-8" ></script>
<script src="<?php echo public_url() ?>js/jquery/jquery.js" type="text/javascript"></script>
<script src="<?php echo public_url() ?>js/jquery/bootstrap.js" type="text/javascript"></script>
<link type="text/css" href="<?php echo public_url() ?>/js/jquery/jquery-ui/custom-theme/jquery-ui-1.8.21.custom.css" rel="stylesheet">

<script src="<?php echo public_url() ?>site/js/script.js"></script>
<script src="<?php echo public_url() ?>js/jquery/jquery-ui.min.js" type="text/javascript"></script>


<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
<style>
    .current { color: red; }
</style>

</head>
<body>

<div class="side" style="padding-left: 10px;" >

    <!-- The Support -->
    <div class="box-right">
        <div class="title tittle-box-right">
            <h2> Hỗ trợ trực tuyến </h2>
        </div>
        <div class="content-box">
            <!-- goi ra phuong thuc hien thi danh sach ho tro -->
            <div class="support">
                <!--<p><b style="padding-left:20px;font-size: 18px;">       Shop Didongtoday.com </b>	</p>-->			


                <p ><span  class="glyphicon glyphicon-earphone"></span> <b style="font-size:16px;">Liên hệ: 19001009	
                </p>

                <p >

                    <span  class="glyphicon glyphicon-send"></span> <b style="font-size:16px;">Email: Didongtoday@gmail.com

                </p>

            </div>	
        </div>
    </div>
    <!-- End Support -->
</div>

    <div class="panel panel-success" style="padding-top:3px;">
    <div class="panel-heading" >
        <h3 class="panel-title" style="text-align:center;">Hãng Sản Phẩm </h3>
    </div>
    <div >

        <?php foreach ($list as $row): ?>
            <!--bien list này lấy từ core- MY_controller-->

          <!--<span><h4  title="<?php // echo $row->ten_hang_sp;  ?>"><?php // echo $row->ten_hang_sp  ?></h4></span>-->
            <?php if (!empty($row->subs)): ?>
                <ul class="sub">
                    <?php foreach ($row->subs as $sub): ?>
                        <li style="list-style-type: none;padding-top: 3px;background: window;">
                            <a  href="<?php echo base_url('sanpham/danhmuc/' . $sub->hang_spID) ?>">
                                <img src="<?php echo base_url('upload/hangsp/' . $sub->anh_hang_sp) ?>" style="padding-right: 5px;height:40px;width: 60px;" alt="<?php // echo $row->ten_hang_sp  ?>">
                                <?php echo $sub->ten_hang_sp ?></a>
                        </li>
                    <?php endforeach; ?>
                </ul>
            <?php endif; ?>

        <?php endforeach; ?>

    </div>

</div>
    <div class="panel panel-success" style="padding-top:3px;">
    <div class="panel-heading" >
        <h3 class="panel-title"  style="text-align:center;">Thông báo mới </h3>
    </div>
    <div >
        <ul >
            <!--bien list1 này lấy từ core- MY_controller-->
            <?php foreach ($list1 as $row): ?>
                <li style="list-style-type: none;padding-top: 3px;background: window;">
                    <a  href="<?php echo base_url('thongbao/view/' . $row->thong_baoID); ?>">
                      <table>
                          <tr>
                              <td>
                        <img src="<?php echo base_url('upload/thongbao/' . $row->anh_tb) ?>" style="padding-right: 5px;height:50px;width: 70px;" alt="<?php echo $row->tieu_de_tb ?>">
                    </td>  <td><span style="font-size:14px;color:#003399;" >  <?php echo $row->tieu_de_tb ?></span></td>
                    </tr>
                    </table>
                    </a>
                </li>
            <?php endforeach; ?>
        </ul>
    </div>

</div>

</div>  

</body>