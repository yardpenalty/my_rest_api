<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220303045534 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE vehicle (id INT AUTO_INCREMENT NOT NULL, date_added DATETIME NOT NULL, type VARCHAR(10) NOT NULL, msrp NUMERIC(20, 2) NOT NULL, year INT NOT NULL, make VARCHAR(255) NOT NULL, model VARCHAR(255) NOT NULL, miles INT NOT NULL, vin VARCHAR(255) NOT NULL, deleted TINYINT(1) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql("INSERT INTO `vehicle` (`id`, `date_added`, `type`, `msrp`, `year`, `make`, `model`, `miles`, `vin`, `deleted`) VALUES
        (1, '2022-03-01 21:19:56', 'used', '10000.00', 2012, 'Ford', 'Edge', 86759, '8675309', NULL),
        (2, '2022-03-02 04:20:51', 'new', '32334.00', 2019, 'Subaru ', 'Forester', 14567, '42335662DD1A1245', NULL);");
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE vehicle');
    }
}
