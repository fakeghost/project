window.onload = function () {
	if(document.getElementsByClassName('box_6')[0] !== undefined){
		slide();
		slideBox();
		height();
		setInterval(height,1000);
		draw();
	}
	else{
		document.body.style.overflowX = "hidden";
		document.body.style.background = "#eeeeee";
		setInterval(doc_height,1000);
		var btn = document.getElementsByClassName('icon-reorder')[0];
		var sidebar = document.getElementsByClassName('sidebar')[0];
		btn.onclick = function(){
			right = window.getComputedStyle(sidebar,null).right;
			s_slide();
		}
		sidebar.onclick = function(){
			s_right(sidebar);
		}
		if(document.getElementsByClassName('map')[0] !== undefined){
			control();
		}
	}
}



//js图片控制高度
function height(){
	var box_1 = document.getElementsByClassName('box_1')[0];
	var box_1_2 = document.getElementsByClassName('box_1_2')[0];
	var img = box_1_2.getElementsByTagName('img');
	for (var i = 0; i < img.length; i++) {
		img[i].style.height = box_1.offsetHeight + 'px';
	}
}



//画出圆形进度条
function draw(){
	var canvas = document.getElementsByClassName('canvas');
	for (var i = 0; i < 4; i++) {
		if (canvas[i].getContext) {
		var ctx = new Array();
		ctx[i] = canvas[i].getContext('2d');
	}
		var color_array = ["#EB3939","#29EF81","#28C6FC","#FFF92F"];
		ctx[i].beginPath();
		moveTo(50,50);
		ctx[i].arc(50,50,30,1.5*Math.PI,1.1*Math.PI,false);
		ctx[i].strokeStyle = color_array[i];
		ctx[i].lineWidth = 5.0;
		ctx[i].stroke();
		ctx[i].beginPath();
		ctx[i].font = "1em Microsoft YaHei"
		ctx[i].fillStyle = "white";
		ctx[i].fillText("80",40,55);
		ctx[i].closePath();
	}
}



//控制底部变黑
function slide(){
	var path = document.getElementsByTagName('footer')[0].getElementsByClassName('col-md-3');
	for(var i = 0; i < 4; i++){
	path[i].addEventListener('click',function(){
		for(var n = 0; n < 4; n++){
			path[n].className = "col-md-3";
		}
		this.className += ' active_2';
	})
}
}




//焦点轮播图
function slideBox(){
	var content = document.getElementsByClassName('content')[0];
	var button = document.getElementsByClassName('btn')[0];
	var box_1 = document.getElementsByClassName('box_1')[0];
	var box_1_2 = document.getElementsByClassName('box_1_2')[0];
	var imgArray = box_1_2.getElementsByTagName('img');
	var ctn = document.getElementsByClassName('ctn')[0];
	var iconbox = document.getElementsByClassName('iconbox')[0];
	button.onclick = function(){
		ctn.style.transform = "translateX(0%)"
	}
	var nextId = 0;
	for (var i in imgArray) {
		console.log(i);
		imgArray[i].onclick = function(){
			var value = this.getAttribute('rel');
			if(parseInt(value)+1 < 5){
				this.parentNode.style.transform = "translateX("+(-value*25)+"%)";
				console.log(this.parentNode);
			}
			else{
				value = 0;
				this.parentNode.style.transform = "translateX("+(value)+"%)"
			}
		}
	}
}




//控制single页的高度
function doc_height(){
	var nav_height = document.getElementsByTagName('header')[0].offsetHeight;
	var c_height = document.documentElement.clientHeight;
	var f_height = document.getElementsByTagName('footer')[0].offsetHeight;
	document.getElementsByClassName('single_container')[0].style.minHeight = c_height - nav_height - f_height + 'px';
	var s_height = document.body.offsetHeight;
	document.getElementsByClassName('sidebar')[0].style.height = s_height + 'px';
}


// 侧边栏向左滑动效果
function s_slide(){
	var sidebar = document.getElementsByClassName('sidebar')[0];
	sidebar.style.right = window.getComputedStyle(sidebar,null).right;
	timer = setInterval(function(){
		var speed = Math.floor(parseInt(sidebar.style.right)/10);
		if(parseInt(sidebar.style.right) <0){
			sidebar.style.right = parseInt(sidebar.style.right) - speed + 'px';
		}
		else{
			sidebar.style.right = 0 + 'px';
			clearInterval(timer);
		}
	},15);
}



//向右滑动
function s_right(sidebar){
	sidebar.style.right = window.getComputedStyle(sidebar,null).right;
	timer = setInterval(function(){
		console.log(right);
		if(parseInt(sidebar.style.right) > parseInt(right)){
			sidebar.style.right = Math.floor(parseInt(sidebar.style.right)) + Math.floor(parseInt(right)/10) + 'px';
		}
		else{
			clearInterval(timer);
		}
	},20)
}


//控制面板
function control(){
	var btn = document.getElementsByClassName('control')[0].getElementsByClassName('btn-success')[0];
	var img = document.getElementsByClassName('map')[0].getElementsByTagName('img');
	var control = document.getElementsByClassName('control')[0];
	btn.onclick = function(){
		for (var i = 0; i < img.length; i++) {
			control.style.opacity = 0;
			img[i].style.opacity = 1;
			img[i].style.transform = "translateY("+(8)+"em)";
		}
	}
}
//canvas画图
// function Map_draw(){
// 	var canvas_2 = document.getElementById('canvas_2');
// 	if(canvas_2.getContext){
// 		var ctx = canvas_2.getContext('2d');
// 		var img = new Image();
// 		img.src = "../wp-content/themes/zhaoyinghui/images/MDN.png";
// 		img.onload = function(){
// 			ctx.drawImage(img,0,0,600,600,0,150,200,200)
// 		}
// 	// canvas_2.onclick = function(e){
// 	// 	ctx.beginPath();
// 	// 	ctx.moveTo()
// 	// 	ctx.drawImage
// 	// }
// }
// }



// 获取鼠标点击屏幕的位置
// function getMousePos(event){
// 	var e = event || window.event;
// 	return {'x':e.clientX,'y':e.clientY}
// }






















//控制滚动速度
// function scroll(){
// 	var EventUtil = {
// 		addHandler: function(element, type, handler){
// 			if(element.addEventListener){
// 				element.addEventListener(type,handler,false);
// 			}
// 			else if(element.attachEvent){
// 				element.attachEvent('on',type,handler);
// 			}
// 			else{
// 				element['on',type] = handler;
// 			}
// 		}
// 	},
// 		getEvent: function(event){
// 		return event ? event : window.event;
// 	},
// 		stopPropagation: function(event){
// 		event = event || window.event;
// 		if (event.stop) {}
// 	}
// }