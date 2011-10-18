$(function(){



	
	//提交按钮
	$("#btnSubmit").click(function(){
			location.href = "UserCenter?flag=1";	
	});
	
	showMeg($("#user_type1").val());

});


function  showMeg(val){
		if(val=='厂商'||val=='经销商'||val=='修理厂'){
			$(".chooseStyle2").hide();
			$(".chooseStyle3").hide();
			$(".chooseStyle1").show();
			$(".chooseStyle12").show();
			if($("#business_license").val()!=null&&$("#business_license").val().length>0){
					$("#tr_bl").show();
			}
			if($("#address_pic").val()!=null&&$("#address_pic").val().length>0){
				  $("#tr_ap").show();
			}
			$("#tr_dl").hide();
			$("#tr_vl").hide();
		}else if(val=='车队'){
			$(".chooseStyle1").hide();
			$(".chooseStyle3").hide();
			$(".chooseStyle2").show();
			$(".chooseStyle12").show();
			$("#tr_bl").hide();
			$("#tr_ap").hide();
			$("#tr_dl").hide();
			$("#tr_vl").hide();
		}else if(val=='车主'){
			$(".chooseStyle1").hide();
			$(".chooseStyle2").hide();
			$(".chooseStyle12").hide();
			$(".chooseStyle3").show();
			if($("#driving_license").val()!=null&&$("#driving_license").val().length>0){
				$("#tr_dl").show();
			}
			if($("#vehicle_license").val()!=null&&$("#vehicle_license").val().length>0){
				  $("#tr_vl").show();
			}
			$("#tr_bl").hide();
			$("#tr_ap").hide();
		}
}

function bodyIncrease(){
	// if(!inc) inc = 200;
	// var bodyHeight = $(".body").css("height");
	// bodyHeight = bodyHeight.replace(/px$/ig,"");
	// $(".body").css("height", ~~bodyHeight + inc);
	// $(".bodycenter").eq(1).css("height", ~~bodyHeight + inc);
	// var container = $(".container").css("height");
	
	// container = container.replace(/px$/ig,"");
	// $(".container").css("height", ~~container + inc);
}