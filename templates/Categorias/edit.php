<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Categoria $categoria
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Ações') ?></h4>
            <?= $this->Form->postLink(
                __('Apagar'),
                ['action' => 'delete', $categoria->id],
                ['confirm' => __(' Tem certeza que deseja apagar Categoria # {0}?', $categoria->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('Listar Categorias'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="categorias form content">
            <?= $this->Form->create($categoria) ?>
            <fieldset>
                <legend><?= __('Editar Categoria') ?></legend>
                <?php
                    echo $this->Form->control('nome');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Salvar')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
