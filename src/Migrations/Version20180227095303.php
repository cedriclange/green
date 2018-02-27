<?php

namespace DoctrineMigrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20180227095303 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE product_tbl (id INT AUTO_INCREMENT NOT NULL, category_id INT DEFAULT NULL, name VARCHAR(50) NOT NULL, description LONGTEXT NOT NULL, price NUMERIC(10, 0) NOT NULL, is_deleted TINYINT(1) NOT NULL, INDEX IDX_5F5969D712469DE2 (category_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE product_tbl ADD CONSTRAINT FK_5F5969D712469DE2 FOREIGN KEY (category_id) REFERENCES category_tbl (id)');
        $this->addSql('DROP TABLE product_table');
        $this->addSql('ALTER TABLE service_tbl ADD price NUMERIC(10, 0) NOT NULL');
    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE product_table (id INT AUTO_INCREMENT NOT NULL, category_id INT DEFAULT NULL, name VARCHAR(50) NOT NULL COLLATE utf8_unicode_ci, description LONGTEXT NOT NULL COLLATE utf8_unicode_ci, price NUMERIC(10, 0) NOT NULL, is_deleted TINYINT(1) NOT NULL, INDEX IDX_5775F41A12469DE2 (category_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE product_table ADD CONSTRAINT FK_5775F41A12469DE2 FOREIGN KEY (category_id) REFERENCES category_tbl (id)');
        $this->addSql('DROP TABLE product_tbl');
        $this->addSql('ALTER TABLE service_tbl DROP price');
    }
}
