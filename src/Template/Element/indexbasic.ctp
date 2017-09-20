<link rel="stylesheet" href="/themes/startui/css/lib/bootstrap-table/bootstrap-table.min.css"/>
<link rel="stylesheet" href="/themes/startui/css/lib/bootstrap-table/dragtable.css">

<style>
	.fixed-table-header{display:none;}/*acoid table header displayed twice*/
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

		<?php echo $this->Flash->render(); ?>
		<?php echo $this->Flash->render('auth'); ?>
		
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
   	   class="table table-striped table-hover"
       data-url="/<?php echo $this->request->params['controller'] ?>/ajaxData"
       data-query-params="queryParams"
       data-toolbar="#toolbar"
       data-pagination="true"
       data-reorderable-columns="true"
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
       data-show-footer="false">
    <thead>
    <tr>
    	<th data-field="id" data-checkbox="true"></th>
    	<?php
                  for($i=0;$i<count($headers);$i++){
	                  	echo "<th data-field='". strtolower($headers[$i]) ."' data-sortable='true'>" . $headers[$i] . "</th>";
                  }
        ?>
    	<!-- <th data-formatter="TableActions">Actions</th> -->
        
    </tr>
    </thead>
</table>

</section>
</div>






<?php $this->start('scriptBottom'); ?>


<script src="/themes/startui/js/lib/bootstrap-table/bootstrap-table.js"></script>
<script src="/themes/startui/js/lib/bootstrap-table/bootstrap-table-export.min.js"></script>
<script src="/themes/startui/js/lib/bootstrap-table/tableExport.min.js"></script>


<script src="/themes/startui/js/lib/bootstrap-table/bootstrap-table-reorder-columns.min.js"></script>
<script src="/themes/startui/js/lib/bootstrap-table/jquery.dragtable.js"></script>

<script type="text/javascript">
var modalname='<?php echo $this->name; ?>';
var $table = $('#table'),
	  $remove = $('#remove');
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
                '<form name="formdelete" id="formdelete' +row.rowid+ '" method="post" action="'+modalname+'/delete/'+row.rowid+'" style="display:none;" >',
                '<input type="hidden" name="_method" value="POST"></form>',
               	'<a href="#" onclick="sweet_confirmdelete(&quot;BagTrace&quot;,&quot;Are you sure you want to delete #'+row.name+' ?&quot; , function(){ document.getElementById(&quot;formdelete'+row.rowid+'&quot;).submit(); })',
                '" class="like fa fa-times"></a>'
            ].join('');
    }
        
  function detailFormatter(index, row, element){
	var html = [];
	html.push('<iframe id="if1" width="100%" height="265" style="visibility:visible" target="_parent" src="/<?php echo $this->request->params['controller'] ?>/edit/'+row.rowid+'"></iframe>');
        // $.each(row, function (key, value) {
            // html.push('<p><b>' + key + ':</b> ' + value + '</p>');
        // });
        return html.join('');
  }
	
 $(document).ready(function(){
  
	$table.on('check.bs.table uncheck.bs.table ' + 'check-all.bs.table uncheck-all.bs.table', function () {
		$remove.prop('disabled', !$table.bootstrapTable('getSelections').length);
	});
      
   $remove.on('click', function(){
		sweet_confirmdelete("MayHaw","Are you sure you want to delete the selected " + modalname + " ?", function(){
			
			$('input[name="btSelectItem"]').each(function (){
		    	var sThisVal = (this.checked ? $(this).val() : "");
		    	var value=$(this).attr("value");
		    	if(sThisVal){
		    		$.ajax({
        				type: "POST",
        				url: '/<?php echo $this->request->params['controller'] ?>/deleteSelected',
        				data: 'value='+value,
        				success : function(data) {$table.bootstrapTable('refresh');
        					if(data!="success"){
    							sweet_alert("BagTrace","Couldn't delete the selected rows.Please try again.");
								return false;
    						}
    					},
        				error : function(data) {
            				sweet_alert("BagTrace","Couldn't delete the selected rows.Please try again later.");
            				return false;
        				}
    				});
		    	}
	   		});
			// $table.bootstrapTable('remove', {
				// field: 'id',
				// values: ids
			// });
			// $remove.prop('disabled', true);
		
			return true;
		});		
	});
	         
	$('#toolbar').find('select').change(function () {
		$table.bootstrapTable('refreshOptions', {
			exportDataType: $(this).val()
		});
	});

});
</script>
<?php $this->end(); ?>


