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
						<li>Add</li>
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
            // echo $this->Form->control('name',['templateVars' => ['icon' => '<i class="font-icon fa fa-pencil"></i>']]);
            // echo $this->Form->control('description',['templateVars' => ['icon' => '<i class="font-icon fa fa-info-circle"></i>']]);
            // echo $this->Form->control('lat');
            // echo $this->Form->control('lon');
            
            echo $this->Form->control('startrange');
            echo $this->Form->control('endrange');
			
			echo $this->Form->control('activated',['checked'=>true,'disabled'=>true]);
			echo $this->Form->control('exited',['disabled'=>true]);
			
            
        ?>
    </fieldset>
    </div>
		<div class="card-footer">
            <?=$this->Html->link(__('Cancel'), ['action' => 'index'], ['escape' => false])?>
    		<!-- <?= $this->Form->button(__('Submit'),['title'=>'Save','class'=>'btn pull-right']) ?> -->
    		<input type="button" id="addtagsbtn"  value="Add Tags" class="pull-right btn btn-primary"  onclick="return addTags()" />
    	</div>
    </section>
    <?= $this->Form->end() ?>
</div>


<?php $this->start('scriptBottom'); ?>
<script>

function addTags(){

		var startrange = $('#startrange').val();
		var endrange = $('#endrange').val();

	if(startrange!="" && startrange!=null && endrange!="" && endrange!=null){
		$.ajax({
        	type: "POST",
        	url: '/RfidTags/addTags',
        	data: 'startrange='+startrange+'&endrange='+endrange,
        	success : function(data) {
          		// window.location='/employees';  
          		alert("Success.");
            	return false;
    		},
        	error : function(data) {//console.log(data);
            	alert("Error while adding Rfid Tags.");
            	return false;
        	}
    	});
   }else{
   	alert("Please enter start / end ranges.");
   }
  }

</script>
 <?php $this->end(); ?>