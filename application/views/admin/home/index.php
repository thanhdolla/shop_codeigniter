

<style>
    body > div > div.main > div.content > div.wrap > div.wrap1 > div > ul > li{
        float: left;padding-right: 250px;
        list-style-type: none;
    }
    body > div> div.main > div.content > div.wrap > div.bang > table > tbody > tr> td{
        height: 50px;
    }
    body > div > div.main > div.content > div.wrap > div.bang > table > tbody > tr:hover{
        background:#cdcde4;
        transition: 0.5s;
    }
</style>
<body>

    <div class="wrap" style="background-color: #fcfcfc ;min-height:800px; padding-right: 10px; padding-top: 20px;width: 100%;border:black solid thin ; ">

        <div class=" wrap1">
            <div class="title">
                <ul>
                    <li ><b>Thống kê dữ liệu</b></li>
                </ul>
            </div>
        </div><hr><hr>

        <div class="bang" style="padding-top: 10px;">

            <table border="1" style="width: 90%;background: white;padding-top: 20px;text-align: center;margin-left: 50px;">
                <thead style="color:red;">
                    <tr>

                        <td style="width:40%;height: 70px;"><b>Thống kê dữ liệu</td>
                        <td style="width:30%;height: 70px;" ><b>Xem chi tiết</td>
                        <td style="width:30%;height: 70px;" ><b>Số lượng</td>

                    </tr>
                </thead>

                <tbody>
                    <tr style="height: 40px;">
                        <td>
                            <div class="left">Tổng số đơn hàng</div>

                        </td>
                        <td>

                            <div ><a href="<?php echo admin_url('donhang') ?>">Chi tiết</a></div>
                        </td>

                        <td class="textC webStatsLink">
                            <?php echo count($listdh) ?>			</td>
                    </tr>

                   

                    <tr style="height: 40px;">
                        <td>
                            <div class="left">Tổng số thông báo</div>

                        </td>
                        <td>

                            <div ><a href="<?php echo admin_url('thongbao') ?>">Chi tiết</a></div>
                        </td>

                        <td class="textC webStatsLink">
                            <?php echo count($listtb) ?>					</td>
                    </tr>

                    <tr style="height: 40px;">
                        <td>
                            <div class="left">Tổng số thành viên</div>

                        </td>
                        <td>
                            <div ><a href="<?php echo admin_url('thanhvien') ?>">Chi tiết</a></div>
                        </td>

                        <td class="textC webStatsLink">
                            <?php echo count($listkh) ?>					</td>
                    </tr>


                </tbody>
            </table>
        </div>
    </div>
</body>