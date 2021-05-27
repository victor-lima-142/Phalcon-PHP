<?php
declare(strict_types=1);

class IndexController extends ControllerBase
{

    public function indexAction()
    {

    }

    public function notFoundAction()
    {
        $this->view->pick('layouts/404');
    }

}

