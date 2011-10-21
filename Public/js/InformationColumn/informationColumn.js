KE.show({
    id:"biContent",
	items : [
		'fontname', 'fontsize', '|', 'forecolor', 'hilitecolor', 'bold', 'italic', 'underline',
		'removeformat', '|', 'justifyleft', 'justifycenter', 'justifyright', 'insertorderedlist',
		'insertunorderedlist', '|', 'link']
});

$(function(){
		//焦点图片上传
	new AjaxUpload('btnPC', {
		action: '../Upload/index',
		name: 'upload',
		responseType: 'json',
	    onSubmit: function(file, extension){
	    	return filterPic.apply(this, Array.prototype.slice.call(arguments,0));
        },
		onComplete : function(file, result){
			if(result && result.info && result.info instanceof Array) {
				if($("#tr_pc:visible").size() <= 0){
					bodyIncrease();				
				}
				var picname = "thumb_" + result.info[0].savename;
				$("#tr_pc").show().children().eq(1).html("<img src='/Temp/{0}' />".format(picname));
				
				$("#picture").val(picname);
			}
		}	
	});	

    $("#btnSubmit").click(function(){
		 $("#content").val(nehnre.encode(KE.html("biContent")));
		if(checkForm()){
			var data = $("#myForm").serialize();
			console.log(data);
			$.ajax({
				url:"saveOrUpdateinformationColumn",
				data:data,
				type: "POST",
				success:function(){
					showAlert("提交成功！", function(){
						location.href="listInformationColumn";
					});
					//location.href="BrandIdea.aspx?_" + new Date().getTime();
				}
			});
		}
    });
});


function checkForm(){
	var b = true;
	b = b && notNull("column", "栏目");
	b = b && notNull("title", "标题");
	b = b && notNull("source", "来源");
	b = b && notNull("content", "正文");
    b = b && notNull("search_tags", "搜索标签");
    b = b && notNull("seq", "文章显示排序");
	return b;
}
//过滤不符合要求的文件
function filterPic(file, extension){
	if(extension){
		extension = extension.toLowerCase();
		if(extension == "jpg" || extension == "gif" || extension == "jpeg" || extension == "png"){
			return true;
		}
	}
	showAlert("你上传的文件格式不正确！");
	return false;
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



function notNull(id, msg){
	var val = $("#" + id).val();
	if(!$.trim(val)){
		if ($.browser.msie && $.browser.version < 7){
			$("select").hide();
		}
		showAlert(msg + "不能为空！", function(){
			$("#" + id).focus();
			$("select").show();
		});
		return false;
	}
	return true;
}