(function(){
	nehnre = window.nehnre || {};
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
	
	console = window.console || {};
	console.log = console.log || function(){};
	
	
	//storage
	nehnre.storage = (function() {
		var a = window.localStorage;
		if (window.ActiveXObject) {
			store = document.documentElement;
			STORE_NAME = "localstorage";
			try {
				store.addBehavior("#default#userdata");
				store.save(STORE_NAME)
			} catch(b) {}
			return {
				set: function(g, h) {
					try {
						store.setAttribute(g, h);
						store.save(STORE_NAME)
					} catch(j) {}
				},
				get: function(g) {
					try {
						store.load(STORE_NAME);
						return store.getAttribute(g)
					} catch(h) {
						return ""
					}
				},
				del: function(g) {
					try {
						store.removeAttribute(g);
						store.save(STORE_NAME)
					} catch(h) {}
				}
			}
		} else {
			if (a) {
				return {
					get: function(g) {
						return a.getItem(g) == null ? null: unescape(a.getItem(g))
					},
					set: function(g, h, j) {
						a.setItem(g, escape(h))
					},
					del: function(g) {
						a.removeItem(g)
					},
					clear: function() {
						a.clear()
					},
					getAll: function() {
						var g = a.length,
						j = null,
						m = [];
						for (var h = 0; h < g; h++) {
							j = a.key(h),
							m.push(j + "=" + this.getKey(j))
						}
						return m.join("; ")
					}
				}
			} else {
				return {
					get: function(n) {
						var j = document.cookie.split("; "),
						h = j.length,
						g = [];
						for (var m = 0; m < h; m++) {
							g = j[m].split("=");
							if (n === g[0]) {
								return unescape(g[1])
							}
						}
						return null
					},
					set: function(g, h, j) {
						if (! (j && typeof j === date)) {
							j = new Date(),
							j.setDate(j.getDate() + 1)
						}
						document.cookie = g + "=" + escape(h) + "; expires=" + j.toGMTString()
					},
					del: function(g) {
						document.cookie = g + "=''; expires=Fri, 31 Dec 1999 23:59:59 GMT;"
					},
					clear: function() {
						var j = document.cookie.split("; "),
						h = j.length,
						g = [];
						for (var m = 0; m < h; m++) {
							g = j[m].split("=");
							this.deleteKey(g[0])
						}
					},
					getAll: function() {
						return unescape(document.cookie.toString())
					}
				}
			}
		}
	})(); 
})();