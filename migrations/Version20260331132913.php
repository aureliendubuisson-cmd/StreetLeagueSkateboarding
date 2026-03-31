<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20260331132913 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE skater ADD favorite_trick_id INT NOT NULL');
        $this->addSql('ALTER TABLE skater DROP favorite_trick');
        $this->addSql('ALTER TABLE skater ADD CONSTRAINT FK_A475478818D6A6DF FOREIGN KEY (favorite_trick_id) REFERENCES trick (id) NOT DEFERRABLE');
        $this->addSql('CREATE INDEX IDX_A475478818D6A6DF ON skater (favorite_trick_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE skater DROP CONSTRAINT FK_A475478818D6A6DF');
        $this->addSql('DROP INDEX IDX_A475478818D6A6DF');
        $this->addSql('ALTER TABLE skater ADD favorite_trick VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE skater DROP favorite_trick_id');
    }
}
