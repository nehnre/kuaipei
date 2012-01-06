$(document).ready(function(){
    				ShowCatalog(0);
    			//	var h=$(window).height()-88-25;
  				//   $("div.content").css("height",h);

  				var today=new Date();
				var hour=today.getHours();
				var year=today.getFullYear();
				var month=today.getMonth();
				var date=today.getDate();
				if(hour>5 &&hour<12){
					$("#greet").html("上午好!");
				}else if(hour>=0&&hour<=5){
					$("#greet").html("凌晨好!");
				}else if(hour>=12&&hour<13){
					$("#greet").html("中午好!");
				}else if(hour>=13&&hour<18){
					$("#greet").html("下午好!");
				}else if(hour>=18&&hour<=23){
					$("#greet").html("晚上好!");
				}
				$("#date").html(year+"年"+(month+1)+"月"+date+"日");
				$("#logout").click(function(){
					location.href = "/Admin/logout" ;
					try{window.event.returnValue=false;}catch(e){}
				});
				
				$( "#dialog-editPassword" ).dialog({
					width: 500,
					height: 300,
					resizable: false,
					closeOnEscape: false,
					modal: true,
					autoOpen: false,
					close: function(){
						$("#user_name").val("");
						$("#password").val("");
					}
				});	
				$("#editPassword").click(function(){
					$( "#dialog-editPassword" ).dialog("open");
				});	

				$("#btnSet").click(function(){
					if(!topCheckPassword()){
						return;
					}
					var user_name = $("#user_name").val();
					var password = $("#password").val();
					var data = "user_name=" + user_name + "&password=" + password ;
					//showWaiting();
					$.ajax({
						url:"/Admin/changePassword",
						cache: false,
						data: data,
						success:function(json){
							json = nehnre.parseJSON(json);
							showAlert(json.data.msg, function(){
								if(json.data.success){
									$( "#dialog-editPassword" ).dialog("close");
									clearFindPassword();
								}
							});
						}
						
					});
				});
				
});
	
	global_pro_id = -1;		
			
function ShowCatalog(i){	
	var sub_li = "#catalog_"+i;
	$("ul.subCatalog").hide();//隐藏所有的子类
	if( global_pro_id == i ){
	//如果当前的菜单已经打开，则隐藏 然后给全局变量global_pro_id赋值
		$(sub_li).hide();
		global_pro_id =-1
	}
	else {
		$(sub_li).show();
		global_pro_id = i;
	}
}

function setCSS(self){
	$("a[class='selected']").attr("class","not_selected");
	$(self).attr("class","selected");
}

//检测密码是否匹配
function topCheckPassword(){
	var password = $("#password").val();
	var passwordagain = $("#passwordagain").val();
	if(!password){
		showAlert("请输入密码！",function(){
			$("#password").focus();
		});
		return false;
	}
	if(password.length < 6 || password.length > 16){
		showAlert("密码长度要在6到16之间！",function(){
			$("#password").focus();
		});
		return false;
	}
	
	if(password != passwordagain){
		showAlert("两次输入的密码不一致，请检查！",function(){
			$("#password").focus();
		});
		return false;
	}
	
	return true;
}
function clearFindPassword(){
	$("#user_name").val("");
	$("#password").val("");
	$("#passwordagain").val("");
}
