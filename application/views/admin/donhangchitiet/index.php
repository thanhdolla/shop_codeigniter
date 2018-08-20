

<?php $this->load->view('admin/donhangchitiet/head', $this->data); ?>
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
        border: #009999 solid thin;
        padding-left: 2px;
        float: left;
        min-width: 30px;
        text-align: center;
        color: black;

    }
    body > div > div.main > div.content > div.wrap > div.trang > strong{
        border:  #009999 solid thin;
        float :left;
        width: 30px;
    }
    body > div > div.main > div.content > div.wrap > div.bang > table > tbody > tr:hover{
        background:#cdcde4;
        transition: 0.5s;
    }
</style>

<body>


    <div class="wrap" style="background-color: #fcfcfc ;min-height:800px; padding-right: 10px; padding-top: 20px;width: 100%;border:#009999 solid thin ; ">
        <?php $this->load->view('admin/message', $this->data) ?>
        <div class=" wrap1">
            <div class="title">
                <ul>
                    <li ><span class="glyphicon glyphicon-list-alt"></span>  <b>Chi tiết đơn hàng</b></li>
                    <li><b>Tổng số:<b><?php echo $total_rows; ?></b> </b></li>
                </ul>
            </div>
        </div><hr><hr>
        <thead class="filter"><tr><td colspan="6">
                    <form method="get" action="<?php echo admin_url('donhangchitiet') ?>" class="list_filter form">
                        <table  width="80%" cellspacing="0" cellpadding="0"><tbody>

                                <tr>
                                    <td style="color: black;font-size: 16px;padding-left: 20px;" >Mã số <input type="text" style="width:55px;" value="<?php echo $this->input->get('ID') ?>" name="ID"></td>
                                    <td style="color: black;font-size: 16px;padding-left: 20px;" >Mã đơn hàng<input type="text" style="width:55px;" value="<?php echo $this->input->get('ma_dh') ?>" name="ma_dh"></td>


                                    <td style="width:150px;">
                                        <input type="submit" value="Tim">
                                        <input type="reset" onclick="window.location.href = '<?php echo admin_url('donhangchitiet') ?>';" value="Trở về" class="basic">
                                    </td>

                                </tr>
                            </tbody>
                        </table>
                    </form>


        <thead>

        <div class="bang" style="padding-top: 10px;">


            <table border="1" style="width: 100%;background: white;padding-top: 20px;text-align: center;">
                <thead style="color:red;">
                    <tr style="height:70px;">

                        <td style="width:10%;min-height: 70px;"><b>Mã số</td>
                        <td style="width:15%;min-height: 50px;" ><b>Mã đơn hàng</td>
                        <td style="width:15%;min-height: 70px;" ><b>Mã sản phẩm</td>
                        <td style="width:15%;min-height: 70px;" ><b>Số lượng</td>
                        <td style="width:20%;min-height: 70px;" ><b>Giá một sản phẩm</td>
                        <td style="width:15%;min-height: 70px;" ><b>Tình trạng</td>
                    </tr>
                </thead>

                <tbody>


                    <!-- Filter -->


                    <?php foreach ($list as $row): ?>
                        <tr style="height: 40px;">
                            <td class ="text">
                                <?php echo $row->don_hang_chi_tietID; ?>
                            </td>
                            <td class ="text">
                                <?php echo $row->don_hangID; ?>
                            </td>
                            <td class ="text">
                                <?php echo $row->san_phamID; ?>
                            </td>
                            <td class ="text">
                                <?php echo $row->so_luong; ?>
                            </td>
                            <td class ="text">
                                <?php echo $row->tinh_tien; ?>
                            </td>
                    <!--<td class="option">-->


                            <td class="option">

                                <p style="color:#008080; padding-top:10px;">

                                    <?php
                                    $a = $row->stt_don_hang_chi_tiet;
                                    if ($a == 0):
                                        echo "<span style='color:red;'>Chưa xử lí</span>";
                                    elseif ($a == 1) :
                                        echo "Đã giao hàng";
                                    endif;
                                    ?>
                                </p>

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