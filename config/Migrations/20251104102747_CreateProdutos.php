<?php
declare(strict_types=1);

use Migrations\AbstractMigration;

class CreateProdutos extends AbstractMigration
{
    /**
     * Change Method.
     *
     * More information on this method is available here:
     * https://book.cakephp.org/phinx/0/en/migrations.html#the-change-method
     * @return void
     */
    public function change(): void
    {
        $table = $this->table('produtos');

        $table->addColumn('nome', 'string', [
            'default' => null,
            'limit' => 255,
            'null' => false,
        ]);


        $table->addColumn('descricao', 'text', [
            'default' => null,
            'null' => false,
        ]);

        $table->addColumn('preco', 'decimal', [
            'default' => null,
            'null' => false,
            'precision' => 5,
            'scale' => 2,
        ]);


        $table->addColumn('categoria_id', 'integer', [
            'null' => false,
        ]);

        $table->addForeignKey(
            'categoria_id', 
            'categorias', 
            'id',
            ['delete'=> 'CASCADE', 'update'=> 'CASCADE']
        );

        $table->addColumn('created', 'datetime', [
            'default' => null,
            'null' => false,
        ]);
        
        $table->addColumn('modified', 'datetime', [
            'default' => null,
            'null' => false,
        ]);

        $table->create();
    }
}
