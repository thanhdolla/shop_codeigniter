

<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<title>

</title>
<link rel="stylesheet" href="">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
<script src="<?php echo public_url() ?>js/jquery/bootstrap.min.js" type="text/javascript" charset="utf-8" ></script>
<style>
    body > div > div.main > div.content > div{
        background: whitesmoke;
        border: #D0D0D0 solid thin;
        height: 100px;
        padding-left: 20px;
    }

    body > div > div.main > div.content > div.titleArea > ul > li{
        float: left;
        padding-top: 15px;
        /*padding-right: 10px;*/
        padding-right: 250px;
        list-style-type: none;
    }
</style>
<div class="titleArea" style="height:60px;">

    <ul>
        <li><b>Quản lí nhập hàng</b></li>
        <li><a href="<?php echo admin_url('nhaphang/add') ?>">
                <span class="glyphicon glyphicon-plus"></span>
                <span>Thêm mới</span>
            </a></li>
    </ul>
</div>