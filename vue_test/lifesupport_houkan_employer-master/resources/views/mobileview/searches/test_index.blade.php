@extends('mobileview.layouts.app')

@section('content')

    @include('mobileview.searches.new_search_popup')



@endsection

@push('customjs')

	<script type="text/javascript">
// for searh popup
    var default_text = "求人を選択";

    $(document).on("click",".expand-trigger",function(){
        var isExpanded = $(this).parent().hasClass("expanded");
        if(isExpanded){
            $(this).parent().removeClass("expanded");
            $(this).next(".expand-area").slideUp(200);      
        }else{              
            $(this).next(".expand-area").slideDown(200, function(){
                $(this).parent().addClass("expanded");
            });
        }           
    })

    $(document).on("click",".worrisome-checkbox",function(){
        var isChecked = $(this).prop("checked");
        if(isChecked){
            $(".worrisome-row").fadeIn("200");
            console.log("checked");
        }else{
            $(".worrisome-row").fadeOut("200");
            console.log("unchecked");
        }
    })

    $(document).on("click",".message-dismiss",function(){
        $(this).parent().removeClass("message-included");
        $(this).parent().text(default_text);
    })

    $(document).on("click",".example_clone_button_1",function(){
        eleClone("example_clone_1","example_cloned_element_container_1");
        // just parse class name
    })

    $(document).on("click",".example_clone_button_2",function(){
        eleClone("example_clone_2","example_cloned_element_container_2");
    })

    $(document).on("click",".remove_clone",function(){
        var cloned_element_class = $(this).data("clone_remove_element_class");
        var count = $("."+cloned_element_class).length;
        if(count > 1) {
            $(this).parents("."+cloned_element_class).remove();
        }   
    })

    $(document).on("click",".search-popup-dismiss",function(){
        $(".page-popup-style-1-container").fadeOut(200);
        $(".page-popup-style-1-footer").fadeOut(200, function(){
            $("body").removeClass("search-popup-is-opening");
        });
    })

    $(document).on("click",".open-new-search-popup",function(event){
        event.preventDefault();
        $("body").addClass("search-popup-is-opening");
        $(".page-popup-style-1-container").fadeIn(200);
        $(".page-popup-style-1-footer").fadeIn(200);
    })

    function eleClone(ele_to_clone,where_to_place,remove_able = true) {
        var element = $("."+ele_to_clone+":last");

        var clone_element_id = element.data("clone_element_id")+1;

        var cloned_element = element.clone().data("clone_element_id",clone_element_id).appendTo("."+where_to_place);
    }
	</script>

@endpush