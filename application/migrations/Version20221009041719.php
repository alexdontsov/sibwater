<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20221009041719 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        $this->addSql('ALTER TABLE meterage ADD parameter_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE meterage ADD CONSTRAINT FK_A9641F1C7C56DBD6 FOREIGN KEY (parameter_id) REFERENCES parameter (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('CREATE INDEX IDX_A9641F1C7C56DBD6 ON meterage (parameter_id)');
//        $this->addSql('ALTER TABLE parameter ALTER id DROP DEFAULT');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('DROP SEQUENCE location_id_seq CASCADE');
        $this->addSql('CREATE SEQUENCE meterage_id_seq1 INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('DROP TABLE location');
        $this->addSql('ALTER TABLE meterage DROP CONSTRAINT FK_A9641F1C7C56DBD6');
        $this->addSql('DROP INDEX IDX_A9641F1C7C56DBD6');
        $this->addSql('ALTER TABLE meterage DROP parameter_id');
        $this->addSql('CREATE SEQUENCE meterage_id_seq');
        $this->addSql('SELECT setval(\'meterage_id_seq\', (SELECT MAX(id) FROM meterage))');
        $this->addSql('ALTER TABLE meterage ALTER id SET DEFAULT nextval(\'meterage_id_seq\')');
        $this->addSql('CREATE SEQUENCE parameter_id_seq');
        $this->addSql('SELECT setval(\'parameter_id_seq\', (SELECT MAX(id) FROM parameter))');
        $this->addSql('ALTER TABLE parameter ALTER id SET DEFAULT nextval(\'parameter_id_seq\')');
    }
}
