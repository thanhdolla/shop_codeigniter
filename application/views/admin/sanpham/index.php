

<?php $this->load->view('admin/sanpham/head', $this->data); ?>
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


    <div class="wrap" style="background-color: #fcfcfc ;min-height:800px; padding-right: 10px; padding-top: 20px;width: 100%;border:#009999 solid thin ; ">
        <?php $this->load->view('admin/message', $this->data) ?>
        <div class=" wrap1">
            <div class="title">
                <ul>
                    <li ><span class="glyphicon glyphicon-list-alt"></span>  <b>Danh sách sản phẩm</b></li>
                    <li><b>Tổng số:<b><?php echo $total_rows; ?></b> </b></li>
                </ul>
            </div>
        </div><hr><hr>
        <thead class="filter"><tr><td colspan="6">
                    <form method="get" action="<?php echo admin_url('sanpham') ?>" class="list_filter form">
                        <table  width="80%" cellspacing="0" cellpadding="0"><tbody>

                                <tr>
                                    <td style="color: black;font-size: 16px;padding-left: 20px;" >Mã số <input type="text" style="width:55px;" value="<?php echo $this->input->get('ID') ?>" name="ID"></td>

                                    <td style="color: black;font-size: 16px;" >Tên <input type="text" style="width:150px;"  value="<?php echo $this->input->get('ten') ?>" name="ten"></td>

                                    <td style="width:60px;font-size: 16px;" >Thể loại</td>
                                    <td class="item">
                                        <select name="hang_san_pham">
                                            <option value=""></option>
                                            <!-- kiem tra danh muc co danh muc con hay khong -->
                                            <?php foreach ($hang as $row): ?>
                                                <?php if (count($row->subs) > 1): ?>
                                                    <optgroup label="<?php echo $row->ten_hang_sp ?>">
                                                        <?php foreach ($row->subs as $sub): ?>
                                                            <option value="<?php echo $sub->hang_spID ?>" <?php echo ($this->input->get('hang_san_pham') == $sub->hang_spID) ? 'selected' : '' ?>> <?php echo $sub->ten_hang_sp ?> </option>
                                                        <?php endforeach; ?>
                                                    </optgroup>
                                                <?php else: ?>
                                                    <option value="<?php echo $row->hang_spID ?>" <?php echo ($this->input->get('hang_san_pham') == $row->hang_spID) ? 'selected' : '' ?>><?php echo $row->ten_hang_sp ?></option>
                                                <?php endif; ?>
                                            <?php endforeach; ?>
                                        </select>
                                    </td>

                                    <td style="width:150px;">
                                        <input type="submit" value="Tìm" class="button blueB">
                                        <input type="reset" onclick="window.location.href = '<?php echo admin_url('sanpham') ?>';" value="Trở về" class="basic">
                                    </td>

                                </tr>
                            </tbody></table>
                    </form>
                </td></tr></thead>

        <thead>

        <div class="bang" style="padding-top: 10px;">


            <table border="1" style="width: 100%;background: white;padding-top: 20px;text-align: center;">
                <thead style="color:red;">
                    <tr>

                        <td style="width:10%;min-height: 70px;"><b>Mã số</td>
                        <td style="width:30%;min-height: 50px;" ><b>Ảnh</td>
                        <td style="width:20%;min-height: 70px;" ><b>Tên sản phẩm</td>
                        <td style="width:20%;min-height: 70px;" ><b>Giá</td>

                        <td style="width:20%;height: 70px;">
                            <b>Hành động
                        </td>
                    </tr>
                </thead>

                <tbody>


                    <!-- Filter -->


                    <?php foreach ($list as $row): ?>
                        <tr>
                            <td class ="text">
                                <?php echo $row->san_phamID; ?>
                            </td>
                            <td class ="anh">
                                <img src="<?php echo base_url('upload/sanpham/' . $row->anh_sp) ?>">

                            </td>
                            <td class ="text">
                                <?php echo $row->ten_sp; ?>
                            </td>
                            <td class ="text">
                                <?php $price_new = $row->gia_sp - $row->khuyen_mai ?>
                                <p class="gia">
                                    <?php if ($row->khuyen_mai > 0): ?>
                                <p style="color:red"><?php echo number_format($price_new) ?>Đ
                                    <p style="text-decoration:line-through;"><?php echo number_format($row->gia_sp); ?>Đ</p>
                                <?php else: ?>
                                    <p style="color:red"><?php echo number_format($row->gia_sp); ?>Đ</p>
                                <?php endif; ?>
                            </td>

                            <td class="option">
                                <a href="<?php echo admin_url('sanpham/edit/' . $row->san_phamID); ?>"  type="button" value="Chỉnh sửa">
                                    <submit type="button" class="glyphicon glyphicon-wrench"></submit>
                                </a>
                                |
                                <a style="paddding-left:8px;" href="<?php echo admin_url('sanpham/delete/' . $row->san_phamID) ?>" >
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