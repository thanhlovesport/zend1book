<?php ?>
<div class="box">
        <div class="box-heading">Top Products</div>
        <div class="box-content">
          <div class="box-product">
          <?php 
            foreach ($result as $key=>$value){
                $imageURL = FILE_URL.'/products/img100x100/'.$value['picture'].'';
                $productimage = '<img src="'.$imageURL.'" />';
                $productname = $value['name'];
                if($value['selloff'] > 0){
                    $price = $value['price'].'$ - $'.$value['selloff'];
                }else{
                    $price = $value['price'].'$';
                }
                
                $filter = new Zend_Filter();
                $multiFilter = $filter->addFilter(new Zend_Filter_StringToLower(array('encoding'=>'UTF-8')))
                ->addFilter(new Zend_Filter_Alnum(true))
                ->addFilter(new Zend_Filter_PregReplace(array('match'=>'#\s+#','replace'=>'-')))
                ->addFilter(new Zend_Filter_Word_SeparatorToDash())
                ->addFilter(new Zendvn_Filter_RemoveCircumflex());
                
                $linkDetail = $view->baseURL('/shopping/index/detail/cid/'.$value['cat_id'].'/tcat/'.$filter->filter($value['category_name']).'/id/'.$value['id'].'/title/'.$filter->filter($value['name']).'');
                // cid: checkid, tcat: title category
          ?>
            <div>
              <div class="image"><a href="<?php echo $linkDetail;?>"><?php echo $productimage?></a></div>
              <div class="name"><a href="<?php echo $linkDetail;?>"><?php echo $productname;?></a></div>
              <div class="price"> <span class="price-old"></span> <span class="price-new"><?php echo $price;?></span> </div>
              <div class="rating"><img src="<?php echo $view->ImageURL;?>/stars-0.png" alt="Based on 0 reviews." /></div>
              <div class="cart">
                <input type="button" value="Add to Cart" onClick="addToCart('42');" class="button" />
              </div>
            </div>
            <?php }?>
          </div>
        </div>
      </div>