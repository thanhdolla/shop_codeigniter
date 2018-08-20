

<?php $this->load->view('admin/hangsp/head', $this->data); ?>
<style>
    body > div > div.main > div.content > div.wrap > div.wrap1 > div > ul > li{
        float: left;padding-right: 230px;
        list-style-type: none;
    }
    body > div> div.main > div.content > div.wrap > div.bang > table > tbody > tr> td{
        height: 50px;
    }
     body > div > div.main > div.content > div.wrap > div.bang > table > tbody > tr:hover{
        background:#cdcde4;
        transition: 1s;
    }
</style>
<body>

     <div class="wrap" style="background-color: #fcfcfc ;min-height:800px; padding-right: 10px; padding-top: 20px;width: 100%;border:#009999  solid thin ; ">
        <?php $this->load->view('admin/message', $this->data) ?>
        <div class=" wrap1">
            <div class="title">
                <ul>
                    <li ><span class="glyphicon glyphicon-list-alt"></span>  <b>Hãng sản phẩm hiện có</b></li>
                    <li><b>Tổng số:<b><?php echo count($list); ?></b> </b></li>
                </ul>
            </div>
        </div></br>

        <div class="bang" style="padding-top: 10px;">


            <table border="1" style="width: 100%;background: white;padding-top: 20px;text-align: center;">
                <thead style="color:red;">
                    <tr>

                        <td style="width:10%;height: 70px;"><b>Mã số</td>
                        <td style="width:70%;height: 70px;" ><b>Tên hãng</td>
                        <td style="width:10%;height: 70px;"><b>Hành động</td>
                        
                    </tr>
                </thead>

                <tbody>
                    <!-- Filter -->
                    <?php foreach ($list as $row): ?>
                        <tr  style="height: 40px;">
                            <td class ="text">
                                <?php echo $row->hang_spID; ?>
                            </td>
                            <td class ="text">
                                <?php echo $row->ten_hang_sp; ?>
                            </td>
                           
                            <td class="option">
                                <a  href="<?php echo admin_url('hangsp/edit/' . $row->hang_spID) ?>"  type="button" value="Chỉnh sửa">
                                    <submit type="button" class="glyphicon glyphicon-wrench"></submit>
                                </a>
                                    |
                                <a style="paddding-left:8px;" href="<?php echo admin_url('hangsp/delete/' . $row->hang_spID) ?>" >
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
    </div>
</body>