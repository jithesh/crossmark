<?= $this->element('templateelmnt'); ?>

<link rel="stylesheet" href="/themes/startui/css/separate/pages/tasks.min.css">

<div class="container-fluid">
	<header class="section-header">
		<div class="tbl">
			<div class="tbl-row">
				<div class="tbl-cell">
					<h3>Customers</h3>
					<ol class="breadcrumb breadcrumb-simple">
						<li><a href="/Customers">Customers</a></li>
						<li>Add</li>
					</ol>
				</div>
			</div>
		</div>
	</header>

	<?= $this->Form->create($customer) ?>
   	<section class="card box-typical">
        <div class="card-block">
            <fieldset>
                <?php
					echo $this->Form->control('name',['templateVars' => ['icon' => '<i class="font-icon font-icon-user color-blue"></i>']]);
					echo $this->Form->control('contactno',['label'=>'Contact Number','templateVars' => ['icon' => '<i class="font-icon font-icon-phone color-blue"></i>']]);
                ?>
            </fieldset>
        </div>
		<div class="card-footer">
            <?=$this->Html->link(__('Cancel'), ['action' => 'index'], ['escape' => false])?>
    		<?= $this->Form->button(__('Submit'),['title'=>'Save','class'=>'btn pull-right']) ?>
    	</div>
    </section>
    <?= $this->Form->end() ?>
</div>

