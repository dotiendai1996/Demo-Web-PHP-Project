  <!-- Main Container -->
  <section class="main-container col1-layout">
    <div class="main container">
      <div class="col-main">
        <div class="cart">
          <?php if($data['cart'] == null):  ?>
          <div class="page-content page-order">
            <div class="page-title" style="text-align: center;">
            <h2>Giỏ hàng rỗng</h2>
            <div class="cart_navigation"> 
                <a class="continue-btn" href="./"><i class="fa fa-arrow-left"> </i>&nbsp; Tiếp tục mua hàng</a>
            </div>
          </div>
          <?php else: ?>
          <div class="page-content page-order"><div class="page-title">
            <h2>Giỏ hàng của bạn</h2>
          </div>
            <div class="order-detail-content">
              <div class="table-responsive">
                <table class="table table-bordered cart_summary">
                  <thead>
                    <tr>
                      <th class="cart_product">Hình ảnh</th>
                      <th>Tên sản phẩm</th>
                      <th>Đơn giá gốc</th>
                      <th>Đơn giá khuyến mãi</th>
                      <th>Số lượng</th>
                      <th>Tổng tiền</th>
                      <th  class="action"><i class="fa fa-trash-o"></i></th>
                    </tr>
                  </thead>
                  <tbody class="body-item">
                    <?php foreach($data['cart']->items as $item): ?>
                    <tr class="del-<?=$item['item']->id?>">
                      <td class="cart_product"><a href="#"><img src="public/source/images/products-images/<?=$item['item']->image?>" alt="Product"></a></td>
                      <td class="cart_description"><p class="product-name"><a href="#"><?=$item['item']->name?> </a></p>
                        <td>
                            <del style="color: darkgray; font-weight: 300;"><?=number_format($item['item']->price)?></del> <br>      
                        </td>
                        <td class="price">
                            <?php if($item['item']->promotion_price != 0): ?>
                            <span><?=number_format($item['item']->promotion_price)?></span>
                            <?php endif ?>
                        </td>
                      <td class="qty">
                        <input class="form-control input-sm txtQty" type="text" value="<?=$item['qty']?>" data-id="<?=$item['item']->id?>">
                      </td>
                      <td class="change-<?=$item['item']->id?> price">   
                            <span ><?=number_format($item['discountPrice'])?></span>
                      </td>
                      <td class="action"><a style="cursor: pointer;" data-id="<?=$item['item']->id?>"><i class="icon-close"></i></a></td>
                    </tr>
                  <?php endforeach ?>
                  </tbody>
                  <tfoot>
                    <tr>
                      <td colspan="2" rowspan="2"></td>
                      <td colspan="3">Tổng giá tiền gốc: </td>
                      <td colspan="2" id="totalPrice"><?=number_format($data['cart']->totalPrice)?></td>
                    </tr>
                    <tr>
                      <td colspan="3"><strong>Tổng giá tiền thanh toán:</strong></td>
                      <td colspan="2"><strong id="promtPrice"><?=number_format($data['cart']->promtPrice)?></strong></td>
                    </tr>
                  </tfoot>
                </table>
              </div>
              <div class="cart_navigation"> 
                <a class="continue-btn" href="./">
                  <i class="fa fa-arrow-left"> </i>&nbsp; Tiếp tục mua hàng
                </a>
                <form action="thanh-toan" method="POST">
                   <button type="submit" class="checkout-btn" style="float: right; 
                   background: #fe0100; color: #fff; border: 2px solid #fe0100; border-radius: 50px; 
                   font-size: 16px; font-weight: bold; 
                   text-transform: uppercase; padding: 10px 30px;" 
                   name="gotoCheckout"><i class="fa fa-check"></i> Thanh toán</button>
                </form>
                 <a href="thanh-toan" class="checkout-btn"><i class="fa fa-check"></i>Thanh toán 2</a>
              </div>
              </div>
          </div>
          <?php endif ?>
        </div>
      </div>
    </div>
  </section>

  <script>
    $(document).ready(function() {
      var timeout = null;
        $('.txtQty').keyup(function(event) {
          /* Act on the event */
        
          var qty = $(this).val();
          if(isNaN(qty)){
            alert('Vui lòng nhập số.')
            $(this).val(1)
          //  $(this).focus()
            qty = 1;
            //return false;
          }
          if(parseInt(qty)===0 ) {
            alert('Vui lòng nhập số lượng lớn hơn 0.')
            $(this).val(1)
          //  $(this).focus()
            qty = 1;
            //return false;
          }
          if(qty=='') {
            $(this).focus()
            return false;
          }

          var idSP = $(this).attr('data-id');
          clearTimeout(timeout);

         // console.log(idSP);
          timeout = setTimeout(function() {
           // console.log(qty);
           $.ajax({
             url: 'shopping_cart.php',
             type: 'POST',
              dataType: 'json',
             data: {
              idSP:idSP, 
              qty:qty,
              action:'update'
             },
           })
           .done(function(res) {
             $('.cart-total').html(res.data.cart_header);
             $('#promtPrice').html(res.data.promtPrice);
             $('#totalPrice').html(res.data.totalPrice);
             $('.change-'+idSP+' span').html(res.data.discountPrice);
             console.log(res);
           })
           .fail(function() {
             console.log("error");
           });
           
          }, 1100);
        });


        $('.action a').click(function(event) {
          /* Act on the event */
          var idSP = $(this).attr('data-id');
          //alert(idSP);
          $.ajax({
            url: 'shopping_cart.php',
            type: 'POST',
            dataType: 'json',
            data: {idSP:idSP,
                  action:'delete'},
          })
          .done(function(res) {
             $('.cart-total').html(res.data.cart_header);
             $('#promtPrice').html(res.data.promtPrice);
             $('#totalPrice').html(res.data.totalPrice);
             $('.del-'+idSP+'').remove();
             if($('.body-item').find('tr').length==0){

               $('.order-detail-content').remove();
               $('.page-title').attr('style', 'text-align: center');
               $('.page-title').html('<h2>Giỏ hàng rỗng</h2><div class="cart_navigation"><a class="continue-btn" href="./"><i class="fa fa-arrow-left"></i>&nbsp; Tiếp tục mua hàng</a></div>');
               
             }

             console.log(res.data.cart_header);
          })
          .fail(function() {
            console.log("error");
          });
          
        });
    });
  </script>