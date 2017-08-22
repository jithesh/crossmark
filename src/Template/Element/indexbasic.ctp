<style>
	.fixed-table-header{display:none;}/*acoid table header displayed twice*/*/
</style>
<header class="page-content-header">
	<div class="container-fluid">
        <div class="tbl">
            <div class="tbl-row">
                <div class="tbl-cell">
                    <h3><?php echo $title; ?></h3>
                </div>
                <div class="tbl-cell tbl-cell-action">
                	<?= $this->Html->link('<b>Add</b> ', ['action' => 'add'],['class' => 'btn btn-rounded btn-success','escape' => false]) ?>
                </div>
            </div>
        </div>
    </div>
</header>
		
<div class="container-fluid">
   <section class="box-typical">
   	<div id="toolbar">
 		<!-- <div class="bootstrap-table-header">
        	Table header
     	</div> -->
   		<button id="remove" class="btn btn-danger remove" disabled>
			<i class="font-icon font-icon-close-2"></i> Delete
		</button>
    </div>
   	<table id="table" data-toggle="table"
   	   class="table table-striped"
       data-url="/<?php echo $this->request->params['controller'] ?>/ajaxData"
       data-query-params="queryParams"
       data-toolbar="#toolbar"
       data-pagination="true"
       data-reorderable-columns="true"
       data-reorderable-rows="true"
       data-search="true"
       data-show-refresh="true"
       data-show-toggle="true"
       data-show-columns="true"
       data-show-export="true"
       data-detail-view="true"
       data-detail-formatter="detailFormatter"
       data-minimum-count-columns="2"
       data-show-pagination-switch="true"
       data-pagination="true"
       data-id-field="id"
       data-page-list="[10, 25, 50, 100, ALL]"
       data-show-footer="false"
 	   data-height="300">
    <thead>
    <tr>
    	<th data-field="id" data-checkbox="true"></th>
    	<?php
                  for($i=0;$i<count($headers);$i++){
	                  	echo "<th data-field='". strtolower($headers[$i]) ."'>" . $headers[$i] . "</th>";
                  }
        ?>
    	<th data-formatter="TableActions">Actions</th>
        
    </tr>
    </thead>
</table>


			</section>
</div>






<?php $this->start('scriptBottom'); ?>

<script>
var modalname="zones";
// function queryParams() {
    // return {
        // type: 'owner',
        // sort: 'updated',
        // direction: 'desc',
        // per_page: 100,
        // page: 1
    // };
// }
function TableActions (value, row, index) {
            return [
            	'<a class="like" title="View" href="/<?php echo $this->request->params['controller'] ?>/view/'+row.rowid+'"><i class="fa fa-info-circle"></i></a> ',
                '<a class="like" title="Edit" href="/<?php echo $this->request->params['controller'] ?>/edit/'+row.rowid+'"><i class="fa fa-pencil"></i></a> ',
                '<form name="formdelete" id="formdelete' +row.rowid+ '" method="post" action="zones/delete/'+row.rowid+'" style="display:none;" >',
                '<input type="hidden" name="_method" value="POST"></form>',
               	'<a href="#" onclick="sweet_confirmdelete(&quot;BagTrace&quot;,&quot;Are you sure you want to delete #'+row.name+' ?&quot; , function(){ document.getElementById(&quot;formdelete'+row.rowid+'&quot;).submit(); })',
                '" class="like fa fa-times"></a>'
            ].join('');
        }


 $(document).ready(function(){


// sweet_confirmdelete("BagTrace","Are you sure you want to delete " , function(){ console.log("success"); });
               
	$('#toolbar').find('select').change(function () {
		$table.bootstrapTable('refreshOptions', {
			exportDataType: $(this).val()
		});
	});

});
</script>
<?php $this->end(); ?>


