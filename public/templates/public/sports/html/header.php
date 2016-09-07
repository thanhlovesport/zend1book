 <div id="header">
    <!-- Top Right part Links-->
    <div id="welcome">
      <div id="language">Language
        <ul>
          <li><a title="English"><img src="<?php echo $this->ImageURL;?>/flags/gb.png" alt="English" />English</a></li>
        </ul>
      </div>
      <div id="currency">Currency
        <ul>
          <li><a title="US Dollar"><b>$ - US Dollar</b></a></li>
          <li><a title="Euro">€ - Euro</a></li>
          <li><a title="Pound Sterling">£ - Pound Sterling</a></li>
        </ul>
      </div>
      <div class="links">My Account
        <ul>
          <li><a href="#">My Account</a></li>
          <li><a href="#" id="wishlist-total">Wish List (0)</a></li>
          <li><a href="cart.html">Shopping Cart</a></li>
          <li><a href="checkout.html">Checkout</a></li>
        </ul>
      </div>
      <a href="login.html">login</a> <a href="register.html">create an account</a> </div>
    <div id="logo"><a href="index-2.html"><img src="<?php echo $this->ImageURL;?>/logo.png" title="ecommerce Html Template" alt="ecommerce Html Template" /></a></div>
    <div id="search">
      <div class="button-search"></div>
      <input type="text" value="" placeholder="" id="filter_name" name="search">
    </div>
    <!--Mini Cart Start-->
    <div id="cart">
      <div class="heading">
        <h4><img width="32" height="32" alt="small-cart-icon" src="<?php echo $this->ImageURL;?>/cart-bg.png"></h4>
        <a><span id="cart-total">0 item(s) - $0.00</span></a></div>
      <div class="content">
        <div class="mini-cart-info">
          <table>
            <tbody>
              <tr>
                <td class="image"><a href="product.html"><img title="Chair Swing" alt="Chair Swing" width="43" height="43" src="<?php echo $this->ImageURL;?>/product/samsung_tab_1-60x60.jpg"></a></td>
                <td class="name"><a href="product.html">Chair Swing</a></td>
                <td class="quantity">x&nbsp;1</td>
                <td class="total">$236.99</td>
                <td class="remove"><img title="Remove" alt="Remove" src="<?php echo $this->ImageURL;?>/remove-small.png"></td>
              </tr>
              <tr>
                <td class="image"><a href="product.html"><img title="Eyewear Eyeglasses" alt="Eyewear Eyeglasses" width="43" height="43" src="<?php echo $this->ImageURL;?>/product/apple_cinema_30-60x60.jpg"></a></td>
                <td class="name"><a href="product.html">Eyewear Eyeglasses</a></td>
                <td class="quantity">x&nbsp;1</td>
                <td class="total">$119.50</td>
                <td class="remove"><img title="Remove" alt="Remove" src="<?php echo $this->ImageURL;?>/remove-small.png"></td>
              </tr>
              <tr>
                <td class="image"><a href="product.html"><img title="Nail Polish" alt="Nail Polish" width="43" height="43" src="<?php echo $this->ImageURL;?>/product/hp_1-60x60.jpg"></a></td>
                <td class="name"><a href="product.html">Nail Polish</a></td>
                <td class="quantity">x&nbsp;1</td>
                <td class="total">$119.50</td>
                <td class="remove"><img title="Remove" alt="Remove" src="<?php echo $this->ImageURL;?>/remove-small.png"></td>
              </tr>
            </tbody>
          </table>
        </div>
        <div class="mini-cart-total">
          <table>
            <tbody>
              <tr>
                <td class="right"><b>Sub-Total:</b></td>
                <td class="right">$399.99</td>
              </tr>
              <tr>
                <td class="right"><b>Eco Tax (-2.00):</b></td>
                <td class="right">$6.00</td>
              </tr>
              <tr>
                <td class="right"><b>VAT (17.5%):</b></td>
                <td class="right">$70.00</td>
              </tr>
              <tr>
                <td class="right"><b>Total:</b></td>
                <td class="right">$475.99</td>
              </tr>
            </tbody>
          </table>
        </div>
        <div class="checkout"><a href="cart.html" class="button">View Cart</a> &nbsp; <a href="checkout.html" class="button">Checkout</a></div>
      </div>
    </div>
    <!--Mini Cart End-->
  </div>