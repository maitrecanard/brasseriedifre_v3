<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        

        $manager->flush();
    }

    public function user()
    {
        $users = [
            1 => [
                "email" => "mathieusiaudeau@gmail.com",
                "firstname" => "Mathieu",
                "lastname" => "Siaudeau",
                "roles" => "ROLE_SUPADMIN",
                "password" => "Abcd1234!"
            ],
            2 => [
                "email" => "contact@brasseriedifre.fr",
                "firstname" => "Brasserie",
                "lastname" => "Difré",
                "roles" => "ROLE_ADMIN",
                "password" => "Abcd1234!"
            ]
        ];

        return $users;
    }
}
