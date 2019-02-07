<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190207175956 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE grumpy_puppy_smelling (grumpy_puppy_id INT NOT NULL, smelling_id INT NOT NULL, INDEX IDX_422A437722999EA7 (grumpy_puppy_id), INDEX IDX_422A4377C3F01976 (smelling_id), PRIMARY KEY(grumpy_puppy_id, smelling_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE smelling (id INT AUTO_INCREMENT NOT NULL, acidity INT DEFAULT NULL, roughness INT DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE grumpy_puppy_smelling ADD CONSTRAINT FK_422A437722999EA7 FOREIGN KEY (grumpy_puppy_id) REFERENCES grumpy_puppy (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE grumpy_puppy_smelling ADD CONSTRAINT FK_422A4377C3F01976 FOREIGN KEY (smelling_id) REFERENCES smelling (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE grumpy_puppy_smelling DROP FOREIGN KEY FK_422A4377C3F01976');
        $this->addSql('DROP TABLE grumpy_puppy_smelling');
        $this->addSql('DROP TABLE smelling');
    }
}
