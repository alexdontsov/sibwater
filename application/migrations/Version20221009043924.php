<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20221009043924 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {

        $this->addSql('ALTER TABLE meterage ADD location_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE meterage ADD CONSTRAINT FK_A9641F1C64D218E FOREIGN KEY (location_id) REFERENCES location (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('CREATE INDEX IDX_A9641F1C64D218E ON meterage (location_id)');

    }

    public function down(Schema $schema) : void
    {

    }
}
