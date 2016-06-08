<?php
// Copyright 1999-2016. Parallels IP Holdings GmbH.
class Modules_ServiceplanManagement_Limits extends pm_Hook_Limits
{
    public function getLimits()
    {
        return [
            'max_fake_users' => [
                'default' => 2,
                'place' => self::PLACE_MAIN,
                'name' => 'Fake users',
                'description' => 'Fake users limit, exposed by service plan management sdk.',
            ],
            'max_fake_sites' => [
                'default' => 10,
                'place' => self::PLACE_ADDITIONAL,
                'name' => 'Fake sites',
                'description' => 'Fake sites limit, exposed by service plan management sdk.',
            ],
        ];
    }
}