$(function(){
	$(".promotion_content .img div").mouseenter(function(){
		console.log("over");
		$(this).find("img").animate({"margin-left":-200}, 100);
	}).mouseleave(function(){
		console.log("out");
		$(this).find("img").animate({"margin-left":200}, 100, function(){
			$(this).css("margin-left", "-600px");
		});
	});
});