$(function() {
    $(".menu-icon").click(function(){
        $(".responsive-menu").show();
    });
    $(".close-btn").click(function(){
        $(".responsive-menu").hide();
    });
});

$( document ).ready(function() {
var base_url="http://m.pincare.in/";
	
    FB.init({ appId: '1862990167252944', xfbml: true, cookie: true, oauth: true });

	$("#login_btn").click(function(){

		$(window).on('load', function() { // makes sure the whole site is loaded 
			$('#status').fadeOut(); // will first fade out the loading animation 
            $('#preloader').delay(350).fadeOut('slow'); // will fade out the white DIV that covers the website. 
            $('body').delay(350).css({'overflow':'visible'});
		});

	 FB.login(function(response) {
			if (response.authResponse) {
				//alert("REDIRECT FB.LOGIN 1");
				
				window.location = "http://m.pincare.in/welcome/login";
				//$(".login_loading").show();
				/*
				console.log('Welcome!  Fetching your information.... ');
				FB.api('/me', function(response) {
					console.log('Good to see you, ' + response.name + '.');
				});
		 		*/
				
				
			} else {
				//alert("REDIRECT FB.LOGIN 2");
				window.location = "http://m.pincare.in/welcome/login";
			}
		 }, {scope: 'user_friends,email, user_about_me, user_birthday, user_hometown, user_website,email,publish_actions,publish_pages,manage_pages'});
     });
 

/*		   FB.getLoginStatus(function (response) 
    {
    if (response.status === 'connected') 
    {
	FB.api('/1619797934713958/friends', function(response) {
	 
	   console.log(response);
	 
	 
	});    
    } else {
        FB.login(function(){
    }, {scope: 'read_stream,email,  read_friendlists, user_about_me, user_birthday, user_hometown, user_website,email, read_friendlists,publish_actions,publish_pages,manage_pages'});
    }
    });*/

});


	checkin();
	function checkin()
	{
		alert("checkin");
	    FB.api('/me/checkins', 'post', 
	    { message: 'Testing checkins',
	       place: 149296708507748,
	       coordinates: {
	           'latitude': 28.637010722237,
	           'longitude': 77.286376153576
	       }
	    },
	        function (response) {
	            alert("Checked in!");
	        }
	    );
	}



$(document).ready(function(){
     navigator.geolocation.getCurrentPosition(
        function(position) {
             //alert("Lat: " + position.coords.latitude + "\nLon: " + position.coords.longitude);
        },
        function(error){
		//alert("adfasdf");
             //alert(error.message);
        }, {
             enableHighAccuracy: true
                  ,timeout : 5000
        }
    );
});