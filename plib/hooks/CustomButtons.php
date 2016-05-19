<?php
// Copyright 1999-2016. Parallels IP Holdings GmbH.
class Modules_ServiceplanManagement_CustomButtons extends pm_Hook_CustomButtons
{
    public function getButtons()
    {
        return [[
            'place' => self::PLACE_DOMAIN_PROPERTIES,
            'title' => 'Get value of fake users limit',
            'order' => 4,
            'link' => pm_Context::getActionUrl('index', 'fakeUsers'),
            'contextParams' => true,
            'visibility' => function () {
                if (!($domain = pm_Session::getCurrentDomain()) || !$domain->hasPermission('fake_users')) {
                    return false;
                }
                return true;
            },
        ], [
            'place' => self::PLACE_DOMAIN_PROPERTIES,
            'title' => 'Get value of fake sites limit',
            'order' => 5,
            'link' => pm_Context::getActionUrl('index', 'fakeSites'),
            'contextParams' => true,
            'visibility' => function () {
                if (!($domain = pm_Session::getCurrentDomain()) || !$domain->hasPermission('fake_sites')) {
                    return false;
                }
                return true;
            },
        ]];
    }
}