<?= $this->element('templateelmnt'); ?>

<link rel="stylesheet" href="/themes/startui/css/separate/pages/tasks.min.css">
<script src="/themes/startui/js/app.js"></script>

<div class="mptl-container-fluid">
    <?= $this->Form->create($site) ?>
    <section class="card">
        <div class="card-block">
            <fieldset>
        <?php
            echo $this->Form->control('siteid',['label'=>'Site Id']);
            echo $this->Form->control('name');
            echo $this->Form->control('description');
            echo $this->Form->control('lat',['label'=>'Latitude']);
            echo $this->Form->control('lon',['label'=>'Longitude']);
			echo $this->Form->control('customer_id', ['options' => $customers, 'empty' => true]);
        ?>
    </fieldset>
    </div>
		<div class="card-footer">
            <?=$this->Html->link(__('Cancel'), ['action' => 'index'], ['escape' => false])?>
    		<?= $this->Form->button(__('Submit'),['title'=>'Update','class'=>'btn pull-right']) ?>
    	</div>
    </section>
    <?= $this->Form->end() ?>
</div>