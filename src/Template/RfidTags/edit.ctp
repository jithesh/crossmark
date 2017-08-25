<?= $this->element('templateelmnt'); ?>

<link rel="stylesheet" href="/themes/startui/css/separate/pages/tasks.min.css">

<div class="container-fluid">
	<header class="section-header">
		<div class="tbl">
			<div class="tbl-row">
				<div class="tbl-cell">
					<h3>RFID Tag</h3>
					<ol class="breadcrumb breadcrumb-simple">
						<li><a href="/RfidTags">RFID Tags</a></li>
						<li>Edit</li>
					</ol>
				</div>
			</div>
		</div>
	</header>
    <?= $this->Form->create($rfidTag) ?>
    <section class="card box-typical">
        <div class="card-block">
            <fieldset>
        <?php
            echo $this->Form->control('name');
            echo $this->Form->control('description');
            echo $this->Form->control('lat');
            echo $this->Form->control('lon');
            echo $this->Form->control('make');
            echo $this->Form->control('type');
			echo $this->Form->control('activated');
			echo $this->Form->control('archived');
            echo $this->Form->control('terminal_id', ['options' => $terminals, 'empty' => true]);
            
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

