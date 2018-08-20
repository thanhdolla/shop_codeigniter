<html>
    <head>
        <?php
        $this->load->view('admin/head');
        ?>
    </head>
    <body>
        <div style="min-height: auto;"class ="wrap">
            <div class = "header" style=" padding-top: 5px; text-align: center;  margin: auto; width: 1170px;">
                <?php $this->load->view('admin/header'); ?>
            </div>
            <div class ="main" style="padding-top: 65px; width: 1170px;margin: auto;">
                <div class = "content" style=" width: 75%; 
		border: whitesmoke solid thin;
		background: #ffffff;min-height:auto; 
		font-size: 18px;
                float: left;
                ">
                     <?php  $this->load->view($temp,$this->data);?>

                </div>
                <div class="side" style="width: 25%;
                     float: left;      
                     min-height:auto; 
                     padding-left:2px;
                     background:whitesmoke;
                     font-size: 16px; ">
                    <?php $this->load->view('admin/side');
                    ?>         
                </div>
            </div>
            <div class = "footer">
                <?php $this->load->view('admin/footer');?>
            </div>

        </div>
    </body>
</html>


