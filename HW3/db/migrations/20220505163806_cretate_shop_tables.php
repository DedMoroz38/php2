<?php
declare(strict_types=1);

use Phinx\Migration\AbstractMigration;

final class CretateShopTables extends AbstractMigration
{
    /**
     * Change Method.
     *
     * Write your reversible migrations using this method.
     *
     * More information on writing migrations is available here:
     * https://book.cakephp.org/phinx/0/en/migrations.html#the-change-method
     *
     * Remember to call "create()" or "update()" and NOT "save()" when working
     * with the Table class.
     */
    public function change(): void
    {
        $this->table('catalogItems')
            ->addColumn('name', 'longblob')
            ->addColumn('description', 'text')
            ->addColumn('price', 'integer')
            ->create();

        $this->table('cart')
            ->addColumn('sessionId', 'text')
            ->addColumn('itemId', 'integer')
            ->create();

        $this->table('users')
            ->addColumn('login', 'text')
            ->addColumn('password', 'text')
            ->addColumn('hash', 'text')
            ->create();
        $this->table('orders')
            ->addColumn('userId', 'integer')
            ->addColumn('address', 'text')
            ->addColumn('city', 'text')
            ->addColumn('zip', 'text')
            ->addColumn('cartRefId', 'text')
            ->create();
    }
}
