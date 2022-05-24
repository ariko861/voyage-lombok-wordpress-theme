$(document).ready(function(){

    var cnt = 1;
	
var images = [];
function preload() {
    for (var i = 0; i < arguments.length; i++) {
        images[i] = new Image();
        images[i].src = preload.arguments[i];
    }
}

if ( typeof js_data !== 'undefined' ){
	//-- usage --//
	for (var i=0; i < js_data.length; i++){
		preload(js_data[i]);
	}
	    function Slider(){
			
			$("#image-slide").fadeOut("slow",function() {
				$(this).attr("src", js_data[cnt]).fadeIn("slow");
				if ( cnt >= js_data.length -1 ) cnt =0;
				else cnt++;
			});
		};
	    
	    $(function() {
			if (js_data.length > 1){
	         setInterval(Slider, 6000);
			}
	    });	
}
    
});
 
