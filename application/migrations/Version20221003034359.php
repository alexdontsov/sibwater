<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20221003034359 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SEQUENCE meterage_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE TABLE meterage (id serial, lat DOUBLE PRECISION DEFAULT NULL, long DOUBLE PRECISION DEFAULT NULL, height DOUBLE PRECISION DEFAULT NULL, value DOUBLE PRECISION DEFAULT NULL, param VARCHAR(255) NOT NULL, PRIMARY KEY(id))');

    }

    public function down(Schema $schema) : void
    {
        $this->addSql('DROP TABLE meterage');
    }
}
