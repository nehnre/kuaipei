var scrollingBox;
var scrollingInterval;
var reachedBottom=false;
var bottom;

function initScrolling(){

 scrollingBox = document.getElementById("activity_content");
 scrollingInterval = setInterval("scrolling()",50);
 scrollingBox.onmouseover = over;
 scrollingBox.onmouseout = out; 
}
function scrolling(){
 var origin = scrollingBox.scrollTop++;
 if(origin == scrollingBox.scrollTop){
  if(!reachedBottom){
   scrollingBox.innerHTML+=scrollingBox.innerHTML;
   reachedBottom=true;
   bottom=origin;
  }else{
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
$(function(){
	initScrolling();
});