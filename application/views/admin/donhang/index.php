

<?php $this->load->view('admin/donhang/head', $this->data); ?>
<style>
    body > div > div.main > div.content > div.wrap > div.wrap1 > div > ul > li{
        float: left;padding-right: 250px;
        list-style-type: none;
    }

    body > div > div.main > div.content > div.wrap > div.bang > table > tbody > tr > td.anh > img{
        height: 130px;
    }
    body > div > div.main > div.content > div.wrap > div.bang > table > tbody > tr> td.anh{
        height: 135px;
    }
    body > div > div.main > div.content > div.wrap > div.trang{
        float: right;
        padding-top:20px;
        background-color: whitesmoke;
    }
    body > div > div.main > div.content > div.wrap > div.trang > a{
        border: mediumblue solid thin;
        padding-left: 2px;
        float: left;
        min-width: 30px;
        text-align: center;
        color: black;

    }
    body > div > div.main > div.content > div.wrap > div.trang > strong{
        border:  mediumblue solid thin;
        float :left;
        width: 30px;
    }
    body > div > div.main > div.content > div.wrap > div.bang > table > tbody > tr:hover{
        background:#cdcde4;
        transition: 0.5s;
    }
</style>

<body>


    <div class="wrap" style="background-color: #fcfcfc ;min-height:800px; padding-right: 10px; padding-top: 20px;width: 100%;border:#009999  solid thin ; ">
        <?php $this->load->view('admin/message', $this->data) ?>
        <div class=" wrap1">
            <div class="title">
                <ul>
                    <li ><span class="glyphicon glyphicon-list-alt"></span>  <b>Danh sách đơn hàng</b></li>
                    <li><b>Tổng số:<b><?php echo $total_rows; ?></b> </b></li>
                </ul>
            </div>
        </div><hr><hr>
        <thead class="filter"><tr><td colspan="6">
                    <form method="get" action="<?php echo admin_url('donhang') ?>" class="list_filter form">
                        <table  width="80%" cellspacing="0" cellpadding="0"><tbody>

                                <tr>
                                    <td style="color: black;font-size: 16px;padding-left: 20px;" >Mã số <input type="text" style="width:55px;" value="<?php echo $this->input->get('ID') ?>" name="ID"></td>
                                    <td style="color: black;font-size: 16px;padding-left: 20px;" >Tên khách hàng <input type="text" style="width:150px;" value="<?php echo $this->input->get('ten') ?>" name="ten"></td>


                                    <td style="width:150px;">
                                        <input type="submit" value="Tìm" class="button blueB">
                                        <input type="reset" onclick="window.location.href = '<?php echo admin_url('donhang') ?>';" value="Trở về" class="basic">
                                    </td>

                                </tr>
                            </tbody>
                        </table>
                    </form>


        <thead>

        <div class="bang" style="padding-top: 10px;">


            <table border="1" style="width: 100%;background: white;padding-top: 20px;text-align: center;">
                <thead style="color:red;">
                    <tr >

                        <td style="width:5%;min-height: 70px;"><b>Mã số</td>
                        <td style="width:5%;min-height: 50px;" ><b>Mã khách hàng</td>
                        <td style="width:15%;min-height: 70px;" ><b>Tên khách hàng</td>
                        <!--<td style="width:15%;min-height: 70px;" ><b>Email</td>-->
                        <td style="width:17%;min-height: 70px;" ><b>Địa chỉ</td>
                        <td style="width:12%;min-height: 70px;" ><b>Số điện thoại</td>


                        <td style="width:10%;min-height: 70px;" ><b>Tổng tiền</td>
                        <td style="width:7%;min-height: 70px;" ><b>Ngày</td>
                        <td style="width:15%;min-height: 70px;" ><b>Tình trạng</td>

                        <td style="width:5%;height: 70px;"><b>Hành động </td>


                    </tr>
                </thead>

                <tbody>


                    <!-- Filter -->


                    <?php foreach ($list as $row): ?>
                        <tr style="height:40px;">
                            <td class ="text">
                                <?php echo $row->don_hangID; ?>
                            </td>
                            <td class ="text">
                                <?php echo $row->khach_hangID; ?>
                            </td>
                            <td class ="text">
                                <?php echo $row->ten; ?>
                            </td>

                            <td class ="text">
                                <?php echo $row->dia_chi; ?>
                            </td>
                            <td class ="text">
                                <?php echo $row->sdt; ?>
                            </td>

                            <td class ="text">
                                <?php echo number_format($row->thanh_toan); ?>
                            </td>
                            <td class ="text">
                                <?php echo $row->thoi_gian; ?>
                            </td>
                            <td class="option" style="color:#000080;">
                                <?php
                                $a = $row->stt_don_hang;
                                if ($a == 0):
                                    ?>


                                    <a href="<?php echo admin_url('donhang/xuli/' . $row->don_hangID) ?>" >
                                        <button class="btn btn-success" type="button" >Xử lí ngay</button>
                                    </a>
                                <?php
                                elseif ($a == 1) :
                                   echo "<span style='color:red;'>Đã xử lí</span>";
                                endif;
                                ?>


                            </td>
                            <td class="option">

                                <a  href="<?php echo admin_url('donhang/delete/' . $row->don_hangID) ?>" >
                                    <submit type="submit" onclick="return confirm('bạn có chắc muốn xóa không')"  class="glyphicon glyphicon-trash"></submit>
                                </a>
            <!--                                <script>
                                    function conf() {
                                        return confirm("bạn có chắc muốn xóa không");
                                    }
                                </script>-->
                            </td>
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