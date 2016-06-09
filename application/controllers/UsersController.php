<?php

class UsersController extends BaseController
{
    const PROJECTSALT = 'patricktinihaushaltsbuch';

    public function init()
    {
        $this->view->active = 'user';

        parent::init();
    }

    public function loginAction()
    {
        $form = new Forms_Login();

        $request = $this->getRequest();

        $auth = Zend_Auth::getInstance();

        if($request->isPost()) {
            $post = $request->getPost();

            if($post['name'] != "" && $post['password'] != "") {

                $adapter = new Base_Adapter_Auth($post['name'], $post['password']);

                $result = $auth->authenticate($adapter);

                $userMapper = new Models_Mapper_User();

                if($result->isValid()){
                    $user = $userMapper->findByName($post['name']);

                    $this->_helper->Redirector->goToRouteAndExit(array('controller' => 'Home', 'action' => 'start', 'id' => $user->getId()), null, true);
                }

                $this->flashMessenger->addMessage(array('type' => 'error', 'title' => 'Fehler!', 'message' => 'Benutzername und/oder Passwort sind nicht korrekt!'));

                $this->_helper->Redirector->goToRouteAndExit(array('controller' => 'Index', 'action' => 'index'), null, true);
            }

            $this->flashMessenger->addMessage(array('type' => 'error', 'title' => 'Fehler!', 'message' => 'Benutzername und/oder Passwort sind nicht korrekt!'));
        }

        $this->view->form = $form;
        $this->view->flashMessenger = $this->flashMessenger;
    }

    public function logoutAction()
    {
        $auth = Zend_Auth::getInstance();

        if($auth->hasIdentity())
        {
            $auth->clearIdentity();

            $this->_helper->Redirector->goToRouteAndExit(array('controller' => 'Users', 'action' => 'login'), null, true);
        }
    }
}