<?php

class Modules_ServicePlanManagement_Form_CreateForm extends pm_Form_Simple
{
    protected $_clientId;
    protected $_domainId;

    public function init()
    {
        $this->addElement('Text', 'clientId', [
            'label' => 'Client/Reseller ID: ',
            'value' => $this->_clientId,
        ]);

        $this->addElement('Text', 'domainId', [
            'label' => 'Domain ID: ',
            'value' => $this->_domainId,
        ]);

        $this->addControlButtons([
            'sendTitle' => "OK",
            'cancelTitle' => "Cancel",
            'cancelLink' => pm_Context::getModulesListUrl(),
        ]);
    }
}
