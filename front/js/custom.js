$( document ).ready(function() {
var base_url="http://m.pincare.in/";
	
    FB.init({ appId: '1862990167252944', xfbml: true, cookie: true, oauth: true });

	$("#login_btn").click(function(){

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