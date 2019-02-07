<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190207175120 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE psycho ADD grumpy_puppy_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE psycho ADD CONSTRAINT FK_281D317422999EA7 FOREIGN KEY (grumpy_puppy_id) REFERENCES grumpy_puppy (id)');
        $this->addSql('CREATE INDEX IDX_281D317422999EA7 ON psycho (grumpy_puppy_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE psycho DROP FOREIGN KEY FK_281D317422999EA7');
        $this->addSql('DROP INDEX IDX_281D317422999EA7 ON psycho');
        $this->addSql('ALTER TABLE psycho DROP grumpy_puppy_id');
    }
}
