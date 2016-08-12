<?php 
    class Training_SelectController extends Zendvn_Controller_Action{
        
        public function init(){
            parent::init();
            $this->_helper->layout->disableLayout();
            $this->_helper->viewRenderer->setNoRender();
        }
        public function indexAction() {
            echo '<br><h3>' . __METHOD__ . '</h3>';
            $db = Zend_Registry::get('connectDb');
            //$db = Zend_Db::factory($adapter,$config);
        
            $select = $db->select()
            ->from('users AS u',array('id AS user_id','user_name','email'));
            echo $select;
            $rows = $db->fetchAll($select);
            echo '<pre>';
            print_r($rows);
            echo '</pre>';
            	
        
        }
        
        public function index2Action() {
            echo '<br><h3>' . __METHOD__ . '</h3>';
            $db = Zend_Registry::get('connectDb');
            //$db = Zend_Db::factory($adapter,$config);
        
            $select = $db->select()
            ->from('users AS u',array('id AS user_id','user_name','email'))
            ->where('group_id = ?','asdasd',INTEGER);
            echo $select;
            $rows = $db->fetchAll($select);
            echo '<pre>';
            print_r($rows);
            echo '</pre>';
            	
        
        }
        
        public function index3Action() {
            echo '<br><h3>' . __METHOD__ . '</h3>';
            $db = Zend_Registry::get('connectDb');
            //$db = Zend_Db::factory($adapter,$config);
        
            $select = $db->select()
            ->from('users AS u',array('id AS user_id','user_name','email'))
            ->where('group_id = ?','3',INTEGER)
            ->where('user_name = ?','tuanha',STRING);
            echo $select;
            $rows = $db->fetchAll($select);
            echo '<pre>';
            print_r($rows);
            echo '</pre>';
            	
        
        }
        
        public function index4Action() {
            echo '<br><h3>' . __METHOD__ . '</h3>';
            $db = Zend_Registry::get('connectDb');
            //$db = Zend_Db::factory($adapter,$config);
        
            $select = $db->select()
            ->from('users AS u',array('id AS user_id','user_name','email'))
            ->where('group_id = ?','3',INTEGER)
            ->orWhere('id > ?',6,INTEGER);
            echo $select;
            $rows = $db->fetchAll($select);
            echo '<pre>';
            print_r($rows);
            echo '</pre>';
            	
        
        }
        
        public function index5Action() {
            echo '<br><h3>' . __METHOD__ . '</h3>';
            $db = Zend_Registry::get('connectDb');
            //$db = Zend_Db::factory($adapter,$config);
        
            $select = $db->select()
            ->from('users AS u',array('id AS user_id','user_name','email'))
            ->order('id DESC')
            ->order('user_name ASC');
            echo $select;
        
            $rows = $db->fetchAll($select);
            echo '<pre>';
            print_r($rows);
            echo '</pre>';
            	
        
        }
        
        public function index6Action() {
            echo '<br><h3>' . __METHOD__ . '</h3>';
            $db = Zend_Registry::get('connectDb');
            //$db = Zend_Db::factory($adapter,$config);
        
            $select = $db->select()
            ->from('users AS u',array('id AS user_id','user_name','email'))
            ->limit(7,0);
            echo $select;
        
            $rows = $db->fetchAll($select);
            echo '<pre>';
            print_r($rows);
            echo '</pre>';
        }
        
        public function index7Action() {
            echo '<br><h3>' . __METHOD__ . '</h3>';
            $db = Zend_Registry::get('connectDb');
            //$db = Zend_Db::factory($adapter,$config);
        
            echo '<br>page: ' . $page = $db->quote($this->_request->getParam('page',1),INTEGER);
            $select = $db->select()
            ->from('users AS u',array('id AS user_id','user_name','email'))
            ->limitPage($page,5);
            echo '<br>sql: '. $select;
        
            $rows = $db->fetchAll($select);
            echo '<pre>';
            print_r($rows);
            echo '</pre>';
        }
        
        
        public function index8Action() {
            echo '<br><h3>' . __METHOD__ . '</h3>';
            $db = Zend_Registry::get('connectDb');
            //$db = Zend_Db::factory($adapter,$config);
        
        
            $select = $db->select()
            ->distinct()
            ->from('users AS u',array('group_id'));
            echo '<br>sql: '. $select;
        
            $rows = $db->fetchAll($select);
        
            echo '<pre>';
            print_r($rows);
            echo '</pre>';
        }
        
        
        public function index9Action() {
            echo '<br><h3>' . __METHOD__ . '</h3>';
            $db = Zend_Registry::get('connectDb');
            //$db = Zend_Db::factory($adapter,$config);
        
        
            $select = $db->select()
            ->from('users AS u',array('id','user_name','email'))
            ->join('user_group AS g',' u.group_id = g.id',array('group_name'));
            /*$select  = 'SELECT u.id,u.user_name,u.email,g.group_name
             FROM users AS u, user_group AS g
            WHERE u.group_id = g.id';*/
            echo '<br>sql: '. $select;
        
            $rows = $db->fetchAll($select);
        
            echo '<pre>';
            print_r($rows);
            echo '</pre>';
        }
        
        public function index10Action() {
            echo '<br><h3>' . __METHOD__ . '</h3>';
            $db = Zend_Registry::get('connectDb');
            //$db = Zend_Db::factory($adapter,$config);
        
        
            $select = $db->select()
            ->from('users AS u',array('id','user_name','email'))
            ->joinLeft('user_group AS g',' u.group_id = g.id',array('group_name'))
            ->order('u.id DESC');
        
            echo '<br>sql: '. $select;
        
            $rows = $db->fetchAll($select);
        
            echo '<pre>';
            print_r($rows);
            echo '</pre>';
        }
        
        public function index11Action() {
            echo '<br><h3>' . __METHOD__ . '</h3>';
            $db = Zend_Registry::get('connectDb');
            //$db = Zend_Db::factory($adapter,$config);
        
        
            $select = $db->select()
            ->from('user_group AS g',array('id','group_name'))
            ->joinLeft('users AS u','u.group_id = g.id','COUNT(u.id) AS members')
            ->group('g.id');
        
            echo '<br>sql: '. $select;
        
        
        }
        
        public function index12Action() {
            echo '<br><h3>' . __METHOD__ . '</h3>';
            $db = Zend_Registry::get('connectDb');
            //$db = Zend_Db::factory($adapter,$config);
        
        
            $select = $db->select()
            ->from('user_group AS g',array('id','group_name'))
            ->joinLeft('users AS u','u.group_id = g.id','COUNT(u.id) AS members')
            ->group('g.id')
            ->having('members <> 0');
        
            echo '<br>sql: '. $select;
        
        
        }
        
        public function index13Action() {
            echo '<br><h3>' . __METHOD__ . '</h3>';
            $db = Zend_Registry::get('connectDb');
            //$db = Zend_Db::factory($adapter,$config);
        
        
            $select = $db->select()
            ->from('users',array('id','user_name'))
            ->order('user_name DESC');
            echo '<br>sql: '. $select;
        
            $select->reset(Zend_Db_Select::ORDER);
            echo '<br>sql: '. $select;
        
            $select->order('user_name ASC');
            echo '<br>sql: '. $select;
        
        }
    }