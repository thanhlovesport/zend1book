<?php
//Duong dan den thu muc chua ung dung
defined('APPLICATION_PATH')
|| define('APPLICATION_PATH',
realpath(dirname(__FILE__) . '/application'));

// Define application environment
defined('APPLICATION_ENV')
|| define('APPLICATION_ENV',
(getenv('APPLICATION_ENV') ? getenv('APPLICATION_ENV')
                                                      : 'production'));

//Nap duong dan den cac thu vien se su dung trong ung dung
set_include_path(implode(PATH_SEPARATOR, array(
dirname(__FILE__) . '/library',
get_include_path(),
)));

// Khai báo đường dẫn public đến các thư mục
//Duong dan den thu muc /public
define('PUBLIC_PATH', realpath(dirname(__FILE__) . '/public'));
//Duong dan den thu muc /templates
define('TEMPLATE_PATH', PUBLIC_PATH . '/templates');

define('TEMP_PATH', PUBLIC_PATH . '/tmp');

// Lien quan phan zend file, luu files
define('FILE_PATH', PUBLIC_PATH . '/files');
define('PRODUCTS_PATH', PUBLIC_PATH . '/files');

// Duong dan den thu muc chua ckeditor
define('SCRIPTS_PATH', PUBLIC_PATH . '/scripts');
define('CAPTCHA_PATH', PUBLIC_PATH . '/captcha');
define('BLOCK_PATH',APPLICATION_PATH . '/blocks');


// Khai báo đường dẫn URL đến các thư mục
//Duong dan den thu muc ung dung    learnzend1/zend1book
define('APPLICATION_URL','/learnzend1/zend1book');
define('SRCIPTS_URL', APPLICATION_URL . '/public/scripts');
define('FILE_URL', APPLICATION_URL . '/public/files');
define('CAPTCHA_URL', APPLICATION_URL . '/public/captcha');


//Duong dan den thu muc /templates
define('TEMPLATE_URL',  'public/templates');
