$(document).ready(function(){
	
	$("#loginpopup").bind("click", function() {
		$('#login').modal('toggle');
	});
	
	 $('#signup-link').bind("click", function() {
	    $('#login').modal('hide');
	     $('#signup').modal('toggle');
	 });
	 $('#login-link').bind("click", function() {
	    $('#signup').modal('hide');
	     $('#login').modal('toggle');
	 });
	 
	 // Boostrap Slider
	 $('.carousel').carousel();
	 
			// navigation click actions	
			$('.scroll-link').on('click', function(event){
				event.preventDefault();
				var sectionID = $(this).attr("data-id");
				scrollToID('#' + sectionID, 750);
				$('.navbar-nav li').each(function(){
					$(this).removeClass("active");
				});
				$(this).parent().addClass("active");
			});
			// scroll to top action
			$('.scroll-top').on('click', function(event) {
				event.preventDefault();
				$('html, body').animate({scrollTop:0}, 'slow'); 		
			});
			// mobile nav toggle
			$('#nav-toggle').on('click', function (event) {
				event.preventDefault();
				$('#main-nav').toggleClass("open");
			});
		
		// scroll function
		function scrollToID(id, speed){
			var offSet = 50;
			var targetOffset = $(id).offset().top - offSet;
			var mainNav = $('#main-nav');
			$('html,body').animate({scrollTop:targetOffset}, speed);
			if (mainNav.hasClass("open")) {
				mainNav.css("height", "1px").removeClass("in").addClass("collapse");
				mainNav.removeClass("open");
			}
		}
		if (typeof console === "undefined") {
		    console = {
		        log: function() { }
		    };
		}


		function sign_up_form_validation(){
			$('#sign_up_form').validate({
	 			onkeyup: false,
                onfocusout: false,
				rules: {
					username: {
						required: true,
						minlength: 5
					},
					password: {
						required: true,
						minlength: 8
					},
					password_confirmation: {
						required: true,
						minlength: 8,
						equalTo: "#password"
					},
					email: {
						required: true,
						email: true
					},
					company: {
						required: true
					},
					description: {
						required: true
					}
				},
				messages: {
					username: {
						required: "Please enter a username",
						minlength: "Your username must consist of at least 5 characters"
					},
					password: {
						required: "Please enter a password",
						minlength: "Your password must be at least 8 characters long"
					},
					password_confirmation: {
						required: "Please enter password confirmation",
						minlength: "Your password must be at least 8 characters long",
						equalTo: "Please enter the same password as above"
					},
					email: "Please enter a valid email address",
					company: "Please enter a company name",
					description: "Please enter description",
				}
			});
		}

		function login_form_validation(){
			$('#login_form').validate({
	 			onkeyup: false,
                onfocusout: false,
				rules: {
					username: {
						required: true,
					},
					password: {
						required: true,
					},
					
				},
				messages: {
					username: {
						required: "Please enter a username",
					},
					password: {
						required: "Please enter a password",
					}
				}
			});

		}
	 $('#sign_up_form').on('submit',ajax_submit);
	 $('#login_form').on('submit',ajax_submit);

	 function ajax_submit(event){ 
	 	event.preventDefault();
	 	$('label[id*="-error"]').text('');
	 	$('#login-error').css("display","none");
		var $form = $( this );
		if($(this).attr('id')=='sign_up_form'){
			sign_up_form_validation();
		}else if($(this).attr('id')=='login_form'){
			login_form_validation();
		}
		if( $form.valid() ) {
		data = $form.serialize();
		url = $form.prop( "action" );
		var posting = $.post( url, { formData: data } );
		posting.done(function( data) {
			if(data.fail) {
				if(data.login_form){
			    	$('#login-error').css("display","inline-block");
			    }else{
			    $.each(data.messages, function( index, value ) {
			        var errorDiv = '#'+index+'-error';
			        $(errorDiv).css("display","inline-block");
			         $(errorDiv).empty().append(value);
			    });
				}
			} 
		    if(data.success) {
		       window.location.replace("/");
		    } //success
		}); //done
		}
		return false;
		}

});

