<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Produto> $produtos
 */
?>
<div class="produtos index content">
    <?= $this->Html->link(__('Novo Produto'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Produtos') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('nome') ?></th>
                    <th><?= $this->Paginator->sort('preco') ?></th>
                    <th><?= $this->Paginator->sort('categoria_id') ?></th>
                    <th><?= $this->Paginator->sort('criação') ?></th>
                    <th><?= $this->Paginator->sort('modificação') ?></th>
                    <th class="actions"><?= __('Ações') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($produtos as $produto): ?>
                <tr>
                    <td><?= $this->Number->format($produto->id) ?></td>
                    <td><?= h($produto->nome) ?></td>
                    <td><?= $this->Number->format($produto->preco) ?></td>
                    <td><?= $produto->has('categoria') ? $this->Html->link($produto->categoria->nome, ['controller' => 'Categorias', 'action' => 'view', $produto->categoria->id]) : '' ?></td>
                    <td><?= h($produto->created) ?></td>
                    <td><?= h($produto->modified) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('Exibir'), ['action' => 'view', $produto->id]) ?>
                        <?= $this->Html->link(__('Editar'), ['action' => 'edit', $produto->id]) ?>
                        <?= $this->Form->postLink(__('Apagar'), ['action' => 'delete', $produto->id], ['confirm' => __('Are you sure you want to delete # {0}?', $produto->id)]) ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __(' anterior ')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('próximo') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(__('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')) ?></p>
    </div>
</div>
