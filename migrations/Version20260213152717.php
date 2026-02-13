<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

final class Version20260213152717 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'Split column name';
    }

    public function up(Schema $schema): void
    {
        $this->addSql('ALTER TABLE skater ADD first_name VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE skater RENAME COLUMN name TO last_name');
    }

    public function down(Schema $schema): void
    {
        $this->addSql('ALTER TABLE skater ADD name VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE skater DROP last_name');
        $this->addSql('ALTER TABLE skater DROP first_name');
    }
}
