$(document).ready(function(){
     
     
     var cat_changed = 0;
     
     function setSize(){
		$("#mainheader").height($(window).height()-$("#menu-container").outerHeight());
		$("#content").css("top", $("#menu-container").outerHeight());
	};
	
	$(window).resize(function(){
		setSize();
	});
	setSize();

	$(".cat_filter").click(function(){
		var id= $(this).attr('class').split('category-filter-').pop().split(' ').shift();
		var c = '.subcategory-' + id; 
		
		if ( !cat_changed ) { //if user has already clicked on a category
			$(".cat_filter").removeClass("active");
			$(".sub-post").fadeOut();
			cat_changed = 1;
				
		}
		if ( $(this).hasClass("active") ){
			$(this).removeClass("active");
			$(c).fadeOut();
			
		} else {
			$(this).addClass("active");
			$(c).fadeIn();
		}
		
	});
	
    $("#content").scroll(function(){
        var distanceY = $("#content").scrollTop();
		var shrinkOn = 200;
		var header = $("#menu-container");
		
        if (distanceY > shrinkOn) {
            header.addClass("smaller");
            setSize();
            
        } else {
            if (header.hasClass("smaller")) {
                header.removeClass("smaller");
                setSize();
          	}
        }


        if($('#call-to-action').offset().top + $('#call-to-action').height() >= $('#footer').offset().top - 10) {
        	$('#call-to-action').css('bottom', $('#footer').height());
        }

    	if($(document).scrollTop() + window.innerHeight < $('#footer').offset().top) {
        	$('#call-to-action').css('bottom', 0);
    	}

    });

});
