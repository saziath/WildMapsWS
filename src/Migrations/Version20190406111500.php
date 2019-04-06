<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190406111500 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE itinairaire (id INT AUTO_INCREMENT NOT NULL, idp_id INT NOT NULL, id_v_id INT NOT NULL, description VARCHAR(255) NOT NULL, price DOUBLE PRECISION NOT NULL, INDEX IDX_EF78FDC3B49202 (idp_id), INDEX IDX_EF78FDC37D30207C (id_v_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE voyage (id INT AUTO_INCREMENT NOT NULL, nbr_of_activity INT NOT NULL, totalprice DOUBLE PRECISION NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE voyage_hotel (voyage_id INT NOT NULL, hotel_id INT NOT NULL, INDEX IDX_9C3623668C9E5AF (voyage_id), INDEX IDX_9C362363243BB18 (hotel_id), PRIMARY KEY(voyage_id, hotel_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE itinairaire ADD CONSTRAINT FK_EF78FDC3B49202 FOREIGN KEY (idp_id) REFERENCES position (id)');
        $this->addSql('ALTER TABLE itinairaire ADD CONSTRAINT FK_EF78FDC37D30207C FOREIGN KEY (id_v_id) REFERENCES voyage (id)');
        $this->addSql('ALTER TABLE voyage_hotel ADD CONSTRAINT FK_9C3623668C9E5AF FOREIGN KEY (voyage_id) REFERENCES voyage (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE voyage_hotel ADD CONSTRAINT FK_9C362363243BB18 FOREIGN KEY (hotel_id) REFERENCES hotel (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE activite ADD id_i_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE activite ADD CONSTRAINT FK_B8755515754A67B5 FOREIGN KEY (id_i_id) REFERENCES itinairaire (id)');
        $this->addSql('CREATE INDEX IDX_B8755515754A67B5 ON activite (id_i_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE activite DROP FOREIGN KEY FK_B8755515754A67B5');
        $this->addSql('ALTER TABLE itinairaire DROP FOREIGN KEY FK_EF78FDC37D30207C');
        $this->addSql('ALTER TABLE voyage_hotel DROP FOREIGN KEY FK_9C3623668C9E5AF');
        $this->addSql('DROP TABLE itinairaire');
        $this->addSql('DROP TABLE voyage');
        $this->addSql('DROP TABLE voyage_hotel');
        $this->addSql('DROP INDEX IDX_B8755515754A67B5 ON activite');
        $this->addSql('ALTER TABLE activite DROP id_i_id');
    }
}
