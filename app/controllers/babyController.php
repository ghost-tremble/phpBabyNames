<?php

use Phalcon\Mvc\Controller;

class babyController extends Controller
{
    public function indexAction()
    {

    }

    public function successAction()
    {
        $baby = new Babies();

        //assign value from the form to $baby
        $baby->assign(
            $this->request->getPost(),
            [
                'name',
            ]
        );

     
        $success = $baby->save();

 // pass the succesful result to the view    
        $this->view->success = $success;

        if ($success) {
            $message = "Great you have added a new baby name";
        } else {
            $message = "An error has occured<br>"
                     . implode('<br>', $baby->getMessages());
        }

        // passing a message to the view
        $this->view->message = $message;
    }
}