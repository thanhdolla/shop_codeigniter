<?php $this->load->view('admin/nhaphang/head', $this->data); ?>
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

    <div class="wrap" style="background-color: #fcfcfc ;min-height:800px; padding-right: 10px; padding-top: 10px;width: 100%;border:#009999 solid thin ; ">
        <?php $this->load->view('admin/message', $this->data) ?>
        <div class=" wrap1">
            <div class="title">
                <ul>
                    <li > <span class="glyphicon glyphicon-list-alt"></span> <b>Danh sách nhập hàng</b></li>
                    <li><b>Tổng số:<b><?php echo $total_rows; ?></b> </b></li>
                </ul>
            </div><hr><hr>
        </div>

        <thead ><td colspan="6">
            <form method="get" action="<?php echo admin_url('nhaphang') ?>" class="list_filter form">
                <table width="80%" "cellspacing="0" cellpadding="0"><tbody>

                        <tr>
                            <td style="font-size: 16px;padding-left: 20px;" >Mã số
                                <input type="text" style="width:55px;" value="<?php echo $this->input->get('id') ?>" name="id"></td>

                            <td style="font-size: 16px;">Tiêu đề
                                <input type="text" style="width:155px;"  value="<?php echo $this->input->get('title') ?>" name="title"></td>

                            <td style="width:150px">
                                <input type="submit" value="Tìm" class="button blueB">
                                <input type="reset" onclick="window.location.href = '<?php echo admin_url('nhaphang') ?>';" value="Trở về" class="basic">
                            </td>

                        </tr>

                </table>
            </form>
            </thead>


            <div class="bang" style="padding-top: 10px;">


                <table border="1" style="width: 100%;background: white;padding-top: 20px;text-align: center;">
                    <thead style="color:red;">
                        <tr>

                            <td style="width:5%;height: 70px;"><b>Mã số</td>
                            <td style="width:15%;height: 70px;"><b>Tên sản phẩm</td>
                            <td style="width:5%;height: 70px;"><b>Số lượng</td>
                            <td style="width:12%;height: 70px;"><b>Giá</td>
                            <td style="width:15%;height: 70px;"><b>Tên nhà cung cấp</td>
                            <td style="width:12%;height: 70px;"><b>Điện thoại</td>
                            <td style="width:12%;height: 70px;"><b>Bảo hành</td>

                            <td style="width:10%;height: 70px;"><b>Thời gian</td>
                            <td style="width:10%;height: 70px;"><b>Hành động</td>
                        </tr>
                    </thead>

                    <tbody>
                        <!-- Filter -->
                        <?php foreach ($list as $row): ?>
                            <tr>
                                <td class ="text">
                                    <?php echo $row->nhap_hangID; ?>
                                </td>
                                <td class ="text">
                                    <?php echo $row->ten_sp; ?>
                                </td>
                                <td class ="text">
                                    <?php echo $row->so_luong; ?>
                                </td>
                                <td class ="text">
                                    <?php echo $row->gia; ?>
                                </td>
                                <td class ="text">
                                    <?php echo $row->nha_cung_cap; ?>
                                </td>
                                <td class ="text">
                                    <?php echo $row->sdt_ncc; ?>
                                </td>
                                <td class ="text">
                                    <?php echo $row->bao_hanh; ?>
                                </td>
                                <td class ="text">
                                    <?php echo $row->thoi_gian; ?>
                                </td>
                                <td class="option">
                                <a href="<?php echo admin_url('nhaphang/edit/' . $row->nhap_hangID); ?>"  type="button" value="Chỉnh sửa">
                                    <submit type="button" class="glyphicon glyphicon-wrench"></submit>
                                </a>
                                |
                                <a style="paddding-left:8px;" href="<?php echo admin_url('nhaphang/delete/' . $row->nhap_hangID) ?>" >
                                    <submit type="submit" onclick="return confirm('bạn có chắc muốn xóa không')"  class="glyphicon glyphicon-trash"></submit>
                                </a>
                            </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
    </div>
</body>