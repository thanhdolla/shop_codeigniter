

<?php $this->load->view('admin/thongbao/head', $this->data); ?>
<style>
    body > div > div.main > div.content > div.wrap > div.wrap1 > div > ul > li{
        float: left;padding-right: 250px;
        list-style-type: none;
    }

    body > div > div.main > div.content > div.wrap > div.bang > table > tbody > tr > td.anh > img{
        height: 130px;
        width: 180px;
    }
    body > div > div.main > div.content > div.wrap > div.bang > table > tbody > tr> td.anh{
        height: 140px;
    }
    .trang{
        float: right;
        padding-top:20px;
        background-color: whitesmoke;
    }

    body > div > div.main > div.content > div.wrap > div.trang >strong{
        border:  mediumblue solid thin;
        float :left;
        width: 30px;

    }
    body > div > div.main > div.content > div.wrap > div.bang > table > tbody > tr:hover{
        background:#cdcde4;
        transition: 0.5s;
    }
    body > div > div.main > div.content > div.wrap > div.trang > a{
        border: mediumblue solid thin;
        padding-left: 2px;
        float: left;
        min-width: 30px;
        text-align: center;
        color: black;
    }


</style>
<body>

    <div class="wrap" style="background-color: #fcfcfc ;min-height:2000px; padding-right: 10px; padding-top: 20px;width: 100%;border:#009999 solid thin ; ">
        <?php $this->load->view('admin/message', $this->data) ?>
        <div class=" wrap1">
            <div class="title">
                <ul>
                    <li><span class="glyphicon glyphicon-list-alt"></span>  <b>Danh sách thông báo</b></li>
                    <li><b>Tổng số:<b><?php echo $total_rows; ?></b> </b></li>
                </ul>
            </div>
        </div><hr><hr>

       <div>
        <form method="get" action="<?php echo admin_url('thongbao') ?>" class="list_filter form">
            <table width="80%" cellspacing="0" cellpadding="0"><tbody>

                    <tr>
                        <td style="font-size: 16px;padding-left: 20px;" ><b>Mã số
                            <input type="text" style="width:55px;" value="<?php echo $this->input->get('id') ?>" name="id"></td>

                        <td style="font-size: 16px;"><b>Tiêu đề
                            <input type="text" style="width:155px;"  value="<?php echo $this->input->get('title') ?>" name="title"></td>

                        <td style="width:150px">
                            <input type="submit" value="Tìm" class="button blueB">
                            <input type="reset" onclick="window.location.href = '<?php echo admin_url('thongbao') ?>';" value="Trở về" class="basic">
                        </td>

                    </tr>

            </table>

        </form>
    </div>



    <div class="bang" style="padding-top: 10px;">


        <table border="1" style="width: 100%;background: white;padding-top: 20px;text-align: center;">
            <thead style="color:red;">
                <tr>

                    <td style="width:7%;min-height: 70px;"><b>Mã số</td>
                    <td style="width:25%;min-height: 70px;" ><b>Ảnh</td>
                    <td style="width:10%;min-height: 50px;" ><b>Tên thông báo</td>
                    <td style="width:50%;min-height: 70px;" ><b>Nội dung</td>

                    <td style="width:15%;height: 70px;">
                        <b>Hành động
                    </td>
                </tr>
            </thead>




            <tbody>
                <!-- Filter -->


                <?php foreach ($list as $row): ?>

                    <tr>
                        <td class ="text">
                            <?php echo $row->thong_baoID; ?>
                        </td>
                        <td class="anh">
                            <img src="<?php echo base_url('upload/thongbao/' . $row->anh_tb) ?>">
                        </td>
                        <td class ="text">
                            <?php echo $row->tieu_de_tb; ?>
                        </td>
                        <td class ="text">
                            <?php echo $row->noi_dung_tb; ?>
                        </td>



                        <td class="option">
                            <a href="<?php echo admin_url('thongbao/edit/' . $row->thong_baoID); ?>"  type="button" value="Chỉnh sửa">
                                <submit type="button" class="glyphicon glyphicon-wrench"></submit>
                            </a>
                            |
                            <a style="paddding-left:8px;" href="<?php echo admin_url('thongbao/delete/' . $row->thong_baoID) ?>" >
                                <!--<input type="submit" onclick="conf()" value="Xóa">-->
                                <submit type="submit" onclick="return confirm('bạn có chắc muốn xóa không')"  class="glyphicon glyphicon-trash"></submit>
                            </a>
 
                    </tr>

                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <div class ="trang">

        <?php echo $this->pagination->create_links(); ?>
    </div>
</div>


</body>