<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use Google_Client;

class Login extends BaseController
{
    protected $googleclient;

    public function __construct() {
        $this->googleclient = new Google_Client();

        $this->googleclient->setClientId('1058137227951-d46lp4m3iae48fsvor0f1873a1qcq0no.apps.googleusercontent.com');
        $this->googleclient->setClientSecret('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');
        $this->googleclient->setRedirectUri('http://localhost:8080/login/calbackGoogle');
        $this->googleclient->addScope('email');
        $this->googleclient->addScope('profile');

    }
    public function index()
    {
        $data['link'] = $this->googleclient->createAuthUrl();
        return view('login', $data);
    }
    public function edu()
    {
        $data['link'] = $this->googleclient->createAuthUrl();
        return view('edu', $data);
    }
    public function fin()
    {
        $data['link'] = $this->googleclient->createAuthUrl();
        return view('fin', $data);
    }
    public function retail()
    {
        $data['link'] = $this->googleclient->createAuthUrl();
        return view('retail', $data);
    }
    public function kios()
    {
        $data['link'] = $this->googleclient->createAuthUrl();
        return view('kios', $data);
    }

    public function calbackGoogle(){
        $token = $this->googleclient->fetchAccessTokenWithAuthCode($this->request->getVar('code'));
        if(!isset($token['error'])){
            // echo var_dump($token);
            $this->googleclient->setAccessToken($token['access_token']);
            $googleService = new \Google_Service_Oauth2($this->googleclient);
            $dataGoogle = $googleService->userinfo->get();
            echo '<pre>';
            echo var_dump($dataGoogle);
            echo '</pre>';
            echo $dataGoogle['name'];


        }
    }
}
