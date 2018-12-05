<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

<?php foreach($data['products'] as $product): ?>
<li class="item col-lg-4 col-md-4 col-sm-6 col-xs-6 type-product-<?=$product->id_type?>">
  <div class="product-item">
    <div class="item-inner">
      <div class="product-thumbnail">
        <?php if($product->promotion_price !=0): ?>
        <div class="icon-sale-label sale-left">Sale</div>
        <?php endif ?>
        <?php if($product->new ==1): ?>
        <div class="icon-new-label new-right">New</div>
        <?php endif ?>
        <div class="pr-img-area">
          <a title="<?=$product->name?>" href="<?=$product->id.'-'.$product->url.'.html'?>">
            <figure>
              <img class="first-img" src="public/source/images/products/img02.jpg" alt="">
              <img class="hover-img" src="public/source/images/products-images/<?=$product->image?>" alt="">
            </figure>
          </a>
          <button type="button" class="add-to-cart-mt" data-id="<?=$product->id?>">
            <i class="fa fa-shopping-cart"></i>
            <span>Thêm vào giỏ hàng</span>
          </button>
        </div>

      </div>
      <div class="item-info">
        <div class="info-inner">
          <div class="item-title">
            <a title="<?=$product->name?>" href="<?=$product->id.'-'.$product->url.'.html'?>"><?=$product->name?></a>
          </div>
          <div class="item-content">

            <div class="item-price">
              <div class="price-box">
                <?php if($product->promotion_price !=0): ?>
                <p class="special-price">
                  <span class="price-label">Giá bán:</span>
                  <span class="price"><?=number_format($product->promotion_price)?></span>
                </p>
                <p class="old-price">
                  <span class="price-label">Giá gốc:</span>
                  <span class="price"><?=number_format($product->price)?></span>
                </p>
                <?php else: ?>
                <p class="special-price">
                  <span class="price-label">Giá bán:</span>
                  <span class="price"><?=number_format($product->price)?></span>
                </p>                    
                <?php endif ?>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</li>
<?php endforeach ?>

  <script>
      $(document).ready(function() {
        $('.add-to-cart-mt').click(function(event) {
            var idSP = $(this).attr('data-id');
          /* Act on the event */
          $.ajax({
            url: 'shopping_cart.php',
            type: 'POST',
            dataType: 'json',//'default: Intelligent Guess (Other values: xml, json, script, or html)',
            data: {idSP},
          })
          .done(function(res) {
           var message = res.message;
          //$('.rs-modal').text(message);
          // $('#exampleModal').modal('show');
          swal({ //sweetalert
                title: "",
                text: message,
                icon: "success",
                button: "Đóng",
              });

          $('.cart-total').html(res.data);
          })
          .fail(function() {
            console.log("error");
          })
          
        });
      });
  </script>