<?php declare(strict_types = 1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20180424125437 extends AbstractMigration
{
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE service_tbl ADD media_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE service_tbl ADD CONSTRAINT FK_9D264EBFEA9FDD75 FOREIGN KEY (media_id) REFERENCES media__media (id)');
        $this->addSql('CREATE INDEX IDX_9D264EBFEA9FDD75 ON service_tbl (media_id)');
    }

    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE service_tbl DROP FOREIGN KEY FK_9D264EBFEA9FDD75');
        $this->addSql('DROP INDEX IDX_9D264EBFEA9FDD75 ON service_tbl');
        $this->addSql('ALTER TABLE service_tbl DROP media_id');
    }
}
