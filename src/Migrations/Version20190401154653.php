<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190401154653 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE transport (id INT AUTO_INCREMENT NOT NULL, id_d_id INT DEFAULT NULL, id_a_id INT NOT NULL, frais DOUBLE PRECISION NOT NULL, UNIQUE INDEX UNIQ_66AB212E8720BF68 (id_d_id), UNIQUE INDEX UNIQ_66AB212EB0FE4F5A (id_a_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE transport ADD CONSTRAINT FK_66AB212E8720BF68 FOREIGN KEY (id_d_id) REFERENCES position (id)');
        $this->addSql('ALTER TABLE transport ADD CONSTRAINT FK_66AB212EB0FE4F5A FOREIGN KEY (id_a_id) REFERENCES position (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE transport');
    }
}
