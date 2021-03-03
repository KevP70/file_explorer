<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210303131418 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE files ADD category_id_id INT NOT NULL');
        $this->addSql('ALTER TABLE files ADD CONSTRAINT FK_63540599777D11E FOREIGN KEY (category_id_id) REFERENCES categories (id)');
        $this->addSql('CREATE INDEX IDX_63540599777D11E ON files (category_id_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE files DROP FOREIGN KEY FK_63540599777D11E');
        $this->addSql('DROP INDEX IDX_63540599777D11E ON files');
        $this->addSql('ALTER TABLE files DROP category_id_id');
    }
}
