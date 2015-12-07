<?php
/*
 * 中奖处理接口
 * Author: sxfenglei
 * Email: sxfenglei@vip.qq.com
 * https://github.com/sxfenglei/HTML5_yaoyiyao.git 
 */
header("content-type:text/html;charset:utf-8");
require_once 'lib/function.php';
//require_once 'lib/mysql.class.php';
//$mysql = new MySQL('localhost','root','1234','hongbao');
  
//中奖几率
$n = rand(0,10);
//中奖数字
$num = array(5,8);
$numStrArr = array('一','二','三','四','五','六','七','八','九','十');
//中奖图片
$imgArr = array('img/hb-0.png','img/hb-1.png');
//中奖词汇
$textArr = array('一张和妹纸共进晚餐的券','城市运动公园健身抵扣券');
 

//失败
$img = 'img/hb-empty.png';
$textArr2 = array('遗憾空','希望总的有万一哪天中了','别灰心再接再励','希望总在努力后','坚持就是胜利','不要放弃','你相信总会有中的一天');
$text = $textArr2[rand(0, count($textArr2)-1)];

$isPrize = false;
$msg = "未中奖";

if(in_array($n,$num)){ 
	foreach($num as $k=>$v){
		if($v == $n){
			$msg = "恭喜您,中".$numStrArr[$k]."等奖";
			$img = $imgArr[$k];
			$text = $textArr[$k];
			$isPrize = true;
			break;
		}
	}
} 
ajaxReturn(2000,$msg,array('num'=>$n,'img'=>$img,'text'=>$text,'isPrize'=>$isPrize));  
 
//ajaxReturn(-6002,'系统错误');
 

?>
