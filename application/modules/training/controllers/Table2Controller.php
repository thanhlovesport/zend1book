<?php
    class Training_Table2Controller extends Zendvn_Controller_Action{
        
        public function init(){
            $this->_helper->layout()->disableLayout();
            $this->_helper->viewRenderer->setNoRender();
        }
        public function indexAction(){
           echo '<br>'.__METHOD__;
           $tablegroup = new Training_Model_GroupMap();
           
           $id = 2;
           $row = $tablegroup->find($id);
           $group = $row->current(); 
           
           $userbyGroup = $group->findDependentRowset('Training_Model_UserMap');
           echo "<pre>";
           print_r($userbyGroup->toArray());
           echo "</pre>";
        }
        
        public function index2Action(){
            echo '<br>'.__METHOD__;
            $tableuser = new Training_Model_UserMap();
             
            $id = 1;
            $row = $tableuser->find($id);
            $user = $row->current();
             
            $productbyUser = $user->findDependentRowset('Training_Model_ProductsMap');
            //            $productbyUser = $user->findTraining_Model_ProductsMap();
            
            echo "<pre>";
            print_r($productbyUser->toArray());
            echo "</pre>";
        }
        public function index3Action(){
            echo '<br>'.__METHOD__;
            $tableuser = new Training_Model_UserMap();
             
            $id = 2;
            $row = $tableuser->find($id);
            $user = $row->current();
            
            $select = $tableuser->select()
                                ->where('price = 30000');
            $productbyUser = $user->findDependentRowset('Training_Model_ProductsMap','USER_MODIFIEDBY',$select);
            echo "<pre>";
            print_r($productbyUser->toArray());
            echo "</pre>";
        }
        public function index4Action(){
            echo '<br>'.__METHOD__;
            $tableuser = new Training_Model_UserMap();
             
            $id = 1;
            $row = $tableuser->find($id);
            $user = $row->current();
        
            $select = $tableuser->select()
            ->where('id = 1');
            //$productbyUser = $user->findDependentRowset('Training_Model_ProductsMap','USER',$select);
            $productbyUser = $user->findTraining_Model_ProductsMapByUSER_MODIFIEDBY();
            
            echo "<pre>";
            print_r($productbyUser->toArray());
            echo "</pre>";
        }
        public function index5Action(){
            echo '<br>'.__METHOD__;
            $tableuser = new Training_Model_UserMap();
             
            $id = 1;
            $row = $tableuser->find($id);
            $user = $row->current();
        
            $select = $tableuser->select()
            ->from('products')
            ->where('cate_id = 1');
            $productbyUser = $user->findDependentRowset('Training_Model_ProductsMap','USER',$select);
            //$productbyUser = $user->findTraining_Model_ProductsMapByUSER_MODIFIEDBY();
        
            echo "<pre>";
            print_r($productbyUser->toArray());
            echo "</pre>";
        }
        public function index6Action(){
            $tableProducts = new Training_Model_ProductsMap();
            $rowsetproducts = $tableProducts->fetchAll('id = 1');
            $product = $rowsetproducts->current();
            
            $select = $tableProducts->select()
                                    ->where('status = 1');
            $userofproduct = $product->findParentRow('Training_Model_UserMap','USER_MODIFIEDBY',$select);
            echo "<pre>";
            print_r($userofproduct->toArray());
            echo "</pre>";
        }
        public function index7Action(){
            $tableProducts = new Training_Model_ProductsMap();
            $rowsetproducts = $tableProducts->fetchAll('id = 1');
            $product = $rowsetproducts->current();
        
            $select = $tableProducts->select()
            ->where('status = 1');
            //$userofproduct = $product->findParentRow('Training_Model_UserMap','USER_MODIFIEDBY',$select);
            $userofproduct = $product->findParentTraining_Model_UserMapByUSER_MODIFIEDBY();
            echo "<pre>";
            print_r($userofproduct->toArray());
            echo "</pre>";
        }
        public function index8Action(){
            //Tim cac Category cua Article khi biet ID cua Article
        
            $tblArticle = new Training_Model_NewsArticle();
            $articleRowset = $tblArticle->fetchAll(' id = 1');
            $article = $articleRowset->current();
        
            /*$categoryRowset = $article->findManyToManyRowset('Training_Model_NewsCategory',
             'Training_Model_NewsCategoryArticle'
            );*/
        
            $categoryRowset = $article->findTraining_Model_NewsCategoryViaTraining_Model_NewsCategoryArticle();
        
            echo '<pre>';
            print_r($categoryRowset);
            echo '</pre>';
        
        
        }
        public function index9Action(){
            $tblCategory = new Training_Model_NewsCategory();
            $categoryRowset = $tblCategory->fetchAll(' id  = 1');
            $category = $categoryRowset->current();
            $category->delete();
        }
    }
    