<?php
/**
 * Created by PhpStorm.
 * User: Jonathan
 * Date: 6/8/14
 * Time: 1:42 PM
 */
require_once("protected/extensions/Oauth2/Token.php");
require_once("protected/extensions/Oauth2/Client.php");
require_once("protected/extensions/Oauth2/DataStore.php");
require_once("protected/extensions/Oauth2/HttpClient.php");
require_once("protected/extensions/Oauth2/Exception.php");
require_once("protected/extensions/Oauth2/Service/Configuration.php");
require_once("protected/extensions/Oauth2/DataStore/Session.php");
require_once("protected/extensions/Oauth2/Service.php");

class LoginController extends Controller
{

    public function actionFiu_oauth2() {
        $client = new OAuth2\Client(
           //'207722926532-qm6v42pj1apdo6j07btif9u19n100082.apps.googleusercontent.com', 'HTmrpkL7KVYFAa9nzYA9Fcjh', 'http://localhost:8888/coplat/index.php/site/login?r=Login/google_oauth2_callback'
           '207722926532-qm6v42pj1apdo6j07btif9u19n100082.apps.googleusercontent.com', 'HTmrpkL7KVYFAa9nzYA9Fcjh', 'http://cp-dev.cis.fiu.edu/coplat/index.php/site/login?r=Login/google_oauth2_callback'

        );

        $configuration = new OAuth2\Service\Configuration(
            'https://accounts.google.com/o/oauth2/auth', 'https://accounts.google.com/o/oauth2/auth/token'
        );

        $dataStore = new OAuth2\DataStore\Session();

        $scope = "https://www.googleapis.com/auth/userinfo.profile https://www.googleapis.com/auth/userinfo.email";

        $service = new OAuth2\Service($client, $configuration, $dataStore, $scope, 'fiu.edu');

        $service->authorize();
    }

    public function google_oauth2() {
        $client = new OAuth2\Client(
          //'207722926532-qm6v42pj1apdo6j07btif9u19n100082.apps.googleusercontent.com', 'HTmrpkL7KVYFAa9nzYA9Fcjh', 'http://localhost:8888/coplat/index.php/site/login?r=Login/google_oauth2_callback'
         '207722926532-qm6v42pj1apdo6j07btif9u19n100082.apps.googleusercontent.com', 'HTmrpkL7KVYFAa9nzYA9Fcjh', 'http://cp-dev.cis.fiu.edu/coplat/index.php/site/login?r=Login/google_oauth2_callback'

        );
//104217401955-72dtm4gbmujaca9bjl90ohg03lp22cqs.apps.googleusercontent.com
        //PbZgJPfW7sBHOcyMEHmhdcM-
        $configuration = new OAuth2\Service\Configuration(
            'https://accounts.google.com/o/oauth2/auth', 'https://accounts.google.com/o/oauth2/auth/token'
        );

        $dataStore = new OAuth2\DataStore\Session();

        $scope = "https://www.googleapis.com/auth/userinfo.profile https://www.googleapis.com/auth/userinfo.email";

        $service = new OAuth2\Service($client, $configuration, $dataStore, $scope);

        $service->authorize();
    }

    public function actionGoogle_oauth2_callback() {
        $code=null;// = $this->input->get("code");

        $client = new OAuth2\Client(
      // '207722926532-qm6v42pj1apdo6j07btif9u19n100082.apps.googleusercontent.com', 'HTmrpkL7KVYFAa9nzYA9Fcjh', 'http://localhost:8888/coplat/index.php/site/login?r=Login/google_oauth2_callback'
       '207722926532-qm6v42pj1apdo6j07btif9u19n100082.apps.googleusercontent.com', 'HTmrpkL7KVYFAa9nzYA9Fcjh', 'http://cp-dev.cis.fiu.edu/coplat/index.php/site/login?r=Login/google_oauth2_callback'

        );

        $configuration = new OAuth2\Service\Configuration(
            'https://accounts.google.com/o/oauth2/auth', 'https://accounts.google.com/o/oauth2/token'
        );

        $dataStore = new OAuth2\DataStore\Session();

        $scope = "https://www.googleapis.com/auth/userinfo.profile https://www.googleapis.com/auth/userinfo.email";

        $service = new OAuth2\Service($client, $configuration, $dataStore, $scope);

        $service->getAccessToken($code);

        $token = $dataStore->retrieveAccessToken();

        $userinfo = $service->callApiEndpoint('https://www.googleapis.com/oauth2/v1/userinfo');

        /* Data format returned by Google
         * '{
          "id": "112343029738132982182",
          "email": "yaneli86@gmail.com",
          "verified_email": true,
          "name": "Yaneli Fernandez Sosa",
          "given_name": "Yaneli",
          "family_name": "Fernandez Sosa"
          }
         */

        $matches = array();

        preg_match_all("/\"id\": \"(\d+)\"/", $userinfo, $matches);

        $id = $matches[1][0];

        $matches = array();

        preg_match_all("/\"email\": \"([a-zA-Z0-9_.-]+@[a-zA-Z0-9-]+.[a-zA-Z0-9-.]+)\"/", $userinfo, $matches);

        $email = $matches[1][0];

        $matches = array();

        preg_match_all("/\"given_name\": \"([a-zA-Z\s]+)\"/", $userinfo, $matches);

        $given_name = $matches[1][0];

        $matches = array();

        preg_match_all("/\"family_name\": \"([a-zA-Z\s-]+)\"/", $userinfo, $matches);

        $family_name = $matches[1][0];



        $parts = explode('@', $email);

        $model = User::model()->find("email = '".$email."'");
        if (!empty($model))
        {
            $pw = User::model()->findBySql("select tpassword from user where email = :email",array(":email"=>$email));
            $identity=new UserIdentity($parts[0],$pw);
            $identity->authenticate();
            $duration= 3600*24*30; // 30 days
            Yii::app()->user->login($identity,$duration);

            echo "<script> window.location = '../home/userHome';</script>";


        } else
        {
            echo "<script> window.alert('Please make sure you are registered in SPW and/or contact admin');
                 window.location = 'login';

             </script>";

        }



    }





} 