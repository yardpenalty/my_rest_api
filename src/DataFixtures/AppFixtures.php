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

    const ARRAY_YEAR = array(
        '2012',
        '2017',
        '2020',
        '2022',
        '2008'
    );

    const ARRAY_MSRP = array(
        10012.50,
        32000.20,
        12695.00,
        17635.99,
        22312.00
    );

    public function getRandVin(){
        return strtoupper(substr(md5(rand()), 0, 10)); 
    }

    public function getRandArrayStr($array): ?string
    {

        return array_map('strval',$array[array_rand($array)]);
    }
    
    public function getRandMake($array): ?string
    {

        return array_map('strval',$array[array_rand($array[0])]);
    }

    public function getRandModel($make): ?string
    {
        $model = array_rand($make);
        ddd($model);
        return array_map('strval',$model);
    }

    public function getRandType(): ?string
    {

        $type = array(self::TYPE_NEW, self::TYPE_USED);

        return array_map('strval',$type[array_rand($type)]);
    }

    public function getRandMakeModelArray()
    {
        $models =array(
            "Ford" => array('Edge', 'F-10', 'Focus'),
            "Dodge" => array('Charger',' Ram','Durango'),
            "Chevy" => array('Silverado', 'Cavalier','S-10'),
            "Subaru" => array('Forester','Outback','Crosstrek'),
            "Toyota" => array('4-Runner','Camry','Corolla')
        ); 
        $make = array_rand($models);
        $model = $make[array_rand($make)];
        return array($make, $model);
        
    }
    
    public function load(ObjectManager $manager)
    {

        for ($i = 0; $i < 50; $i++) {
            //make rand make model strings
         

            $vehicles = new Vehicles();
            $vehicles->setDateAdded($faker->date_added);
            $vehicles->setType($this->getRandType());
            $vehicles->setMsrp($this->GetRandArrayStr(ARRAY_MSRP));
            $vehicles->setYear($this->GetRandArrayStr(ARRAY_YEAR));
            $vehicles->setMake($this->GetRandArrayStr(ARRAY_YEAR));
            $vehicles->setModel($faker->model);
            $vehicles->setMiles($faker->miles);
            $vehicles->setVin($faker->vin);
            $vehicles->setDeleted($faker->deleted);
            $manager->persist($vehicles);
        }

        $manager->flush();
    }
}
