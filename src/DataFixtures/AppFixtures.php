<?php
// Run $ bin/console doctrine:fixtures:load
// to populate database with faker data
namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{  
    const TYPE_NEW = 'new';
    const TYPE_USED= 'used';

    const ARRAY_MAKE_MODEL = array(
        array('Ford','Edge', 'F-10', 'Focus'), 
        array('Dodge','Charger',' Ram','Durango'),
        array('Chevy',' Silverado', 'Cavalier','S-10'),
        array('Subaru', 'Forester','Outback','Crosstrek'),
        array('Toyota','4-Runner','Camry','Corolla') 
    );  

    public function setRandType(): ?string
    {

        $type = array(self::TYPE_NEW, self::TYPE_USED);

        return $type[array_rand($type)];
    }
    
    public function load(ObjectManager $manager)
    {
        $faker = Factory::create();

        for ($i = 0; $i < 50; $i++) {
            $vehicles = new Vehicles();
            $vehicles->setDateAdded($faker->date_added);
            $vehicles->setRandType();
            $vehicles->setMsrp($faker->msrp);
            $vehicles->setYear($faker->year);
            $vehicles->setMake($faker->make);
            $vehicles->setModel($faker->model);
            $vehicles->setMiles($faker->miles);
            $vehicles->setVin($faker->vin);
            $vehicles->setDeleted($faker->deleted);
            $manager->persist($vehicles);
        }

        $manager->flush();
    }
}
