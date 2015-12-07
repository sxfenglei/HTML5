<?php 
// +----------------------------------------------------------------------
// |公共函数
// +----------------------------------------------------------------------
// | Author:sxfenglei
// +----------------------------------------------------------------------
// | email:sxfenglei@vip.qq.com
// +----------------------------------------------------------------------


/**
* 数组输出json字符串
* ajaxReturn(2000,'操作成功');
* ajaxReturn(array('code'=>'2000','msg'=>'操作成功','data'=>array()));
*/
function ajaxReturn($code='',$msg='',$data=array()){
	$showData = array();

	if( empty($code) || empty($msg) ){
		if(count($data)>0){
			$showData = $data;
		}else{
			die('null');
		}
	}else{
		if(is_array($code)){
			$showData = $data;
		}else{ 
			$showData = array(
				'code'=>$code,
				'msg'=>$msg,
				'data'=>count($data)<1?'':$data
			);
		}
	}

	echo json_encode($showData);
}
?>