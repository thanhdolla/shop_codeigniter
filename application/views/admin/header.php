
<style>
    body > div > div.header > nav > div > div > nav > div > div.collapse.navbar-collapse.navbar-ex1-collapse > ul > li> a{
        font-size: 16px;
        color:#000080;
        padding-top: 17px;
    }
     body > div > div.header > nav > div > div > nav > div > div.collapse.navbar-collapse.navbar-ex1-collapse > ul > li>p{
        font-size: 16px;
        color:#0086b3;
        padding-top: 16px;
           }
    body > div > div.header > nav > div > div > nav > div > div.collapse.navbar-collapse.navbar-ex1-collapse > ul > li> a:hover{
        color:red;
    }
    body > div > div.header > nav > div.container > div > nav > div > div.navbar-header > a > img{
        height:60px;
    }
</style>
<nav class="header" style=" text-align: center;  margin: auto;
     overflow: visible;
     position: fixed !important;
     top: 0;
     z-index: 1000;  ">
    <div>
       
    </div>
 
    <div class="container">
        <div class="row">

            <nav class="navbar navbar-default" role="navigation">
                <div class="container-fluid" style="height: 60px;">
                    <!-- Brand and toggle get grouped for better mobile display -->
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <a class="navbar-brand" style="padding-top: 2px;" href="#">
                            <img src="<?php echo public_url() ?>/image/slide/a.jpg" alt="">
                        </a>
                    </div>

                    <!-- Collect the nav links, forms, and other content for toggling -->
                    <div class="collapse navbar-collapse navbar-ex1-collapse">

                       
                        <ul class="nav navbar-nav navbar-right">
                            

                            <li><a href="<?php echo admin_url('home');?>"> <span class="glyphicon glyphicon-home"></span> Home</a></li>
                            <li><a href="<?php echo base_url('home');?>">Website</a></li>
                            <li> <p>Xin chào Admin: <?php echo $ad_info->ten_ad ?></p></li>
                            <li><a href="<?php echo admin_url('admin/logout')?>"><span class="glyphicon glyphicon-off"></span> Logout</a></li>

                            
                            
                        </ul>
                    </div><!-- /.navbar-collapse -->
                </div>
            </nav>
        </div>
    </div>


</nav>