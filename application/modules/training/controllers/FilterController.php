<?php 
class Training_FilterController extends Zend_Controller_Action{
	
	public function init(){
		parent::init();
		$this->_helper->layout->disableLayout();
		$this->_helper->viewRenderer->setNoRender();
		echo "<meta http-equiv='Content-Type' content='text/html; charset=utf-8'/> ";
	}
	
	public function multiAction(){
		$str = 'http://www.zend.vn/KhÃ³a há»�c Zend Framework cung !@#$%^&*()_+
							cáº¥p nhá»¯ng    kiáº¿n thá»©c       cÆ¡ báº£n vá»� zend       framework';
		$newArr = explode('vn/',$str);
		
		$str_1 = $newArr[0] . 'vn/';
		$str_2 = $newArr[1];
		
		$filter = new Zend_Filter();
		$multiFilter = $filter->addFilter(new Zend_Filter_StringToLower(array('encoding'=>'UTF-8')))
							  ->addFilter(new Zend_Filter_Alnum(true))
							  ->addFilter(new Zend_Filter_PregReplace(array('match'=>'#\s+#','replace'=>'-')))
							  ->addFilter(new Zend_Filter_Word_SeparatorToDash())
							  ->addFilter(new Zendvn_Filter_RemoveCircumflex());
		
		$result = $str_1 . $multiFilter->filter($str_2) . '.html';
		
		echo '<br>Source: ' . $str;
		echo '<br>Filter: ' . $result;
		
	}
	
	public function removeAction(){
		$str = 'a à ả ã á ạ ă ằ ẳ ẵ ắ ặ â ầ ẩ ẫ ấ ậ b c d đ e è ẻ ẽ é ẹ ê ề ể ễ ế ệ 
        		f g h i ì ỉ ĩ í ị j k l m n o ò ỏ õ ó ọ ô ồ ổ ỗ ố ộ ơ ờ ở ỡ ớ ợ 
        		p q r s t u ù ủ ũ ú ụ ư ừ ử ữ ứ ự v w x y ỳ ỷ ỹ ý ỵ z<br>';
		
		$filter = new Zendvn_Filter_RemoveCircumflex();
		$result = $filter->filter($str);
		
		echo '<br>Source: ' . $str;
		echo '<br>Filter: ' . $result;
	}
	
	// Tìm kiếm những chữ nào đó và gắn cho nó 1 liên kết
	public function linkAction(){
		$str = 'KhÃ³a há»�c Zend Framework cung cáº¥p nhá»¯ng kiáº¿n thá»©c cÆ¡ báº£n vá»� zend framework';
		
		$filter = new Zendvn_Filter_AddLink('Zend Framework','http://www.zend.vn');
		$result = $filter->filter($str);
		
		echo '<br>Source: ' . $str;
		echo '<br>Filter: ' . $result;
	}
	
	
	public function pregAction(){
		$str = '   KhÃ³a    há»�c Zend Framework cung cáº¥p     nhá»¯ng kiáº¿n thá»©c cÆ¡ báº£n    vá»� ZF';
		
		$filter = new Zend_Filter_PregReplace(array('match'=>'#\s+#','replace'=>'-'));
		$result = $filter->filter($str);
		
		echo '<br>Source: ' . $str;
		echo '<br>Filter: ' . $result;
	}
	
	
	// Tìm kiếm, thay thế kí tự
	public function separator2Action(){
		$str = 'KhÃ³a há»�c Zend Framework cung cáº¥p nhá»¯ng kiáº¿n thá»©c cÆ¡ báº£n vá»� ZF';
		
		$filter = new Zend_Filter_Word_SeparatorToSeparator('cung','****');		
		$result = $filter->filter($str);
		
		echo '<br>Source: ' . $str;
		echo '<br>Filter: ' . $result;
	}
	
	// Tạo kí tự ngăn cách giữa các từ
	public function separatorAction(){
		$str = '   KhÃ³a    há»�c Zend Framework cung cáº¥p     nhá»¯ng kiáº¿n thá»©c cÆ¡ báº£n    vá»� ZF';
		
		$filter = new Zend_Filter_Word_SeparatorToDash();		
		$result = $filter->filter($str);
		
		echo '<br>Source: ' . $str;
		echo '<br>Filter: ' . $result;
	}
	
	// Giải nén một tập tin
	public function unzipAction(){
		$options = array(
						'adapter' => 'zip',
						'options' => array(
										'target' => TEMP_PATH . '/folderunzip'
									),
						);
		$filter = new Zend_Filter_Decompress($options);
		
		$filter->filter(TEMP_PATH . '/demo.zip' );
	}
	
	public function zip3Action(){
		$options = array(
						'adapter' => 'zip',
						'options' => array(
										'archive' => TEMP_PATH . '/folder.zip'
									),
						);
		$filter = new Zend_Filter_Compress($options);
		$filter->filter(TEMP_PATH . '/duteam' );
	}
	
	public function zip2Action(){
		$options = array(
						'adapter' => 'zip',
						'options' => array(
										'archive' => TEMP_PATH . '/demo2.zip'
									),
						);
		$filter = new Zend_Filter_Compress($options);
		$filter->filter(TEMP_PATH . '/demo.swf' );
	}
	
	// Nén tập tin
	public function zipAction(){
		$options = array(
						'adapter' => 'zip',
						'options' => array(
										'archive' => TEMP_PATH . '/demo.zip'
									),
						);
		$filter = new Zend_Filter_Compress($options);
		$filter->filter(TEMP_PATH . '/abc.txt' );
	}
	
	public function tagAction(){
		
		//$str = '<B>My content</B>';
		$str = 'This contains <a href="http://example.com">no ending tag</a>';
		
		$filter = new Zend_Filter_StripTags();		
		$result = $filter->filter($str);
		
		echo '<br>Source: ' . $str;
		echo '<br>Filter: ' . $result;
	}
	
	public function trimAction(){
		
		$str = '    KhÃ³a há»�c Zend Framework cung cáº¥p nhá»¯ng kiáº¿n thá»©c cÆ¡ báº£n vá»� ZF     ';
		
		$filter = new Zend_Filter_StringTrim();		// Loại bỏ khoảng trắng ở 2 đầu chuỗi
		$result = $filter->filter($str);
		
		echo '<br>Source: ' . $str;
		echo '<br>Filter: ' . $result;
	}
	
	
	public function upperAction(){
		
		$str = 'KhÃ³a há»�c Zend Framework cung cáº¥p nhá»¯ng kiáº¿n thá»©c cÆ¡ báº£n vá»� ZF';
		
		$filter = new Zend_Filter_StringToUpper(array('encoding'=>'UTF-8'));		
		$result = $filter->filter($str);
		
		echo '<br>Source: ' . $str;
		echo '<br>Filter: ' . $result;
	}
	
	public function lowerAction(){ // Đổi chữ hoa thành chữ thường
		
		$str = 'KhÃ³a há»�c Zend Framework cung cáº¥p nhá»¯ng kiáº¿n thá»©c cÆ¡ báº£n vá»� ZF';
		
		$filter = new Zend_Filter_StringToLower();	
		$filter->setEncoding('UTF-8');
		$result = $filter->filter($str);
		
		echo '<br>Source: ' . $str;
		echo '<br>Filter: ' . $result;
	}
	
	public function digitAction(){
		
		$str = '0123.12 asdasdsa';    // Loại bỏ các kí tự không phải là số
		
		$filter = new Zend_Filter_Digits();
		$result = $filter->filter($str);
		
		echo '<br>Source: ' . $str;
		echo '<br>Filter: ' . $result;
	}
	
	public function strrevAction(){
		
		$str = 'I love Zend Framework';
		
		$filter = new Zend_Filter_Callback('strrev'); // , tham số truyền vào trong hàm là một hàm nào đó
		$result = $filter->filter($str);
		
		echo '<br>Source: ' . $str;
		echo '<br>Filter: ' . $result;
	}
	
	public function dirAction(){
		
		$str = 'http://framework.zend.com/manual/en/zend.filter.set.html';
		$filter = new Zend_Filter_Dir();
		$result = $filter->filter($str);      // Lấy đường dẫn đến file
		
		echo '<br>Source: ' . $str;
		echo '<br>Filter: ' . $result;
	}
	
	
	public function fileAction(){
		
		$str = 'http://framework.zend.com/manual/en/zend.filter.set.html';
		$filter = new Zend_Filter_BaseName(); // Lấy tên tập tin trong đường dẫn
		$result = $filter->filter($str);
		
		echo '<br>Source: ' . $str;
		echo '<br>Filter: ' . $result;
	}
    
	// Chỉ lấy kí tự
	public function alphaAction(){
		
		$str = 'asdasd \#$%@&*!)(&^^%#123jasd';
		$filter = new Zend_Filter_Alpha(true); // true sẽ lấy thêm khoảng trắng
		$result = $filter->filter($str);
		
		echo '<br>Source: ' . $str;
		echo '<br>Filter: ' . $result;
	}
	
	// chỉ lấy số
	public function alnumAction(){
		
		$str = 'asdasd \#$%@&*!)(&^^%#123jasd';
		$filter = new Zend_Filter_Alnum(true);
		$result = $filter->filter($str);
		
		echo '<br>Source: ' . $str;
		echo '<br>Filter: ' . $result;
	}
}