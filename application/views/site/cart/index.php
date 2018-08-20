<style>table#cart_ccontents td{padding:10px;border:1px solid #ccc}</style>

<div class="box-center"><!-- The box-center product-->
    <div class="tittle-box-center">
        <h2>Thông tin giỏ hàng (Có <?php echo $total_items ?> sản phẩm)</h2>
    </div><hr></hr>
    
    <div class="box-content-center product"><!-- The box-content-center -->
        <?php if ($total_items > 0): ?>
            <form action="<?php echo base_url('cart/update') ?>" method="post">
                <table id="cart_ccontents" style="width:700px;margin-top: 30px;">
                    <thead style="text-align:center;color: red;padding-left: 5px;">
                    <th style="text-align:center;">Sản phẩm</th>
                    <th style="text-align:center;">Giá </th>
                    <th style="text-align:center;">Số lượng</th>
                    <th style="text-align:center;">Tổng tiền</th>
                    <th style="text-align:center;">Xóa</th>
                    </thead>
                    <tbody style="text-align:center;color:black;">
                        <?php $tong_tien = 0; ?>
                        <?php foreach ($giohang as $row): ?>
                            <?php $tong_tien = $tong_tien + $row['subtotal']; ?>
                            <tr>
                                <td style="width:25%;">
                                    <?php echo $row['name']; ?>
                                </td>
                                <td>
                                    <?php echo number_format($row['price']); ?>đ
                                </td>
                                <td>
                                    <input name="qty_<?php echo $row['id'] ?>" value="<?php echo $row['qty']; ?>" size="2"/>
                                </td>
                                <td>
                                    <?php echo number_format($row['subtotal']); ?>đ
                                </td>
                                <td><a href="<?php echo base_url('cart/delete/' . $row['id']) ?>">Xóa</a></td>
                            </tr>
                        <?php endforeach; ?>

                        <tr>
                            <td colspan="5" style="padding-left: 5px;">
                                Thành tiền: <b style="padding-right: 100px;color:red"><?php echo number_format($tong_tien) ?>đ</b>
                                 <a style="width:30px;color: black;"href="<?php echo base_url('cart/delete') ?>">
                                    <input  class="btn btn-danger" type="button" value="Xóa tất cả"> </a>
                                <!--type= button k phải submit;-->
                            </td>
                        </tr>
                        
                        <tr>
                            <td colspan="5" style="padding-left: 5px;">
                                <button class="btn btn-success" type="submit">Cập nhât</button> 
                                   <a style=" margin-left: 500px;width:30px;color: black;"href="<?php echo site_url('dathang/form') ?>">
                                     
                            <input  class="btn btn-success" type="button" value="Đặt hàng"> </a>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </form>
        <?php else: ?>
            <h4>Hiện chưa có sản phẩm nào trong giỏ hàng</h4>
        <?php endif; ?>
    </div>
</div>