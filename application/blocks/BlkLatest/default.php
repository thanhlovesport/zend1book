 <div class="box">
        <div class="box-heading">Latest</div>
        <div class="box-content">
          <div class="box-product">
           <?php 
            foreach($result as $key=>$value){
                $imageURL = FILE_URL.'/products/img100x100/'.$value['picture'].'';
                $productimage = '<img src="'.$imageURL.'" />';
                $productname = $value['name'];
                $price = $value['price'];
                
                $filter = new Zend_Filter();
                $multiFilter = $filter->addFilter(new Zend_Filter_StringToLower(array('encoding'=>'UTF-8')))
                ->addFilter(new Zend_Filter_Alnum(true))
                ->addFilter(new Zend_Filter_PregReplace(array('match'=>'#\s+#','replace'=>'-')))
                ->addFilter(new Zend_Filter_Word_SeparatorToDash())
                ->addFilter(new Zendvn_Filter_RemoveCircumflex());
                
                $linkDetail = $view->baseURL('/shopping/index/detail/cid/'.$value['cat_id'].'/tcat/'.$filter->filter($value['category_name']).'/id/'.$value['id'].'/title/'.$filter->filter($value['name']).'');
            ?>
            <div>
              <div class="image"><a href="<?php echo $linkDetail;?>"><?php echo $productimage?></a></div>
              <div class="name"><a href="product.html"><?php echo $productname;?></a></div>
              <div class="price"><?php echo $price;?> </div>
              <div class="rating"><img src="<?php echo $view->ImageURL;?>/stars-3.png" alt="Based on 1 reviews." /></div>
            </div>
            <?php 
                }
            ?>
          </div>
        </div>
      </div>
