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

<!--<script src="<?php // echo public_url()  ?>site/js/script.js"></script>-->
<script src="<?php echo public_url() ?>js/jquery/jquery-ui.min.js" type="text/javascript"></script>
<link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
<style>
    body > div.header > nav > div > div > nav > div > div.collapse.navbar-collapse.navbar-ex1-collapse > ul > li> a{
        padding-top:17px;
        font-size: 16px;
        padding-top:25px;
        color:green;
        
    }
   
    body> ul.ui-autocomplete{
/*        color: red !important;*/
        -moz-border-radius: 10px;
        border-radius: 10px;
        margin-left:355px;
        margin-top:53px;
         position: fixed !important;
        /*background: red;*/
    }
       
</style>
<script>
    $(function () {
        $("#text-search").autocomplete({
            source: " <?php echo site_url('sanpham/timkiem/1') ?>",
        });
    });
</script>
<nav class="header" style=" text-align: center;  margin: auto;
     overflow: visible;
     position: fixed !important;
     top: 0;
     z-index: 1000;  ">
    <div class="container">
        <div class="row">

            <nav class="navbar navbar-default" role="navigation">
                <div class="container-fluid" style="height: 70px;">
                    <!-- Brand and toggle get grouped for better mobile display -->
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <div id="search">
                            <a class="navbar-brand" style="padding-top: 2px;" href="#">
                                <img style="width: 220px;height: 58px;"src="<?php echo public_url() ?>/image/slide/a.jpg" alt="">
                            </a>
                        </div>

                    </div>

                    <!-- Collect the nav links, forms, and other content for toggling -->
                    <div class="collapse navbar-collapse navbar-ex1-collapse">

                        <form style="padding-top: 8px;"style=""action=" <?php echo base_url('sanpham/timkiem') ?> "method="get" class="navbar-form navbar-left" >

                            <input type="text" aria-haspopup="true" aria-autocomplete="list" role="textbox" autocomplete="off" class="ui-autocomplete-input" id="text-search" style="height: 35px;width:200px;" placeholder="Nhập tên sản phẩm..." value="<?php echo isset($key) ? $key : '' ?>" name="tukhoa" >

                            <input  type="submit" class="btn btn-info" value="Tìm kiếm" name="but" >

                        </form>


                        <ul class="nav navbar-nav navbar-right">

                            <li><a href="<?php echo base_url() ?>">Trang chủ</a></li>

                            <?php if (isset($kh_info)): ?>
                                <li><a href="<?php echo base_url('cart') ?>"><span class= "glyphicon glyphicon-shopping-cart"</span >(<?php echo $total_items ?>)</a></li>
                                <li><a href="<?php echo base_url('khachhang/view') ?>">Xin chào: <?php echo $kh_info->ten_kh ?></a></li>
                                <li><a href="<?php echo base_url('khachhang/logout') ?>">Đăng xuất</a></li>
                            <?php else : ?>
                                <li ><a style="" href="<?php echo base_url('cart') ?>"><span class= "glyphicon glyphicon-shopping-cart"</span >(<?php echo $total_items ?>)</a></li>
                                <li><a href="<?php echo base_url('khachhang/dangki') ?>">Đăng kí</a></li>
                                <li><a href="<?php echo base_url('khachhang/login') ?>">Đăng nhập</a></li>
                            <?php endif; ?>

                        </ul>
                    </div><!-- /.navbar-collapse -->
                </div>
            </nav>
        </div>
    </div>
</nav>


