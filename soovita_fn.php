<?php

session_start();
/* INCLUSION OF LIBRARY FILEs*/
  require_once( 'lib/Facebook/FacebookSession.php');
  require_once( 'lib/Facebook/FacebookRequest.php' );
  require_once( 'lib/Facebook/FacebookResponse.php' );
  require_once( 'lib/Facebook/FacebookSDKException.php' );
  require_once( 'lib/Facebook/FacebookRequestException.php' );
  require_once( 'lib/Facebook/FacebookRedirectLoginHelper.php');
  require_once( 'lib/Facebook/FacebookAuthorizationException.php' );
  require_once( 'lib/Facebook/GraphObject.php' );
  require_once( 'lib/Facebook/GraphUser.php' );
  require_once( 'lib/Facebook/GraphSessionInfo.php' );
  require_once( 'lib/Facebook/Entities/AccessToken.php');
  require_once( 'lib/Facebook/HttpClients/FacebookCurl.php' );
  require_once( 'lib/Facebook/HttpClients/FacebookHttpable.php');
  require_once( 'lib/Facebook/HttpClients/FacebookCurlHttpClient.php');
/* USE NAMESPACES */
  
  use Facebook\FacebookSession;
  use Facebook\FacebookRedirectLoginHelper;
  use Facebook\FacebookRequest;
  use Facebook\FacebookResponse;
  use Facebook\FacebookSDKException;
  use Facebook\FacebookRequestException;
  use Facebook\FacebookAuthorizationException;
  use Facebook\GraphObject;
  use Facebook\GraphUser;
  use Facebook\GraphSessionInfo;
  use Facebook\FacebookHttpable;
  use Facebook\FacebookCurlHttpClient;
  use Facebook\FacebookCurl;
	 $app_id = '812071988882674';
	 $app_secret = '43be086416a7de6f97a6d1c0c9581858';
	 $redirect_url='http://soovita.azurewebsites.net/soovitama.php';
	  FacebookSession::setDefaultApplication($app_id,$app_secret);
	 $helper = new FacebookRedirectLoginHelper($redirect_url);
	 $sess = $helper->getSessionFromRedirect();

	 if(isset($sess)){
	?>
			<h3>Anna hääl kandidaadile:</h3>
			<form method="post" action="vote.php" enctype="multipart/form-data" >
				Name <input type="text" name="vote_name" id="vote_name"/></br>
				<input type="submit" name="submit" value="Anna hääl!" />
			</form>
			<br>
			<div id="andmed">
				<p>Riigikogu kandidaadid:</p>
				<?php
				include "dataRiigikogu.php";
				?>
			
			
				<p>Omavalitsuste kandidaadid:.</p>
				<?php
				include "dataKohalik.php";
				?>
			
			
				<p>Presidendi kandidaadid.</p>
				<?php
				include "dataPresident.php";
				?>
			</div>
	<?php
		//create request object,execute and capture response
		$request = new FacebookRequest($sess, 'GET', '/me');
		// from response get graph object
		$response = $request->execute();
		$graph = $response->getGraphObject(GraphUser::className());
		// use graph object methods to get user details
		$name1= $graph->getName();
}
	else if ($_SESSION['username']){
		?>
			<h3>Anna hääl kandidaadile:</h3>
			<form method="post" action="vote.php" enctype="multipart/form-data" >
				Name <input type="text" name="vote_name" id="vote_name"/></br>
				<input type="submit" name="submit" value="Anna hääl!" />
			</form>
			<br>
		<?php

}
else {
	echo "Selle lehe vaatamiseks pead olema sisse logitud! Logi sisse vajutades Facebook logole.";
	echo '<a href='.$helper->getLoginUrl().'><img border="0" src="Facebooklogo.jpeg"></a>';

}
?>
