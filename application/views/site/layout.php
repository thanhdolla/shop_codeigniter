
<html>
    <head>
        <?php $this->load->view('site/head'); ?>
    </head>
    <body>
        <!--<div class = "wrap" style=" text-align: center; background: red;  margin: auto; width: 1170px;">-->
        <?php //  $this->load->view('site/wrap')?>
        <!--</div>-->
        <div class = "header" style=" text-align: center;  margin: auto; width: 1170px;">
            <?php $this->load->view('site/header'); ?>
        </div>
        <div class = "banner" style=" text-align: center;  margin: auto; width: 1170px;">
            <?php $this->load->view('site/banner'); ?>
        </div>


        <div class = "main" style="padding-top: 3px; width: 1170px;margin: auto;" >
            <div class="wrapmain ">



                <div class=" content"  style=" width: 75%; padding-left: 20px;
                     border: whitesmoke solid thin;
                     background: #ffffff;min-height:800px; 
                     font-size: 18px;
                     padding-top: 10px;
                     float: left;">
                     <?php
                     $this->load->view('site/message')
                     ?>
                     <?php
                     $this->load->view($temp, $this->data);
                     ?>
                </div>
                <div class =" side" style="width: 25%;
                     float: left;
                     min-height:auto; 
                     padding-left:2px;
                     background:whitesmoke;
                     font-size: 16px; ">
                     <?php $this->load->view('site/side', $this->data);
                     ?>
                </div>
            </div>
        </div>
        <div class="clear" style="clear:both;">
        </div>
        <div class = "footer" id="footer" style="padding-top: 10px;background-color: #d5dce0; height: 50px; clear: both;width: 1170px;margin: auto;">
            <?php $this->load->view('site/footer'); ?>
        </div>


    </body>
</html>
