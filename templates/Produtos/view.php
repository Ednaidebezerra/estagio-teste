<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Produto $produto
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Ações') ?></h4>
            <?= $this->Html->link(__('Editar Produto'), ['action' => 'edit', $produto->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Excluir Produto'), ['action' => 'delete', $produto->id], ['confirm' => __('Are you sure you want to delete # {0}?', $produto->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('Listar Produtos'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('Novo Produto'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="produtos view content">
            <h3><?= h($produto->nome) ?></h3>
            <table>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($produto->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Nome') ?></th>
                    <td><?= h($produto->nome) ?></td>
                </tr>
                <tr>
                    <th><?= __('Categoria') ?></th>
                    <td><?= $produto->has('categoria') ? $this->Html->link($produto->categoria->nome, ['controller' => 'Categorias', 'action' => 'view', $produto->categoria->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Preço') ?></th>
                    <td><?= $this->Number->format($produto->preco) ?></td>
                </tr>
                <tr>
                    <th><?= __('Criação') ?></th>
                    <td><?= h($produto->created) ?></td>
                </tr>
                <tr>
                    <th><?= __('Modificação') ?></th>
                    <td><?= h($produto->modified) ?></td>
                </tr>
            </table>
            <div class="text">
                <strong><?= __('Descrição') ?></strong>
                <blockquote>
                    <?= $this->Text->autoParagraph(h($produto->descricao)); ?>
                </blockquote>
            </div>
        </div>
    </div>
</div>
