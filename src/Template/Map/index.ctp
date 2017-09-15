<script src="http://fabricjs.com/lib/fabric.js"></script>
<div class="container-fluid">
	<header class="section-header">
		<div class="tbl">
			<div class="tbl-row">
				<div class="tbl-cell">
					<h2>Location</h2>
				</div>
			</div>
		</div>
	</header>

	<section class="card">
		<div class="card-block">
			<div class="row">
				<div class="col-md-3">
					<input type="button" value="Add Baggage" class="btn btn-inline" onClick="addbaggage()">
					<input type="button" value="Add Bathroom" class="btn btn-inline" onClick="addbathroom()">
				</div>
				<div class="col-md-3">
	    			<!-- content -->
					<canvas id="c" width="800" height="450" style="border:1px solid #aaa"></canvas> 
				</div> 
			</div>       
		</div>
	</section>
</div>


<?php $this -> start('scriptBottom'); ?>
<script>
var canvas = this.__canvas = new fabric.Canvas('c');
$(function() {
	
	
});

function addbaggage(){
   var obj = new fabric.Rect({top: 100, left: 200, width: 150, height: 50, stroke: 'red', fill:'white'});   
   canvas.add(obj);
}
function addbathroom(){
    var obj = new fabric.Rect({top: 100, left: 0, width: 100, height: 150, stroke: 'green', fill:'white'});  
    canvas.add(obj);
}
</script>

<?php $this -> end(); ?>