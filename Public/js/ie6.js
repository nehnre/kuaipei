/*!
 * ie6校验
 * http://jquery.com/
 */
 (function($){
	if($ && $.browser.msie && $.browser.version < 7){
		$(function(){
			$("img[src$='png']").each(function(){
				var src = $(this).attr("src");
				src = src.replace(/\.png$/g,".jpg");
				$(this).attr("src", src);
				alert(src);
			});
		});
	}
 })($);