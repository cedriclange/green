<?php declare(strict_types = 1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20180424112717 extends AbstractMigration
{
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE product_tbl ADD media_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE product_tbl ADD CONSTRAINT FK_5F5969D7EA9FDD75 FOREIGN KEY (media_id) REFERENCES media__media (id)');
        $this->addSql('CREATE INDEX IDX_5F5969D7EA9FDD75 ON product_tbl (media_id)');
        $this->addSql('ALTER TABLE media__gallery_media ADD gallery_id INT DEFAULT NULL, ADD media_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE media__gallery_media ADD CONSTRAINT FK_80D4C5414E7AF8F FOREIGN KEY (gallery_id) REFERENCES media__gallery (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE media__gallery_media ADD CONSTRAINT FK_80D4C541EA9FDD75 FOREIGN KEY (media_id) REFERENCES media__media (id) ON DELETE CASCADE');
        $this->addSql('CREATE INDEX IDX_80D4C5414E7AF8F ON media__gallery_media (gallery_id)');
        $this->addSql('CREATE INDEX IDX_80D4C541EA9FDD75 ON media__gallery_media (media_id)');
    }

    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE media__gallery_media DROP FOREIGN KEY FK_80D4C5414E7AF8F');
        $this->addSql('ALTER TABLE media__gallery_media DROP FOREIGN KEY FK_80D4C541EA9FDD75');
        $this->addSql('DROP INDEX IDX_80D4C5414E7AF8F ON media__gallery_media');
        $this->addSql('DROP INDEX IDX_80D4C541EA9FDD75 ON media__gallery_media');
        $this->addSql('ALTER TABLE media__gallery_media DROP gallery_id, DROP media_id');
        $this->addSql('ALTER TABLE product_tbl DROP FOREIGN KEY FK_5F5969D7EA9FDD75');
        $this->addSql('DROP INDEX IDX_5F5969D7EA9FDD75 ON product_tbl');
        $this->addSql('ALTER TABLE product_tbl DROP media_id');
    }
}
