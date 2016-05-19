<?php
// Copyright 1999-2016. Parallels IP Holdings GmbH.
class Modules_ServiceplanManagement_Permissions extends pm_Hook_Permissions
{
    public function getPermissions()
    {
        return [
            'fake_users' => [
                'default' => true,
                'place' => self::PLACE_MAIN,
                'name' => 'Fake users permission',
                'description' => 'Permission allow to see fake users limits, exposed by service plan management sdk.',
            ],
            'fake_sites' => [
                'default' => true,
                'place' => self::PLACE_ADDITIONAL,
                'name' => 'Fake sites permission',
                'description' => 'Permission allow to see fake sites limits, exposed by service plan management sdk.',
            ],
        ];
    }
}
