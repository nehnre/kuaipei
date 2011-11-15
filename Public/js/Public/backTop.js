(function() {
    var $backToTopTxt = "返回顶部", $backToTopEle = $('<div class="backToTop"><img src="/Public/images/to_top.jpg" border="0"/></div>').appendTo($("body")).attr("title", $backToTopTxt).click(function() {
            $("html, body").animate({ "scrollTop": "0px"}, "slow");
    }), $backToTopFun = function() {
        var st = $(document).scrollTop(), winh = $(window).height();
        (st > 0)? $backToTopEle.show(): $backToTopEle.hide();    
        //IE6下的定位
        if (!window.XMLHttpRequest) {
            $backToTopEle.css("top", st + winh - 166);    
        }
    };
    $(window).bind("scroll", $backToTopFun);
    $(function() { $backToTopFun(); });
})();