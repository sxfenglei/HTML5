/*
 * 页面js文件
 * Author: sxfenglei
 * Email: sxfenglei@vip.qq.com
 * https://github.com/sxfenglei/HTML5_yaoyiyao.git 
 */
$(function(){

	//实例化Shake
    var myShakeEvent = new Shake({
        threshold: 15
    });

	//启动
    myShakeEvent.start();

	//监听事件
    window.addEventListener('shake', shakeEventDidOccur, false);

	//自定义时间函数
    function shakeEventDidOccur () { 
		$.get('prize.php', function(data){ 
			eval("var data="+data);
			if(data.code == 2000){
				$("#result").html(data.msg+","+data.data.text+"！").removeClass("result-show").removeClass("result").addClass("result");
				document.getElementById("hand").style.backgroundImage = "url("+data.data.img+")";
				//$("#hand").css("backgorund-image","url("+hbImg[num]+")");
				if(data.data.isPrize){
					$('#btn').removeClass('btnHide').attr('data-num',data.data.num);
				}
				$('#text').val(data.msg+","+data.data.text+"！");
				setTimeout(function(){
					$("#result").addClass("result-show");
				}, 500);
			}else{
				alert(data.msg);
			}
		}); 
    }

	//领取奖品
	$('#btn').on('click',function(){
		$('#yaojiang').hide();
		$('#dengji').show();
	});

	//登记信息
	$('#btnForm').on('click',function(){
		var postData = {
			'num':$('#btn').data('num'),
			'text':$('#text').val(),
			'name':$('#name').val(),
			'tel':$('#tel').val(),
			'email':$('#email').val(),
		}
		if(postData.num == '' || postData.name == '' || postData.tel == ''){
			alert('请认真填写信息');
			return false;
		}
		//alert(JSON.stringify(postData));
		$.post("hongbao.php",postData,function(data){
			eval("var data="+data);
			if(data.code == 2000){ 
				$('#yaojiang').hide();
				$('#dengji').hide();
				$('#jieguo').show();
			}else{
				alert(data.msg);
			}
		});
	});
});