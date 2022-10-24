<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\User;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $users = [];
        $usersList = $this->user();

        foreach($usersList AS $u) {
            $user = new User();
            $user->setEmail($u['email']);
            $user->setFirstname($u['firstname']);
            $user->setLastname($u['lastname']);
            $user->setRoles([$u['roles']]);
            $user->setPassword('Abcd1234!');

            $manager->persist($user);
            $usersList[] = $user;
        }

        $manager->flush();
    }

    public function user()
    {
        $users = [
            1 => [
                "email" => "mathieusiaudeau@gmail.com",
                "firstname" => "Mathieu",
                "lastname" => "Siaudeau",
                "roles" => "ROLE_SUPADMIN"
            ],
            2 => [
                "email" => "contact@brasseriedifre.fr",
                "firstname" => "Brasserie",
                "lastname" => "Difré",
                "roles" => "ROLE_ADMIN"
            ]
        ];

        return $users;
    }
}
