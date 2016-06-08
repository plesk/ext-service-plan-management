<?php
// Copyright 1999-2016. Parallels IP Holdings GmbH.
class IndexController extends pm_Controller_Action
{
    protected $_domain;

    public function init()
    {
        parent::init();
        $this->_domain = $this->_getDomain();
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
    }
}
