$(document).ready(function() {
	  $(".first").click(function(){
		var buf = $(this).text(); 
		if(buf=="+"){
		$(this).text("-");
		}else{
			$(this).text("+");
		}
	    $(".part").css("display","none");
		$(".second").text("+");
		var ulNodef1 = $(this).next();
		var ulNodef  = ulNodef1.next();
		
		if(ulNodef.css("display")=="none"){
			ulNodef.css("display","block");
		}else{
			ulNodef.css("display","none");
		}
		/*ulNode.hide();
		ulNode.show();*/
		/*ulNode.toggle();/*数字单位毫秒，slow,fast,normal表示切换的速度*/
		//ulNode.slideToggle();/*数字单位毫秒，slow,fast,normal表示切换的速度*/
		/*ulNode.slideDown();
		ulNode.slideUp();
		*/
		})

	
    $(".second").click(function(){
		var bu = $(this).text(); 
		if(bu=="+"){
		$(this).text("-");
		}else{
			$(this).text("+");
		}
	    
		var ulNode1 = $(this).next();
		var ulNode  = ulNode1.next();
		
		if(ulNode.css("display")=="none"){
			ulNode.css("display","block");
		}else{
			ulNode.css("display","none");
		}
		/*ulNode.hide();
		ulNode.show();*/
		/*ulNode.toggle();/*数字单位毫秒，slow,fast,normal表示切换的速度*/
		//ulNode.slideToggle();/*数字单位毫秒，slow,fast,normal表示切换的速度*/
		/*ulNode.slideDown();
		ulNode.slideUp();
		*/
		})
});