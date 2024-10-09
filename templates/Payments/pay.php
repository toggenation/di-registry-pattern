<?php

/**
 * @var \App\View\AppView $this
 */
?>
<?= $this->Form->create(null); ?>
<?= $this->Form->control('provider', [
    'options' => $providers,
    'type' => 'select',
    'empty' => '(select a provider)'
]); ?>

<?= $this->Form->control('amount', ['value' => rand(1, 100)]); ?>

<?= $this->Form->submit('Pay'); ?>

