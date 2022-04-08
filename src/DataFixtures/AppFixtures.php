<?php

namespace App\DataFixtures;

use App\Entity\Matiere;
use App\Entity\Study;
use App\Entity\Student;
use App\Entity\NoteMatiereStudent;
use App\Entity\Professor;
use App\Entity\Director;
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
            
//_________________________________________Matiere_x5__________________________________________________\\
            
        $matiere1 = (new Matiere())->setTitle("Histoire-géographie");
        $manager->persist($matiere1);
        $matiere2 = (new Matiere())->setTitle("Français");
        $manager->persist($matiere2);
        $matiere3 = (new Matiere())->setTitle("Mathématiques");
        $manager->persist($matiere3);
        $matiere4 = (new Matiere())->setTitle("Sciences");
        $manager->persist($matiere4);
        $matiere5 = (new Matiere())->setTitle("Sport");
        $manager->persist($matiere5);
            
//_________________________________________Study_x5__________________________________________________\\
            
        $study1 = (new Study())->setName("CP" )->setId(1)->addSubject($matiere1)->addSubject($matiere2)->addSubject($matiere3)->addSubject($matiere4)->addSubject($matiere5);
        $manager->persist($study1);
        $study2 = (new Study())->setName("CE1")->setId(2)->addSubject($matiere1)->addSubject($matiere2)->addSubject($matiere3)->addSubject($matiere4)->addSubject($matiere5);
        $manager->persist($study2);
        $study3 = (new Study())->setName("CE2")->setId(3)->addSubject($matiere1)->addSubject($matiere2)->addSubject($matiere3)->addSubject($matiere4)->addSubject($matiere5);
        $manager->persist($study3);
        $study4 = (new Study())->setName("CM1")->setId(4)->addSubject($matiere1)->addSubject($matiere2)->addSubject($matiere3)->addSubject($matiere4)->addSubject($matiere5);
        $manager->persist($study4);
        $study5 = (new Study())->setName("CM2")->setId(5)->addSubject($matiere1)->addSubject($matiere2)->addSubject($matiere3)->addSubject($matiere4)->addSubject($matiere5);
        $manager->persist($study5);

// _________________________________________Students_x75__________________________________________________\\

        $student1 = (new Student())->setEmail("poi@iop.fr");
        $hashedPassword = $this->encoder->hashPassword($student1, "jul");
        $student1->setPassword($hashedPassword);
        $student1->setLastname('Levy');
        $student1->setFirstname('Allon');
        $student1->setSexe('boy');
        $student1->setMailParent('iop@poi.fr');
        $student1->setStudyplace($study1);
        $manager->persist($student1);

        $student2 = (new Student())->setEmail("mlk@klm.fr");
        $hashedPassword = $this->encoder->hashPassword($student2, "jul");
        $student2->setPassword($hashedPassword);
        $student2->setLastname('Hugo');
        $student2->setFirstname('Bacard');
        $student2->setSexe('boy');
        $student2->setMailParent('klm@mlk.fr');
        $student2->setStudyplace($study1);
        $manager->persist($student2);

        $student3 = (new Student())->setEmail("oiu@uio.fr");
        $hashedPassword = $this->encoder->hashPassword($student3, "jul");
        $student3->setPassword($hashedPassword);
        $student3->setLastname('Julie');
        $student3->setFirstname('Declairveaux');
        $student3->setSexe('girl');
        $student3->setMailParent('uio@oiu.fr');
        $student3->setStudyplace($study2);
        $manager->persist($student3);

        $student4 = (new Student())->setEmail("lkj@jkl.fr");
        $hashedPassword = $this->encoder->hashPassword($student4, "jul");
        $student4->setPassword($hashedPassword);
        $student4->setLastname('Jean-paul');
        $student4->setFirstname('Gaultier');
        $student4->setSexe('boy');
        $student4->setMailParent('jkl@lkj.fr');
        $student4->setStudyplace($study2);
        $manager->persist($student4);

        $student5 = (new Student())->setEmail("nbv@vbn.fr");
        $hashedPassword = $this->encoder->hashPassword($student5, "jul");
        $student5->setPassword($hashedPassword);
        $student5->setLastname('Julia');
        $student5->setFirstname('Roberts');
        $student5->setSexe('girl');
        $student5->setMailParent('vbn@nbv.fr');
        $student5->setStudyplace($study3);
        $manager->persist($student5);

        $student6 = (new Student())->setEmail("jhg@ghj.fr");
        $hashedPassword = $this->encoder->hashPassword($student6, "jul");
        $student6->setPassword($hashedPassword);
        $student6->setLastname('Bertrand');
        $student6->setFirstname('Midot');
        $student6->setSexe('boy');
        $student6->setMailParent('ghj@jhg.fr');
        $student6->setStudyplace($study3);
        $manager->persist($student6);

        $student7 = (new Student())->setEmail("ert@tre.fr");
        $hashedPassword = $this->encoder->hashPassword($student7, "jul");
        $student7->setPassword($hashedPassword);
        $student7->setLastname('Julia');
        $student7->setFirstname('Roberts');
        $student7->setSexe('girl');
        $student7->setMailParent('tre@ert.fr');
        $student7->setStudyplace($study4);
        $manager->persist($student7);

        $student8 = (new Student())->setEmail("aze@eza.fr");
        $hashedPassword = $this->encoder->hashPassword($student8, "jul");
        $student8->setPassword($hashedPassword);
        $student8->setLastname('Bertrand');
        $student8->setFirstname('Midot');
        $student8->setSexe('boy');
        $student8->setMailParent('eza@aze.fr');
        $student8->setStudyplace($study4);
        $manager->persist($student8);

        $student9 = (new Student())->setEmail("wxc@cxw.fr");
        $hashedPassword = $this->encoder->hashPassword($student9, "jul");
        $student9->setPassword($hashedPassword);
        $student9->setLastname('Jules');
        $student9->setFirstname('Robert');
        $student9->setSexe('boy');
        $student9->setMailParent('cxw@wxc.fr');
        $student9->setStudyplace($study5);
        $manager->persist($student9);

        $student10 = (new Student())->setEmail("dfg@gfd.fr");
        $hashedPassword = $this->encoder->hashPassword($student10, "jul");
        $student10->setPassword($hashedPassword);
        $student10->setLastname('Bernard');
        $student10->setFirstname('Montiel');
        $student10->setSexe('boy');
        $student10->setMailParent('gfd@dfg.fr');
        $student10->setStudyplace($study5);
        $manager->persist($student10);

        

// _________________________________________Note_Matiere_Student___________________________________________________\\

        // $notematierestudent1 = (new NoteMatiereStudent())->setStudent($student1)->setMatiere($matiere1); 
        // $manager->persist($notematierestudent1);
        // $notematierestudent2 = (new NoteMatiereStudent())->setStudent($student1)->setMatiere($matiere2);
        // $manager->persist($notematierestudent2);
        // $notematierestudent3 = (new NoteMatiereStudent())->setStudent($student1)->setMatiere($matiere3);
        // $manager->persist($notematierestudent3);
        // $notematierestudent4 = (new NoteMatiereStudent())->setStudent($student1)->setMatiere($matiere4);
        // $manager->persist($notematierestudent4);
        // $notematierestudent5 = (new NoteMatiereStudent())->setStudent($student1)->setMatiere($matiere5);
        // $manager->persist($notematierestudent5);


// _________________________________________Professors_x5__________________________________________________\\

        $professor = (new Professor())->setEmail("456@654.fr");
        $hashedPassword = $this->encoder->hashPassword($professor, "jul");
        $professor->setPassword($hashedPassword);
        $professor->setLastname('Jean');
        $professor->setFirstname('Delenoix');
        $professor->setSalary(1500.64);
        $professor->setAge(48);
        $professor->setWorkAge(23);
        $professor->setStudyplace($study1);
        $manager->persist($professor);

        $professor = (new Professor())->setEmail("789@987.fr");
        $hashedPassword = $this->encoder->hashPassword($professor, "jul");
        $professor->setPassword($hashedPassword);
        $professor->setLastname('Justine');
        $professor->setFirstname('Bekritch');
        $professor->setSalary(1450.23);
        $professor->setAge(26);
        $professor->setWorkAge(4);
        $professor->setStudyplace($study2);
        $manager->persist($professor);

        $professor = (new Professor())->setEmail("147@741.fr");
        $hashedPassword = $this->encoder->hashPassword($professor, "jul");
        $professor->setPassword($hashedPassword);
        $professor->setLastname('Greta');
        $professor->setFirstname('Garbo');
        $professor->setSalary(1600.54);
        $professor->setAge(54);
        $professor->setWorkAge(30);
        $professor->setStudyplace($study3);
        $manager->persist($professor);

        $professor = (new Professor())->setEmail("369@963.fr");
        $hashedPassword = $this->encoder->hashPassword($professor, "jul");
        $professor->setPassword($hashedPassword);
        $professor->setLastname('Georges');
        $professor->setFirstname('Ghelain');
        $professor->setSalary(1375.00);
        $professor->setAge(32);
        $professor->setWorkAge(7);
        $professor->setStudyplace($study4);
        $manager->persist($professor);

        $professor = (new Professor())->setEmail("478@874.fr");
        $hashedPassword = $this->encoder->hashPassword($professor, "jul");
        $professor->setPassword($hashedPassword);
        $professor->setLastname('Gisèle');
        $professor->setFirstname('Charbonnier');
        $professor->setSalary(1300.50);
        $professor->setAge(22);
        $professor->setWorkAge(0);
        $professor->setStudyplace($study5);
        $manager->persist($professor);

//_________________________________________Director_x1__________________________________________________\\

        $director = (new Director())->setEmail("123@321.fr");
        $hashedPassword = $this->encoder->hashPassword($director, "jul");
        $director->setPassword($hashedPassword);
        $director->setLastname('Jean-Jacques ');
        $director->setFirstname('Goldman');
        $director->setRoles(['ROLE_ADMIN']);
        $manager->persist($director);

//_________________________________________Post___________________________________________________\\

        $manager->flush();
    }
}
