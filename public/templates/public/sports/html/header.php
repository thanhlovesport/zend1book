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
    <?php echo $this->blkcart();?>
    <!--Mini Cart End-->
  </div>