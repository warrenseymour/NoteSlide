<?php

namespace app\controllers;
use \lithium\storage\Session;
use app\models\Group;

class AppController extends \lithium\action\Controller {
    public function _init() {
        parent::_init();

        if($this->user = Session::read('user')) {
            $this->set(array('currentUser' => $this->user));
        }
        else {
            $this->set(array('currentUser' => null));
        }
        $groups = Group::all();
        $this->set(compact('groups'));
    }
}

?>