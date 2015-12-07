<?php
/**
* 获取登记的中奖名单处理接口
* Author: sxfenglei
* Email: sxfenglei@vip.qq.com
* https://github.com/sxfenglei/HTML5_yaoyiyao.git  
* 示例:
* 请求地址：http://localhost/HTML5_yaoyiyao/jieguo.php
* 请求参数：p=3 分页
* 示例：http://localhost/HTML5_yaoyiyao/jieguo.php?p=3
*/
header("content-type:text/html;charset:utf-8");
require_once 'lib/function.php';
require_once 'lib/mysql.class.php';
$mysql = new MySQL('localhost','root','1234','hongbao');
$allData = $mysql->table('prize_log')->select(); 

//分页
$total = count($allData);	//总条数
$size = 20;					//每页显示的数据
$pageNum=ceil($total/$size);//总页数
//过滤传递的分页参数
if(isset($_REQUEST['p'])){
	$page = $_REQUEST['p'];

	if($page<1){
		$page = 1;
	}elseif($page>$pageNum){
		$page = $pageNum;
	}
}else{
	$page = 1;
}
//启始行
$startRow = $size * ($page-1); //每页条数 乘以 当前页-1

//$list = $mysql->table('prize_log')->where('id=4')->order('createtime desc')->select();
//$list = $mysql->table('prize_log')->limit(0,2)->order('createtime desc')->select();
$list = $mysql->table('prize_log')->limit($startRow,$size)->select();
foreach($list as $key=>$val){
	$list[$key]['createtime'] = date('Y-m-d H:i:s',$val['createtime']);
}
if($list){
	ajaxReturn(2000,'查询成功',$list); 
}else{ 
	ajaxReturn(-6002,'系统错误'); 
}

 
?>