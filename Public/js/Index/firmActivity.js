//添加事件响应函数的函数，与本效果无关
function addEventSimple(obj,evt,fn){
 if(obj.addEventListener){
  obj.addEventListener(evt,fn,false);
 }else if(obj.attachEvent){
  obj.attachEvent('on'+evt,fn);
 }
}
addEventSimple(window,'load',initScrolling);
//保存想要滚动的容器
var scrollingBox;
var scrollingInterval;
//用于记录是否“滚到头”过一次
var reachedBottom=false;
//记录第一次滚到头时候的scrollTop
var bottom;
//初始化滚动效果
function initScrolling(){
 scrollingBox = document.getElementById("activity_content");
 //滚动
 scrollingInterval = setInterval("scrolling()",10);
 //鼠标划过停止滚动效果
 scrollingBox.onmouseover = over;
 //鼠标划出回复滚动效果
 scrollingBox.onmouseout = out; 
}
//滚动效果
function scrolling(){
 //开始滚动,origin是原来scrollTop
 var origin = scrollingBox.scrollTop++;
 //如果到头了
 if(origin == scrollingBox.scrollTop){
  //如果是第一次到头
  if(!reachedBottom){
   scrollingBox.innerHTML+=scrollingBox.innerHTML;
   reachedBottom=true;
   bottom=origin;
  }else{
   //已经到头过，只需回复头接尾的效果
   scrollingBox.scrollTop=bottom;
  }
 }
}
function over(){
 clearInterval(scrollingInterval);
}
function out(){
 scrollingInterval = setInterval("scrolling()",50);
}