<?php
namespace OC\Migrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\DBAL\Types\Type;
use OCP\Migration\ISchemaMigration;

/**
 * Auto-generated migration step: Please modify to your needs!
 */
class Version20181220085457 implements ISchemaMigration {

	public function changeSchema(Schema $schema, array $options) {
		$prefix = $options['tablePrefix'];

		// FIXME: probably should be another table - temporarly use JSON field for the sake of POC
		if ($schema->hasTable("${prefix}share")) {
			$shareTable = $schema->getTable("${prefix}share");

			if (!$shareTable->hasColumn('extra_permissions')) {
				$shareTable->addColumn(
					'extra_permissions',
					Type::STRING,
					[
						'default' => '{}',
						'length' => 255,
						'notnull' => true
					]
				);
			}
		}
    }
}
