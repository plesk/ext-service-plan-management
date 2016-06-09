<?php
// Copyright 1999-2016. Parallels IP Holdings GmbH.
class IndexController extends pm_Controller_Action
{
    protected $_domain;

    public function init()
    {
        parent::init();
	$this->_domain = $this->_getDomain();
	$this->view->pageTitle = 'Service Plan Management Example Extension';
    }

    private function _getDomain()
    {
        return new pm_Domain((int)$this->getRequest()->getParam('siteId'));
    }

    public function fakeusersAction()
    {
        $this->view->fakeUsersLimit = $this->_domain->getLimit('max_fake_users');
    }

    public function fakesitesAction()
    {
        $this->view->fakeSitesLimit = $this->_domain->getLimit('max_fake_sites');
    }

        public function indexAction()
    {
        //Check that client/reseller has permission 'fake_sites' on subscription or not.
        $form = new Modules_ServicePlanManagement_Form_CreateForm();
        if ($this->getRequest()->isPost() && $form->isValid($this->getRequest()->getPost())) {
            try {
                $values = $form->getValues();

                $clientId = $values['clientId'];
                $domainId = $values['domainId'];
                $domain = new pm_Domain($domainId);
                $client = pm_Client::getByClientId($clientId);
                $result = $client->hasPermission('fake_sites', $domain);

                $text = (bool)$result
                    ? "Client with login '{$client->getProperty('login')}' (ID {$client->getId()}) has permission 'fake_sites' on domain '{$domain->getName()}'."
                    : "Client with login '{$client->getProperty('login')}' (ID {$client->getId()}) has no permission 'fake_sites' on domain '{$domain->getName()}'.";

                $this->_status->addInfo($text);
                pm_Log::info('RESULT: ' . (bool)$result);
                $this->redirect(pm_Context::getActionUrl('index', 'index'));

            }   catch (pm_Exception $exception) {
                $this->_status->addError($exception->getMessage());
                $this->redirect(pm_Context::getActionUrl('index', 'index'));
            }
        }
        $this->view->form = $form;
    }
}
