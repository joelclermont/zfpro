<?php

class IndexController extends Zend_Controller_Action
{

    public function init()
    {
        $contextSwitch = $this->_helper->_contextSwitch();
        if (!$contextSwitch->hasContext('html')) {
            $contextSwitch->addContext('html', array(
                'suffix' => 'html',
                'setAutoDisableLayout' => true
            ));
        }
        $contextSwitch->addActionContext('index', 'html')
                      ->initContext();
    }

    public function indexAction()
    {
        // action body
    }


}

