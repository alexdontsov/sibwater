<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20221006112943 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        $this->addSql("
insert into public.meterage (lat, long, height, value, param)
values  (12, 121, 212, 121, '212');
        ");

    }

    public function down(Schema $schema) : void
    {

    }
}
