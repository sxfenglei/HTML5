<?php 
/*
 * 红包登记记录处理接口
 * Author: sxfenglei
 * Email: sxfenglei@vip.qq.com
 * https://github.com/sxfenglei/HTML5_yaoyiyao.git 
 */
header("content-type:text/html;charset:utf-8");
require_once 'lib/function.php';
require_once 'lib/mysql.class.php';
$mysql = new MySQL('localhost','root','1234','hongbao');


$data = array();
if(isset($_REQUEST['num']) && !empty($_REQUEST['num'])){
	$data['num'] = $_REQUEST['num'];
}
if(isset($_REQUEST['text']) && !empty($_REQUEST['text'])){
	$data['text'] = $_REQUEST['text'];
}
if(isset($_REQUEST['name']) && !empty($_REQUEST['name'])){
	$data['name'] = $_REQUEST['name'];
}
if(isset($_REQUEST['tel']) && !empty($_REQUEST['tel'])){
	$data['tel'] = $_REQUEST['tel'];
}
if(isset($_REQUEST['email']) && !empty($_REQUEST['email'])){
	$data['email'] = $_REQUEST['email'];
}  
if(count($data)<1){ 
	ajaxReturn(-6001,'请求数据错误'); 
}
$data['createtime'] = time();

$res = $mysql->data($data)->table('prize_log')->add();
if($res){
	ajaxReturn(2000,'登记成功'); 
}else{ 
	ajaxReturn(-6002,'系统错误'); 
}

 
?>
