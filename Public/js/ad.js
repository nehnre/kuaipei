$.fn.iFadeSlide = function (iSet) {
            /*
            * iSet��ѡ����˵��:
            * iSet.field==>�õ������ڵ�ͼƬ��
            * iSet.ico==>��ť����
            * iSet.high==>��ť������ʽ
            * iSet.interval==>ͼƬ�л�ʱ��
            * iSet.leaveTime==>��������껮���¼������ʱ��ֵ
            * iSet.fadeInTime==>����ʱ��
            * iSet.fadeOutTime==>����ʱ��
            * ���÷�ʽ$(document).iFadeSlide({field:'...',ico:'...',...})
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
            //��ͼƬ�����Ӧ�İ�ť
            imgField.each(function (i) {
                icoHtml += '<li>' + (i + 1) + '</li>';
            });
            icoHtml += '</ul>';
            icoField.append(icoHtml);

            //���뵭������
            changeFun = function (n) {
				$("." + iSet.high).removeClass(iSet.high);
				icoField.find('ul>li').eq(n).addClass(iSet.high);
                imgField.filter(':visible').fadeOut(fadeOutTime, function () {
                    imgField.eq(n).fadeIn(fadeInTime)
                });
            }

            icos = icoField.find('ul>li');
            //Ϊ��һ��������ʼ������
            icos.first().addClass(iSet.high);
            //��ť��껮�뻮���¼�
            icos.hover(function () {
                clearInterval(autoSlideFun);
                curIndex = icos.index(this);
                hasIcoHighName = $(this).hasClass(iSet.high);
                //setTimeout�����û�����(����ʶ�Ի���)����ʱ�����¼�
                fastHoverFun = setTimeout(function () {
                    //��껮�뵱ǰͼƬ��ťʱ����˸
                    if (!hasIcoHighName) {
                        changeFun(curIndex);
						
                    }
                }, hoverTime);
            }, function () {
                clearTimeout(fastHoverFun);
                //�Զ��л�
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