<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230310194312 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE episodios (id INT AUTO_INCREMENT NOT NULL, episodio VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE personaje_episodios (personaje_id INT NOT NULL, episodios_id INT NOT NULL, INDEX IDX_24C8A0C0121EFAFB (personaje_id), INDEX IDX_24C8A0C073FB2891 (episodios_id), PRIMARY KEY(personaje_id, episodios_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE personaje_episodios ADD CONSTRAINT FK_24C8A0C0121EFAFB FOREIGN KEY (personaje_id) REFERENCES personaje (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE personaje_episodios ADD CONSTRAINT FK_24C8A0C073FB2891 FOREIGN KEY (episodios_id) REFERENCES episodios (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE personaje_episodios DROP FOREIGN KEY FK_24C8A0C0121EFAFB');
        $this->addSql('ALTER TABLE personaje_episodios DROP FOREIGN KEY FK_24C8A0C073FB2891');
        $this->addSql('DROP TABLE episodios');
        $this->addSql('DROP TABLE personaje_episodios');
    }
}
