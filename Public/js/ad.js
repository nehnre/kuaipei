$.fn.iFadeSlide = function (iSet) {
            /*
            * iSet可选参数说明:
            * iSet.field==>幻灯区域内的图片集
            * iSet.ico==>按钮钩子
            * iSet.high==>按钮高亮样式
            * iSet.interval==>图片切换时间
            * iSet.leaveTime==>不触发鼠标划入事件的最大时间值
            * iSet.fadeInTime==>淡入时间
            * iSet.fadeOutTime==>淡出时间
            * 调用方式$(document).iFadeSlide({field:'...',ico:'...',...})
            */
            iSet = $.extend({ high: 'high', interval: 3000, leaveTime: 150, fadeOutTime: 400, fadeInTime: 400 }, iSet);
            var imgField = $(iSet.field || '#slide>img');
            var icoField = $(iSet.ico || '#ico');
            var curIndex = 0;
            var slideInterval = iSet.interval || 3000;
            var hoverTime = iSet.leaveTime || 150;
            var fadeOutTime = iSet.fadeOutTime || 400;
            var fadeInTime = iSet.fadeInTime || 400;
            var icos = null, fastHoverFun = null, autoSlideFun = null, hasIcoHighCls = null, changeFun = null, max = null; ;

            var icoHtml = '<ul>';
            max = imgField.size();
            //alert(max);
            //按图片传入对应的按钮
            imgField.each(function (i) {
                icoHtml += '<li>' + (i + 1) + '</li>';
            });
            icoHtml += '</ul>';
            icoField.append(icoHtml);

            //淡入淡出函数
            changeFun = function (n) {
				$("." + iSet.high).removeClass(iSet.high);
				icoField.find('ul>li').eq(n).addClass(iSet.high);
                imgField.filter(':visible').fadeOut(fadeOutTime, function () {
                    imgField.eq(n).fadeIn(fadeInTime)
                });
            }

            icos = icoField.find('ul>li');
            //为第一个按键初始化高亮
            icos.first().addClass(iSet.high);
            //按钮鼠标划入划出事件
            icos.hover(function () {
                clearInterval(autoSlideFun);
                curIndex = icos.index(this);
                hasIcoHighName = $(this).hasClass(iSet.high);
                //setTimeout避免用户快速(无意识性划过)划过时触发事件
                fastHoverFun = setTimeout(function () {
                    //鼠标划入当前图片按钮时不闪烁
                    if (!hasIcoHighName) {
                        changeFun(curIndex);
						
                    }
                }, hoverTime);
            }, function () {
                clearTimeout(fastHoverFun);
                //自动切换
                autoSlideFun = setInterval(function () {
                    curIndex++;
                    changeFun(curIndex);
                    if (curIndex == max) {
                        changeFun(0);
                        curIndex = 0;
                    }
                }, slideInterval)
            }).eq(0).trigger('mouseleave');
        }

        $(function () {
            //SAMPLE-C
            $(document).iFadeSlide({
                field: $('div#roll_pic img'),
                ico: $('div.ico_c'),
                fadeOutTime: 700,
                fadeInTime: 700,
				interval: 5000
            });
        });