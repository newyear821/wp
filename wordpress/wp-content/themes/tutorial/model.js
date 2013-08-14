window.onload = function(){
	//绑定事件
	bindEleEvent();
	
}

function bindEleEvent(){
	//绑定list和grid日志显示格式切换事件
	var listGridUl = document.getElementById("header").getElementsByTagName("ul")[0];
	bindEvent(listGridUl, "click",function(event){
		if(document.getElementsByClassName("post").length == 1){
			return;
		}
		var target = getSrcEle(event);
		var type = target.parentNode.id;
		if(type == "list"){
			var posts = document.getElementsByClassName("postgrid"); //ie8以下不兼容
			var len = posts.length;
			for(var i=len-1; i>-1; i--){
				posts[i].className = "post";
			}
		}else if(type == "grid"){
			var posts = document.getElementsByClassName("post"); //ie8以下不兼容
			var len = posts.length;
			for(var i=len-1; i>-1; i--){
				posts[i].className = "postgrid";
			}
		}
	});

	//侧边滑出的定时器
	var navTimer = [];
	//绑定侧边navigator的鼠标mouseover事件
	var navUl = document.getElementsByClassName("navigator")[0].getElementsByTagName("ul")[0];
	bindEvent(navUl, "mouseover",function(event){
		var target = getSrcEle(event);
		var type = "";
		if(target.nodeName == "A"){
			var name = target.parentNode.className;
			clearTimeout(navTimer[name]);
			navShow(target);
		}else if(target.nodeName == "LI"){
			var name = target.className;
			var link = target.getElementsByTagName("a")[0];
			clearTimeout(navTimer[name]);
			navShow(link);
		}
		
	});

	//绑定侧边navigator的鼠标mouseout事件
	var navUl = document.getElementsByClassName("navigator")[0].getElementsByTagName("ul")[0];
	bindEvent(navUl, "mouseout",function(event){
		var target = getSrcEle(event);
		var type = "";
		if(target.nodeName == "LI"){
			var name = target.className;
			var link = target.getElementsByTagName("a")[0];
			navTimer[name] = setTimeout(navHide(link),10);
		}else if(target.nodeName == "A"){
			var name = target.parentNode.className;
			navTimer[name] = setTimeout(navHide(target),10);
		}
		
	});

}


//侧边navigator滑走
function navHide(link){
	link.style.marginLeft = "-80px";
	/*
	var left = parseFloat(link.style.marginLeft);
	if(left > -80){
		newleft = left - 5;
		link.style.marginLeft = newleft + "px";
		console.log(link.style.marginLeft);
		console.log(Date.parse(new Date()));
		setTimeout(function(num){
			return function(){
				navShow(num);
			}
		}(link),20);
	}else if(left == 0 || left > 0){
		link.style.marginLeft = "0px";
	}
	*/
}
//侧边navigator滑入
function navShow(link){
	//link.style.marginLeft = "0px";
	
	var left = parseFloat(link.style.marginLeft);
	if(left < 0){
		newleft = left + 4;
		link.style.marginLeft = newleft + "px";
		//console.log(link.style.marginLeft);
		//console.log(Date.parse(new Date()));
		setTimeout(function(num){
			return function(){
				navShow(num);
			}
		}(link),20);
	}else if(left == 0 || left > 0){
		link.style.marginLeft = "0px";
	}
	
}



//绑定事件，兼容ie
function bindEvent(node, type, handler){
	if(node.addEventListener){
		node.addEventListener(type, handler);
	}else if(attachEvent){
		node.attachEvent(type, handler);
	}else{
		node["on" + type] = handler;
	}
}
//获取产生事件的对象，兼容ie
function getSrcEle(event){
	var ele;
	var srcEle;
	if(event){
		ele = event;
		srcEle = ele.target;
	}else{
		ele = window.event;
		srcEle = ele.srcElement;
	}
	return srcEle;
}
//阻止冒泡
function stopBubble(event){
	if(event.stopPropagation){
		event.stopPropagation();
	}else if(window.event.cancelBubble){
		window.event.cancelBubble = true;
	}
}