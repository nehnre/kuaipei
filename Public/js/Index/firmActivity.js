//����¼���Ӧ�����ĺ������뱾Ч���޹�
function addEventSimple(obj,evt,fn){
 if(obj.addEventListener){
  obj.addEventListener(evt,fn,false);
 }else if(obj.attachEvent){
  obj.attachEvent('on'+evt,fn);
 }
}
addEventSimple(window,'load',initScrolling);
//������Ҫ����������
var scrollingBox;
var scrollingInterval;
//���ڼ�¼�Ƿ񡰹���ͷ����һ��
var reachedBottom=false;
//��¼��һ�ι���ͷʱ���scrollTop
var bottom;
//��ʼ������Ч��
function initScrolling(){
 scrollingBox = document.getElementById("activity_content");
 //����
 scrollingInterval = setInterval("scrolling()",10);
 //��껮��ֹͣ����Ч��
 scrollingBox.onmouseover = over;
 //��껮���ظ�����Ч��
 scrollingBox.onmouseout = out; 
}
//����Ч��
function scrolling(){
 //��ʼ����,origin��ԭ��scrollTop
 var origin = scrollingBox.scrollTop++;
 //�����ͷ��
 if(origin == scrollingBox.scrollTop){
  //����ǵ�һ�ε�ͷ
  if(!reachedBottom){
   scrollingBox.innerHTML+=scrollingBox.innerHTML;
   reachedBottom=true;
   bottom=origin;
  }else{
   //�Ѿ���ͷ����ֻ��ظ�ͷ��β��Ч��
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