window.onload = function(){
	//绑定事件
	bindEleEvent();
	alert(1);
}

function bindEleEvent(){
	//绑定list和grid日志显示格式切换事件
	var listGridUl = document.getElementById("header").getElementsByTagName("ul")[0];
	bindEvent(listGridUl, "click",function(event){
		if(document.getElementsByClassName("post").length == 1){
			return;
		}
		var target = getSrcEle();
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
function getSrcEle(){
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