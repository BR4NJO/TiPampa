<?php

namespace App\DataFixtures;

use App\Entity\Contact;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class ContactFixtures extends Fixture
{
    public const NAME = [
        "BRUNET",

    ];

    public const FIRST_NAME= [
        "Alexandre",

    ];

    public const EMAIL = [
        "aquasword60@gmail.com",

    ];

    public const PHONE = [
        "0682478630",

    ];

    public const MESSAGE = [
        "test TiPampa",

    ];
    public function load(ObjectManager $manager): void
    {
        for ($i = 0; $i < count(self::NAME); $i++) {
            $contact = new Contact();
            $contact->setName(self::NAME[$i]);
            $contact->setFirstName(self::FIRST_NAME[$i]);
            $contact->setEmail(self::EMAIL[$i]);
            $contact->setPhone(self::PHONE[$i]);
            $contact->setMessage(self::MESSAGE[$i]);

            $manager->persist($contact);
        }

        $manager->flush();
    }
}
