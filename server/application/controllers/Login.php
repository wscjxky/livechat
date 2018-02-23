<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use QCloud_WeApp_SDK\Auth\LoginService as LoginService;
use QCloud_WeApp_SDK\Constants as Constants;

class Login extends CI_Controller {
    public function index() {
        $result = LoginService::login();
        
        if ($result['loginState'] === Constants::S_AUTH) {
            $this->json(array(
                'code' => 0,
                'data' => $result['userinfo']
            ));
        } else {
            $this->json(array(
                'code' => -1,
                'error' => $result['error']
            ));
        }
    }
}
