<?= $this->element('templateelmnt'); ?>

<link rel="stylesheet" href="/themes/startui/css/separate/pages/tasks.min.css">

<div class="container-fluid">
	<header class="section-header">
		<div class="tbl">
			<div class="tbl-row">
				<div class="tbl-cell">
					<h3>RFID Reader</h3>
					<ol class="breadcrumb breadcrumb-simple">
						<li><a href="/RfidReaders">RFID Reader</a></li>
						<li>View</li>
					</ol>
				</div>
			</div>
		</div>
	</header>
    <?= $this->Form->create($rfidReader) ?>
    <section class="card box-typical">
        <div class="card-block">
            <fieldset>
        <?php
            echo $this->Form->control('name');
            echo $this->Form->control('description');
            echo $this->Form->control('lat',['label'=>'Latitude']);
            echo $this->Form->control('lon',['label'=>'Longitude']);
            echo $this->Form->control('type');
            echo $this->Form->control('model');
			echo $this->Form->control('zone_id', ['options' => $zones, 'empty' => true]);
        ?>
    </fieldset>
    </div>
		<div class="card-footer">
            <?=$this->Html->link(__('Cancel'), ['action' => 'index'], ['escape' => false])?>
    		<?=$this->Html->link(__('Edit'), ['action' => 'edit', $rfidReader['id']],['class'=>'btn btn-primary label-info pull-right'], ['escape' => false])?>
    	</div>
    </section>
    <?= $this->Form->end() ?>
</div>
