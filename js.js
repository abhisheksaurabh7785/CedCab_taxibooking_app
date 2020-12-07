$(document).ready(function(){
    /*---------cedmicro-hide luggage box----------*/	
	$('#cab').on('change',function(){
    	if($(this).val()=='CedMicro'){
    		 $('.luggage').hide();
    		$('.luggage input').val('');
            alert('luggage in not allow in CedMicro');
    	} else {
    		$('.luggage').show();
    	}
    	// console.log(this)
    });
    /*-----------pickup and drop validation---------*/
	$('select#pickup').on('change',function(){
		let loc = $(this).val();
		let children = $('select#drop').children();
		$.each(children,function(index, item){
				if(item.innerText == loc){
				    $(this).hide();
				} else {
				    $(this).show();
				}
			});
	});
	$('select#drop').on('change',function(){
		let loc = $(this).val();
		let children = $('select#pickup').children();
		$.each(children,function(index, item){
			if(item.innerText == loc){
			    $(this).hide();
			} else {
			    $(this).show();
			}
	    });
	});
    /*---------bookbutton hide--------*/
//     $('input, select').focus(function(){
// $('#bookid').hide();});
    /*-------onclick calculate logic-----------*/
    $('#book').hide();
    $("#calculate").click(function(){
	  	var pickup = $( "select#pickup option:checked" ).val();
	    var drop = $( "select#drop option:checked" ).val();
	    var cab = $( "select#cab option:checked" ).val();
	    var luggage = $( "#luggagewt" ).val();
    /*------luggage box numerical value validation-------*/	    
	    if(isNaN(luggage)){
	    	$("#validnum").html("Please enter numeric value!");
	    	return false;
	    } else{
	    	$("#validnum").html("");
	    }

    /*-------empty field  validation------*/	    
	    if (pickup == "") {
	    	$("#validpick").html("Pickup field is mandatory!");
            // alert("Pickup field is mandatory");
            return false;
        } else if (drop == "") {
        	$("#validdrop").html("Drop field is mandatory!");
            // alert("Destination field is mandatory");
            return false;
        } else if (cab == "") {
        	$("#validcab").html("CabType field is mandatory!");
            // alert("CAB type is mandatory");
            return false;
        } else{
        	$("#validdrop").html("");
        	$("#validpick").html("");
        	$("#validcab").html("");
    /*---------ajax code--------------*/        	
        	$.ajax({
                url  : "php1.php",
                type : "POST",
                data : {pickup : pickup, drop : drop, cab : cab, luggage : luggage},
                // dataType: "json",
                success: function (result) {
                    // alert(data);
                    $('#result').html(result);
                    $('#book').show();
                    $('select, input').focus(function(){
                        $('#book').hide();
                    });
                   // $(#bookid).show();
                },
                error: function () {
                    alert('error');
                }
	        });
        };
    });
});

