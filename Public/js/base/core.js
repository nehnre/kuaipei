(function(){
	var _nehnre = window.nehnre;
	nehnre = _nehnre || {};
	nehnre.encode = function (url){
		url = encodeURIComponent(url);
		url = url.replace(/\%/g,"@");
		return url;
	}
	nehnre.parseJSON = function(str){
		if(str){
			return eval("(" + str + ")");
		} else {
			return {};
		}
	}
	nehnre.decode = function(url){
		url = url.replace(/@/g,"%");
		url = decodeURIComponent(url);
		return url;
	}
	
	nehnre.reg = {
		email: /^((([a-z]|\d|[!#\$%&'\*\+\-\/=\?\^_`{\|}~]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])+(\.([a-z]|\d|[!#\$%&'\*\+\-\/=\?\^_`{\|}~]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])+)*)|((\x22)((((\x20|\x09)*(\x0d\x0a))?(\x20|\x09)+)?(([\x01-\x08\x0b\x0c\x0e-\x1f\x7f]|\x21|[\x23-\x5b]|[\x5d-\x7e]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(\\([\x01-\x09\x0b\x0c\x0d-\x7f]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]))))*(((\x20|\x09)*(\x0d\x0a))?(\x20|\x09)+)?(\x22)))@((([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))\.)+(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))\.?$/i,
		mobile: /^1[0-9]{10}$/,
		birthday: /^[0-9]{4}-[0-9]{2}-[0-9]{2}$/,
		phone: /^([\+][0-9]{1,3}[ \.\-])?([\(]{1}[0-9]{2,6}[\)])?([0-9 \.\-\/]{3,20})((x|ext|extension)[ ]?[0-9]{1,4})?$/,
		number: /^[\-\+]?(([0-9]+)([\.]([0-9]+))?|([\.]([0-9]+))?)$/,
		qq: /^[0-9]{5,10}$/,
		post: /^[0-9]{6}$/
	}
	
	nehnre.allRules = {
        "required": { // Add your regex rules here, you can take telephone as an example
            "regex": "none",
            "alertText": "* ���ֶ�Ϊ����",
            "alertTextCheckboxMultiple": "* ��ѡ��һ��",
            "alertTextCheckboxe": "* ������ѡ��һ��ѡ��"
        },
        "minSize": {
            "regex": "none",
            "alertText": "* ���� ",
            "alertText2": " ���ַ�"
        },
        "maxSize": {
            "regex": "none",
            "alertText": "* ��� ",
            "alertText2": " ���ַ�"
        },
        "min": {
            "regex": "none",
            "alertText": "* ��Сֵ�� "
        },
        "max": {
            "regex": "none",
            "alertText": "* ���ֵ�� "
        },
        "past": {
            "regex": "none",
            "alertText": "* �ڴ�����֮ǰ�� "
        },
        "future": {
            "regex": "none",
            "alertText": "* �ڴ�����֮�� "
        },	
        "maxCheckbox": {
            "regex": "none",
            "alertText": "* ���ѡ�� ",
            "alertText2": " ��ѡ��"
        },
        "minCheckbox": {
            "regex": "none",
            "alertText": "* ����ѡ�� ",
            "alertText2": " ��ѡ��"
        },
        "equals": {
            "regex": "none",
            "alertText": "* �����ֶβ�һ��"
        },
        "phone": {
            // credit: jquery.h5validate.js / orefalo
            "regex": /^([\+][0-9]{1,3}[ \.\-])?([\(]{1}[0-9]{2,6}[\)])?([0-9 \.\-\/]{3,20})((x|ext|extension)[ ]?[0-9]{1,4})?$/,
            "alertText": "* �Ƿ��绰����"
        },
        "email": {
            // Shamelessly lifted from Scott Gonzalez via the Bassistance Validation plugin http://projects.scottsplayground.com/email_address_validation/
            "regex": /^((([a-z]|\d|[!#\$%&'\*\+\-\/=\?\^_`{\|}~]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])+(\.([a-z]|\d|[!#\$%&'\*\+\-\/=\?\^_`{\|}~]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])+)*)|((\x22)((((\x20|\x09)*(\x0d\x0a))?(\x20|\x09)+)?(([\x01-\x08\x0b\x0c\x0e-\x1f\x7f]|\x21|[\x23-\x5b]|[\x5d-\x7e]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(\\([\x01-\x09\x0b\x0c\x0d-\x7f]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]))))*(((\x20|\x09)*(\x0d\x0a))?(\x20|\x09)+)?(\x22)))@((([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))\.)+(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))\.?$/i,
            "alertText": "* �Ƿ������ʼ���ַ"
        },
        "integer": {
            "regex": /^[\-\+]?\d+$/,
            "alertText": "* �Ƿ�����"
        },
        "number": {
            // Number, including positive, negative, and floating decimal. credit: orefalo
            "regex": /^[\-\+]?(([0-9]+)([\.,]([0-9]+))?|([\.,]([0-9]+))?)$/,
            "alertText": "* �Ƿ�����"
        },
        "date": {
            "regex": /^\d{4}[\/\-](0?[1-9]|1[012])[\/\-](0?[1-9]|[12][0-9]|3[01])$/,
            "alertText": "* �Ƿ��������ͣ�ӦΪ 2011-06-27 ��ʽ"
        },
        "ipv4": {
            "regex": /^((([01]?[0-9]{1,2})|(2[0-4][0-9])|(25[0-5]))[.]){3}(([0-1]?[0-9]{1,2})|(2[0-4][0-9])|(25[0-5]))$/,
            "alertText": "* �Ƿ�IP��ַ"
        },
        "url": {
            "regex": /^(https?|ftp):\/\/(((([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(%[\da-f]{2})|[!\$&'\(\)\*\+,;=]|:)*@)?(((\d|[1-9]\d|1\d\d|2[0-4]\d|25[0-5])\.(\d|[1-9]\d|1\d\d|2[0-4]\d|25[0-5])\.(\d|[1-9]\d|1\d\d|2[0-4]\d|25[0-5])\.(\d|[1-9]\d|1\d\d|2[0-4]\d|25[0-5]))|((([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))\.)+(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))\.?)(:\d*)?)(\/((([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(%[\da-f]{2})|[!\$&'\(\)\*\+,;=]|:|@)+(\/(([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(%[\da-f]{2})|[!\$&'\(\)\*\+,;=]|:|@)*)*)?)?(\?((([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(%[\da-f]{2})|[!\$&'\(\)\*\+,;=]|:|@)|[\uE000-\uF8FF]|\/|\?)*)?(\#((([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(%[\da-f]{2})|[!\$&'\(\)\*\+,;=]|:|@)|\/|\?)*)?$/i,
            "alertText": "* �Ƿ���ַ"
        },
        "onlyNumberSp": {
            "regex": /^[0-9\ ]+$/,
            "alertText": "* ֻ��Ϊ����"
        },
        "onlyLetterSp": {
            "regex": /^[a-zA-Z\ \']+$/,
            "alertText": "* ֻ��Ϊ��ĸ"
        },
        "onlyLetterNumber": {
            "regex": /^[0-9a-zA-Z]+$/,
            "alertText": "* �����������ַ�"
        },
        "validate2fields": {
            "alertText": "* ������ HELLO"
        }
	};
	Date.prototype.format = function(format){ 
	  var o = { 
		"M+" : this.getMonth()+1, //month 
		"d+" : this.getDate(),    //day 
		"h+" : this.getHours(),   //hour 
		"m+" : this.getMinutes(), //minute 
		"s+" : this.getSeconds(), //second 
		"q+" : Math.floor((this.getMonth()+3)/3),  //quarter 
		"S" : this.getMilliseconds() //millisecond 
	  } 
	  if(/(y+)/.test(format)) format=format.replace(RegExp.$1, 
		(this.getFullYear()+"").substr(4 - RegExp.$1.length)); 
	  for(var k in o)if(new RegExp("("+ k +")").test(format)) 
		format = format.replace(RegExp.$1, 
		  RegExp.$1.length==1 ? o[k] : 
			("00"+ o[k]).substr((""+ o[k]).length)); 
	  return format; 
	} 
	String.prototype.format = function()
	{
		var args = arguments;
		return this.replace(/\{(\d+)\}/g,                
			function(m,i){
				return args[i];
			});
	}
	var _console = window.console;
	
	console = _console || {};
	console.log = console.log || function(){};
})();