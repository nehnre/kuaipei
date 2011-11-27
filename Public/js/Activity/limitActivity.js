$(function(){

	var dataConfig = {
		minDate:new Date(),
		monthNames:['1月','2月','3月','4月','5月','6月','7月','8月','9月','10月','11月','12月']	,
		showMonthAfterYear: true,
		dayNamesMin:['日', '一', '二', '三', '四', '五', '六'],
		firstDay:1,
		selectOtherMonths :true,
		showOtherMonths :true,
		dateFormat: 'yy-mm-dd',
		prevText:'上一月',
		nextText:'下一月',
		changeYear:true
	};
	
	var dataConfigForBir ={
		maxDate:new Date(),
		monthNames:['1月','2月','3月','4月','5月','6月','7月','8月','9月','10月','11月','12月']	,
		showMonthAfterYear: true,
		dayNamesMin:['日', '一', '二', '三', '四', '五', '六'],
		firstDay:1,
		selectOtherMonths :true,
		showOtherMonths :true,
		dateFormat: 'yy-mm-dd',
		prevText:'上一月',
		nextText:'下一月',
		changeYear:true,
		defaultDate: '-20y'
	};
	
	$( "#start_time" ).datepicker(dataConfig).attr("readonly", true).css("cursor", "pointer");
	
	$( "#end_time" ).datepicker(dataConfig).attr("readonly", true).css("cursor", "pointer");
	
	$( "#start_birthday" ).datepicker(dataConfigForBir).attr("readonly", true).css("cursor", "pointer");
	
	$( "#end_birthday" ).datepicker(dataConfigForBir).attr("readonly", true).css("cursor", "pointer");
	
	$("#btnSubmit").click(function(){
		var data = $("#myForm").serialize();
		if ($.browser.msie && $.browser.version < 7){
			$("select").hide();
		}
		var id = $("#activityId").val();
		$.ajax({
			url: "/Activity/saveOrUpdateLimitActivity",
			data: data,
			type: "POST",
			success: function(json){
				json = nehnre.parseJSON(json);
				if(json.data.success){
					if($("#start_time").val()!=""){
						$("#start_time_"+id,window.parent.document).text($("#start_time").val());
					}
					if($("#end_time").val()!=""){
						$("#end_time_"+id,window.parent.document).text($("#end_time").val());
					}
					window.parent.closeLimit();
				}
			}
		});
    });
	
});
