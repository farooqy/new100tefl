// JavaScript Document
$(document).ready(function(){
	$('.toggleBtn').click(function(){
		if($(this).hasClass('On'))
		{
			$(this).removeClass('On');
			$(this).addClass('Off');
			$('.collapse').slideUp(1000);
			$(this).text('Read More');
		}
		else
		{
			$(this).addClass('On');
			$(this).removeClass('Off');
			$('.collapse').slideDown(1000);
			$(this).text('collapse');
		}
	});
    $('.givenContent').html($('.givenContent').text());
	$('#editor').each(function () {
    var editor = new Jodit(this, {
    });
	});

	$('.search-icon').click(function(){
		if($('.searchdiv').hasClass('visible'))
		{
			$('.searchdiv').css('display','none');
			$('.searchdiv').removeClass('visible');
		}
		else
		{
			$('.searchdiv').css('display','inline');
			$('.searchdiv').addClass('visible');
		}
	});
	$('.menu-icon').click(function(){
		$('.menuhover').slideDown(1000);
	});
	$('.toggle-menu').click(function(){
		$('.menuhover').slideUp(1000);
	});

	$('.insertImage').click(function(e){
		e.preventDefault();
		$('.filePathHolder').text('Loading...');
		$('.addFile').click();
	});

	$('.addFile').change(function(){
		// alert('will insert image');
		$('.submitAddFile').click();
	});
	$('#addFileForm').submit(function(e){
		e.preventDefault();
		// alert('form submitted');
		var formdata = new FormData(this);
		// formdata.append('addFileFile', 'something')
		// var url  = ($('.fileTargetUrl').val() == undefined ? 'addFile': $('.fileTargetUrl').val());
		var url = $(this).attr('action');
		// console.log(JSON.stringify(formdata));
		ajax_call(url, formdata, 'fileForUrl');
	});

});


function ajax_call(url, data, indicator)
{
	$.ajax({
		method:"POST",
		url: url,
		data: data,
	    processData: false,
	    contentType: false,
		success: function(data){
			data = JSON.parse(data);
			// alert('success '+JSON.stringify(data));
			if(data.success === true)
			{
				$('.filePathHolder').removeClass('bg-danger');
				$('.filePathHolder').addClass('bg-success');
				$('.filePathHolder').text(data.fileurl);
			}
			else
			{
				$('.filePathHolder').addClass('bg-danger');
				$('.filePathHolder').removeClass('bg-success');
				$('.filePathHolder').text('Failed to add file');
			}

			
		},  
		statusCode: {
			404: function() {
		    	alert( "page not found" );
		   },
		   500: function(){
		   		alert('There is server error. Please contact support');
		   },
		   422: function(error){
		   	// alert(JSON.stringify(error.responseJSON.message));
		   	// alert(JSON.stringify(error.responseJSON.errors.addFile[0]));
		   	$('.filePathHolder').addClass('bg-danger');
		   	$('.filePathHolder').text(error.responseJSON.errors.addFile[0]);
		   }
		},
	})
	.done(function(){
		console.log('done request');

	})
	.fail(function(error){
		alert('request failed '+JSON.stringify(error.statusText+' '+error.status));
	});
}