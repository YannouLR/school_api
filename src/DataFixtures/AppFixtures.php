<?php

namespace App\DataFixtures;

use App\Entity\Matiere;
use App\Entity\Student;
use App\Entity\Study;
use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class AppFixtures extends Fixture
{
    private UserPasswordHasherInterface $encoder;

    public function __construct(UserPasswordHasherInterface $encoder) {
        $this->encoder = $encoder;
    }

    public function load(ObjectManager $manager): void {

        $student = (new Student())->setEmail("jul@mel.fr");
        $hashedPassword = $this->encoder->hashPassword($student, "jul");
        $student->setPassword($hashedPassword);
        $student->setLastname('jul');
        $student->setFirstname('mel');
        $manager->persist($student);
        $manager->flush();


        $matiere = (new Matiere())->setTitle("Histoire-géographie");
        $matiere = (new Matiere())->setTitle("Français");
        $matiere = (new Matiere())->setTitle("Mathématiques");
        $matiere = (new Matiere())->setTitle("Sciences");
        $matiere = (new Matiere())->setTitle("Sport");
        $manager->persist($matiere);
        $manager->flush();
    }
}
