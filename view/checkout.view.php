  <div class="main container">
    <?php if(isset($_SESSION['error'])): ?>
    <div class="row">
        <div class="col-sm-4 col-sm-offset-4">
            <div class="alert alert-danger alert-dismissible" role="alert" style="margin-top: 20px;"> <!-- alert-dismissible để chưa btn close có attr data-dismiss="alert" -->
                <a href="" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                <!-- data-dismiss="alert" bootstrap 3 cần js để hoạt động, dùng để tắt alert thông báo -->
                <?php 
                    echo $_SESSION['error'];
                    unset($_SESSION['error']);
                 ?>
            </div>
        </div>
    </div>
    <?php endif ?>

    <?php if(isset($_SESSION['success'])): ?>
    <div class="row">
        <div class="col-sm-4 col-sm-offset-4">
            <div class="alert alert-success alert-dismissible" role="alert" style="margin-top: 20px;"> <!-- alert-dismissible để chưa btn close có attr data-dismiss="alert" -->
                <a href="" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                <!-- data-dismiss="alert" bootstrap 3 cần js để hoạt động, dùng để tắt alert thông báo -->
                <?php 
                    echo $_SESSION['success'];
                    unset($_SESSION['success']);
                    unset($_SESSION['cart']);

                 ?>
            </div>
        </div>
    </div>
    <?php else: ?>
        <div class="row">
      <div class="col-main col-sm-12 col-xs-12">
        <form action="thanh-toan" method="POST">
            <div class="page-content checkout-page">
                <div class="page-title">
                  <h2>Thanh toán</h2>
                </div>
                <div class="box-border">
                    <ul>
                            <li class="row">
                                <div class="col-sm-6">
                                    <label for="full_name" class="">Họ và tên:</label>
                                    <input type="text" class="input form-control" name="full_name" id="full_name">
                                </div><!--/ [col] -->
                                <div class="col-sm-6">
                                        <label class="">Giới tính:</label>
                                        <select class="input form-control" name="gender">
                                            <option value="Nam">Nam</option>
                                            <option value="Nữ">Nữ</option>
                                            <option value="Khác">Khác</option>
                                        </select>
                                </div><!--/ [col] -->
                            </li><!--/ .row -->
                            <li class="row">
                                <div class="col-sm-6">
                                    <label for="phone">Số điện thoại:</label>
                                    <input type="text" name="phone" class="input form-control" id="phone">
                                </div><!--/ [col] -->
                                <div class="col-sm-6">
                                    <label for="email_address" class="required">Địa chỉ Email:</label>
                                    <input type="text" class="input form-control" name="email" id="email_address">
                                </div><!--/ [col] -->
                            </li><!--/ .row -->
                            <li class="row"> 
                                <div class="col-xs-6">
                                    <label for="address" class="required">Địa chỉ:</label>
                                    <input type="text" class="input form-control" name="address" id="address">
                                </div><!--/ [col] -->
                                <div class="col-xs-6">
                                    <label for="" class="required">Hình thức thanh toán:</label>
                                    <select class="input form-control" name="payment_method" id="payment">
                                            <option value="cod">Thanh toán khi nhận hàng (COD)</option>
                                            <option value="bank">Chuyển khoản qua ngân hàng</option>
                                    </select>
                                </div><!--/ [col] -->
                                <div class="col-xs-6 col-xs-offset-6" style="display:none" id="ttck">
                                    <div style="margin-left: 30px; margin-top: 30px">
                                        <p>Bạn vui lòng chuyển khoản đến tài khoản sau: </p>
                                        <p><b>Ngân hàng Agribank - Chi nhánh Quận 9</b></p>
                                        <p>Chủ tài khoản: <b>Đỗ Tiến Đại</b></p>
                                        <p>Số tài khoản: <b>0181239328235</b></p>
                                        <p>Nội dung: <b>Tên người gửi</b></p>
                                        <p>Số tiền: <b><?=number_format($data['cart']->promtPrice)?></b></p>
                                    </div>
                                </div>
                            </li><!-- / .row -->
                            <li class="row"> 
                                <div class="col-xs-12">
                                    <label for="note" class="required">Ghi chú:</label>
                                    <textarea name="note" id="note" rows="3" class="form-control"></textarea>
                                </div><!--/ [col] -->

                            </li><!-- / .row -->
                            <li>
                                    <button class="button"><a href="gio-hang" style="display: block;"><i class="fa fa-angle-double-left"></i>&nbsp; <span>Trở về giỏ hàng</span></a></button>
                            </li>
                    </ul>
                </div>
            
            <h4 class="checkout-sep last" style="margin: 30px 0px 10px;">Thông tin sản phẩm</h4>
            <div class="box-border">
            <div class="table-responsive">
                <table class="table table-bordered cart_summary">
                    <thead>
                        <tr>
                            <th class="cart_product">Hình ảnh</th>
                            <th>Tên sản phẩm</th>
                            <th>Giá gốc</th>
                            <th>Giá bán (Đã khuyến mãi)</th>
                            <th>Số lượng</th>
                            <th>Tổng tiền (Đã khuyến mãi)</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($data['cart']->items as $item): ?>
                        <tr>
                            <td class="cart_product">
                                <a href="#"><img src="public/source/images/products-images/<?=$item['item']->image?>" alt="Product"></a>
                            </td>
                            <td class="cart_description">
                                <p class="product-name"><a href="#"><?=$item['item']->name?></a></p>
                            </td>
                            <td><del><?=number_format($item['item']->price)?></del></td>
                            <td class="price"><span><?=number_format($item['item']->promotion_price)?></span></td>
                            <td class="qty">
                                <input class="form-control input-sm" type="text" value="<?=$item['qty']?>" readonly>
                              
                            </td>
                            <td class="price">
                                <span><?=number_format($item['discountPrice'])?></span>
                            </td>
                        </tr>
                        <?php endforeach ?>
                    </tbody>
                    <tfoot>
                        <tr>
                            <td colspan="2" rowspan="2"></td>
                            <td colspan="3">Tổng tiền gốc</td>
                            <td colspan="2"><?=number_format($data['cart']->totalPrice)?></td>
                        </tr>
                        <tr>
                            <td colspan="3"><strong>Tổng tiền bán (Đã khuyến mãi)</strong></td>
                            <td colspan="2"><strong><?=number_format($data['cart']->promtPrice)?></strong></td>
                        </tr>
                    </tfoot>    
                </table></div>
                <button class="button pull-right" type="submit"><span>Xác nhận thanh toán</span></button>
            </div>
        </div>
        </form>
      </div>
      
    </div>
    <?php endif ?>
  </div>
  </section>
  <!-- Main Container End -->

  <script type="text/javascript" src="public/source/js/jquery.min.js"></script>
  <script>
        $(document).ready(function() {
            $('#payment').change(function(event) {
                /* Act on the event */
                var payment = $(this).val();
                console.log(payment);
                if(payment == "bank"){
                    $("#ttck").show();
                    return false;
                }else{
                    $("#ttck").hide();
                    return false;
                }
            });
        });
  </script>