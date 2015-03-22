  function statusChangeCallback(response) {
    console.log('statusChangeCallback');
    console.log(response);
    if (response.status === 'connected') {
      // Logged into your app and Facebook.
      testAPI();
    }			
  }

  function checkLoginState() {
    FB.getLoginStatus(function(response) {
      statusChangeCallback(response);
    });
  }

  window.fbAsyncInit = function() {
  FB.init({
    appId      : '812071988882674',
    cookie     : true,  // enable cookies to allow the server to access 
                        // the session
    xfbml      : true,  // parse social plugins on this page
    version    : 'v2.2' // use version 2.2
  });

  FB.getLoginStatus(function(response) {
    statusChangeCallback(response);
  });
  FB.Event.subscribe('auth.logout', logout_event);
    function logout_event() {
	 window.location.href = "index.html";
	}
  };

  // Load the SDK asynchronously
  (function(d, s, id) {
    var js, fjs = d.getElementsByTagName(s)[0];
    if (d.getElementById(id)) return;
    js = d.createElement(s); js.id = id;
    js.src = "//connect.facebook.net/en_US/sdk.js";
    fjs.parentNode.insertBefore(js, fjs);
  }(document, 'script', 'facebook-jssdk'));

  function testAPI() {
    console.log('Welcome!  Fetching your information.... ');
    FB.api('/me', function(response) {
        document.getElementById("nimi").innerHTML = response.name;
	document.getElementById("soovitama").innerHTML = "Soovitama";
	document.getElementById("soovitama").href = "soovitama.html";
	document.getElementById("kutsu").innerHTML = "Kutsu";
	document.getElementById("kutsu").href = "kutsu.html";
	document.getElementById("style2").innerHTML = "			#soovitama:hover{padding: 3%}
			#kutsu:hover{padding: 3%}
			#soovitama{padding: 3%}
			#kutsu{padding: 3%}";
    });
  }

