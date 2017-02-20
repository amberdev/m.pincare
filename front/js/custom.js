$(function() {
    $(".menu-icon").click(function(){
        $(".responsive-menu").show();
    });
    $(".close-btn").click(function(){
        $(".responsive-menu").hide();
    });
});

// flexslider function
$(window).load(function() {
    $('.flexslider').flexslider({
        slideshowSpeed:  5000,
    	animation: "slide",
    	slideshow: false,
    	after: function(slider) 
    	{
      		// current = slider.currentSlide.;

      		var index = $('li:has(.flex-active)').index('.flex-control-nav li')+1;
      		var curSlide = slider.find("li:nth-of-type("+(slider.currentSlide+index)+")");
            var text = $(curSlide).text().trim();
            // console.log(text);

            var coma=text.split('~');
            console.log(coma);

            var data=text.split("\n");
          
            // console.log(data);
            // shareit("'"+data[0]+"'")
            var img=$("#img_"+index).attr('src');



            var str_id=$(".str_id").html();
            var plc_id=$(".plc_id").html();
            var out_id=$(".out_id").html();
            var user_fid=$(".user_fid").html();
            var img_src=coma[7];

            $("#shareit_id").attr('onclick', 'shareit("'+coma[0].trim()+'","link","'+img_src.trim()+'","caption","'+coma[2].trim()+'")');
                      

            $("#checkin_id").attr('onclick', 'checkin("'+coma[4].trim()+'","'+coma[5].trim()+'","'+coma[6].trim()+'","'+coma[3].trim()+'")');
		 
    	}
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

function shareit(story_name,link,picture_url,caption,desctiption)
    {
        FB.ui({
            method: 'feed', 
            name: story_name,
            link: 'https://developers.facebook.com/docs/reference/dialogs/',
            picture: picture_url,
            caption: 'Reference Documentation',
            description: desctiption
        });
    }

 
	function checkin(place_id,outlet_id,user_fb_id,story_id)
	{

		FB.api('/me/accounts', function(response) {
	 
		var access_token1 =   FB.getAuthResponse()['accessToken'];
		console.log(access_token1);
		

		FB.api('/me/feed', 'post', {
		access_token:access_token1,
		name: 'SomeName',
		message: 'SomeMessage',
		link: 'https://developers.facebook.com/docs/reference/dialogs/',
		picture: 'http://fbrell.com/f8.jpg',
		caption: 'Reference Documentation',
		description: 'Dialogs provide a simple',
		place: place_id // ID for Tallinn, Estonia
		}, function (response) {

		var base_url="http://m.pincare.in/story/checkins";
		var myKeyVals="place_id="+place_id+"&outlet_id="+outlet_id+"&user_fb_id="+user_fb_id+"&story_id="+story_id;
		 
		var saveData = $.ajax({
		type: 'POST',
		url: base_url,
		data: myKeyVals,
		dataType: "text",
		success: function(resultData) { window.location = "http://m.pincare.in/story/score"; }
		});
		saveData.error(function() { alert("Something went wrong"); });

		}); 

		});

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
    