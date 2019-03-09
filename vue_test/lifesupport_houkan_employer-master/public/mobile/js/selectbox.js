$(document).ready(function(){
	
	var select_box_length = $(".e-select").length;

	for (var i = 0; i < select_box_length; i++) {
			var all_selectbox_in_the_body = $("body").find(".e-select").eq(i).children("select").children("option").length;
			var option = "";
			for (var x = 0; x < all_selectbox_in_the_body; x++) {
					for (var y = 0; y < 1; y++) {
						var selected_text = $("body").find(".e-select").eq(i).children("select").children("option:selected").html();
						var selected_option = "<div>"+selected_text+"</div>";
					};
				var option_text = $("body").find(".e-select").eq(i).children("select").children("option").eq(x).text();
				option += "<li data-option-value='"+x+"'>";
				option += option_text;
				option += "</li>";
			}
		$("body").find(".e-select").eq(i).append(selected_option+"<ul>"+option+"</ul>");
	}

	var checkbox_length = $(".h-checkbox").length;

	for (var i = 0; i < checkbox_length; i++) {
		var this_checkbox = $("body").find(".h-checkbox").eq(i).children("input");
		if($(this_checkbox).prop("checked") == true) {
			$("body").find(".h-checkbox").eq(i).children("span").css("display","block");
		}else{
			$("body").find(".h-checkbox").eq(i).children("span").css("display","none");
		}
	}


	$(document).on("click", ".e-select li", function(){
		var index = ($(this).data("option-value"))+1;
		$(this).parent().parent().children(".select").val(index);
		var selected_text = $(this).parent().parent().children(".select").children("option:nth-child("+index+")").text();
		$(this).parent().parent().children("div").text(selected_text);
		close_all_selectbox();
	})

	$(document).on("click",".e-select div", function(){
		if($(this).next(".e-select ul").is(":hidden")){
			close_all_selectbox();
			$(this).addClass("show-select");
			$(this).next(".e-select ul").slideDown(120);
		}else{
			$(this).removeClass("show-select");
			$(this).next(".e-select ul").slideUp(120);
		};
	});

	$("body").click(function(event) {
		close_all_selectbox();
	});

	function close_all_selectbox(){
		$(".e-select ul").slideUp(120);
		$(".e-select div").removeClass("show-select");
	}

	$(document).on("click", ".h-checkbox input", function(){
		if($(this).prop("checked") == true) {
			$(this).parent().children("span").css("display","block");
		}else{
			$(this).parent().children("span").css("display","none");
		}
	})

	$(document).on("click", ".open_popup", function(){
		var popup_name = $(this).data("open_popup");
		var classes = $(this).attr("class").split(' ');
		var classes_length = classes.length;
		var to_open = classes[classes_length-1];
		var to_open_popup_name_only = to_open.slice(11);
		$(".h-wrapper").fadeIn(300);
		$("body").find("[popup_name = '"+to_open_popup_name_only+"']").fadeIn(300);
	});

	$(document).on("click", ".h-popup-close", function(){
		$(".h-popup-container").fadeOut(300);
		$(".h-wrapper").fadeOut(300);
	});

	$(document).on("change", ".ty", function(){
		var ee = $(".ty").files();
		console.log(ee);
	})

});