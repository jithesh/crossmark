<?= $this->element('templateelmnt'); ?>

<link rel="stylesheet" href="/themes/startui/css/separate/pages/tasks.min.css">
<script src="/themes/startui/js/app.js"></script>

<div class="mptl-container-fluid">
	<!-- <header class="section-header">
		<div class="tbl">
			<div class="tbl-row">
				<div class="tbl-cell">
					<h3>Zone</h3>
					<ol class="breadcrumb breadcrumb-simple">
						<li><a href="/Zones">Zone</a></li>
						<li>Edit</li>
					</ol>
				</div>
			</div>
		</div>
	</header> -->
    <?= $this->Form->create($zone) ?>
    <section class="card">
        <div class="card-block">
            <fieldset>
        <?php
            echo $this->Form->control('zoneid',['label'=>'Zone Id']);
            echo $this->Form->control('name');
            echo $this->Form->control('description');
            echo $this->Form->control('lat',['label'=>'Latitude']);
            echo $this->Form->control('lon',['label'=>'Longitude']);
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

