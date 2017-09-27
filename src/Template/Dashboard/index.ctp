<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<link rel="stylesheet" href="/themes/startui/css/lib/bootstrap-table/bootstrap-table.min.css"/>
<link rel="stylesheet" href="/themes/startui/css/lib/bootstrap-table/dragtable.css">

<style>
	.fixed-table-header{display:none;}/*acoid table header displayed twice*/
</style>
<div class="container-fluid">
	
	<?php echo $this->Flash->render(); ?>
		<?php echo $this->Flash->render('auth'); ?>
		
	        <div class="row">
	        	
	        	
	            <div class="col-xl-6">
	                <div class="chart-statistic-box">
	                    <div class="chart-txt">
	                        <div class="chart-txt-top">
	                            <p><span class="number">1540</span></p>
	                            <p class="caption">Bags</p>
	                        </div>
	                        <table class="tbl-data">
	                            <tr>
	                                <td class="price color-purple">120$</td>
	                                <td>Orders</td>
	                            </tr>
	                            <tr>
	                                <td class="price color-yellow">15$</td>
	                                <td>Investments</td>
	                            </tr>
	                            <tr>
	                                <td class="price color-lime">55$</td>
	                                <td>Others</td>
	                            </tr>
	                        </table>
	                    </div>
	                    <div class="chart-container">
	                        <div class="chart-container-in">
	                            <div id="chart_div"></div>
	                            <header class="chart-container-title">Bags</header>
	                            <div class="chart-container-x">
	                                <div class="item"></div>
	                                <div class="item">Tue</div>
	                                <div class="item">Wed</div>
	                                <div class="item">Thu</div>
	                                <div class="item">Fri</div>
	                                <div class="item">Sat</div>
	                                <div class="item">Sun</div>
	                                <div class="item">Mon</div>
	                                <div class="item"></div>
	                            </div>
	                            <div class="chart-container-y">
	                                <div class="item">300</div>
	                                <div class="item"></div>
	                                <div class="item">250</div>
	                                <div class="item"></div>
	                                <div class="item">200</div>
	                                <div class="item"></div>
	                                <div class="item">150</div>
	                                <div class="item"></div>
	                                <div class="item">100</div>
	                                <div class="item"></div>
	                                <div class="item">50</div>
	                                <div class="item"></div>
	                            </div>
	                        </div>
	                    </div>
	                </div><!--.chart-statistic-box-->
	            </div><!--.col-->
	            
	            
	            <div class="col-xl-6">
	                <div class="row">
	                    <div class="col-sm-6">
	                        <article class="statistic-box green">
	                            <div>
	                                <div class="number">26</div>
	                                <div class="caption"><div>Bags processed</div></div>
	                                <div class="percent">
	                                    <div class="arrow up"></div>
	                                    <p>15%</p>
	                                </div>
	                            </div>
	                        </article>
	                    </div><!--.col-->
	                    <div class="col-sm-6">
	                        <article class="statistic-box purple">
	                            <div>
	                                <div class="number">12</div>
	                                <div class="caption"><div>Bags exited</div></div>
	                                <div class="percent">
	                                    <div class="arrow down"></div>
	                                    <p>11%</p>
	                                </div>
	                            </div>
	                        </article>
	                    </div><!--.col-->
	                    <div class="col-sm-6">
	                        <article class="statistic-box yellow">
	                            <div>
	                                <div class="number">104</div>
	                                <div class="caption"><div>Bags in reclaimed area</div></div>
	                                <div class="percent">
	                                    <div class="arrow down"></div>
	                                    <p>5%</p>
	                                </div>
	                            </div>
	                        </article>
	                    </div><!--.col-->
	                    <div class="col-sm-6">
	                        <article class="statistic-box red">
	                            <div>
	                                <div class="number">29</div>
	                                <div class="caption"><div>Bags in airport area</div></div>
	                                <div class="percent">
	                                    <div class="arrow up"></div>
	                                    <p>84%</p>
	                                </div>
	                            </div>
	                        </article>
	                    </div><!--.col-->
	                </div><!--.row-->
	            </div><!--.col-->
	        </div><!--.row-->
	
	
	        <div class="row">
	        
	            <div class="col-xl-6 dahsboard-column">
	                <section class="box-typical">
   						<div id="toolbar">
 							<div class="bootstrap-table-header">
        						Bags in Lost and Found
     						</div>
    					</div>
   						<table id="table" data-toggle="table"
   	   						class="table table-striped table-hover"
       						data-url="/<?php echo $this->request->params['controller'] ?>/ajaxData"
       						data-query-params="queryParams"
       						data-toolbar="#toolbar"
       						data-pagination="false"
 				        	data-reorderable-columns="true"
       						data-search="true"
       						data-show-refresh="true"
       						data-show-toggle="true"
       						data-show-columns="true"
       						data-show-export="true"
       						data-detail-view="false"
       						data-detail-formatter="detailFormatter"
       						data-minimum-count-columns="2"
       						data-show-pagination-switch="false"
       						data-id-field="id"
       						data-show-footer="false">
    						<thead>
    							<tr>
    								<?php
                  						for($i=0;$i<count($headers);$i++){
                  							if(strtolower($headers[$i])=="state"){
                  								echo "<th data-field='". strtolower($headers[$i]) ."' data-sortable='true' data-formatter='stateFormatter' >" . $headers[$i] . "</th>";
                  							}else{
	                  							echo "<th data-field='". strtolower($headers[$i]) ."' data-sortable='true' >" . $headers[$i] . "</th>";
											}
                  						}
        							?>        
        						</tr>
    						</thead>
						</table>
					</section><!--.box-typical-dashboard-->
	            </div><!--.col-->
	            
	            
	            <div class="col-xl-6 dahsboard-column">
	                <section class="box-typical box-typical-dashboard panel panel-default scrollable">
	                    <header class="box-typical-header panel-heading">
	                        <h3 class="panel-title">Bags not Exited</h3>
	                    </header>
	                    <div class="box-typical-body panel-body">
	                        <table class="tbl-typical">
	                            <tr>
	                                <th><div>Status</div></th>
	                                <th><div>Subject</div></th>
	                                <th align="center"><div>Department</div></th>
	                                <th align="center"><div>Date</div></th>
	                            </tr>
	                            <tr>
	                                <td>
	                                    <span class="label label-success">Open</span>
	                                </td>
	                                <td>Website down for one week</td>
	                                <td align="center">Support</td>
	                                <td nowrap align="center"><span class="semibold">Today</span> 8:30</td>
	                            </tr>
	                            <tr>
	                                <td>
	                                    <span class="label label-success">Open</span>
	                                </td>
	                                <td>Restoring default settings</td>
	                                <td align="center">Support</td>
	                                <td nowrap align="center"><span class="semibold">Today</span> 16:30</td>
	                            </tr>
	                            <tr>
	                                <td>
	                                    <span class="label label-warning">Progress</span>
	                                </td>
	                                <td>Loosing control on server</td>
	                                <td align="center">Support</td>
	                                <td nowrap align="center"><span class="semibold">Yesterday</span></td>
	                            </tr>
	                            <tr>
	                                <td>
	                                    <span class="label label-danger">Closed</span>
	                                </td>
	                                <td>Authorizations keys</td>
	                                <td align="center">Support</td>
	                                <td nowrap align="center">23th May</td>
	                            </tr>
	                        </table>
	                    </div><!--.box-typical-body-->
	                </section><!--.box-typical-dashboard-->
	                
	            </div><!--.col-->
	        </div>
		</div>
	</div>

<?php $this->start('scriptBottom'); ?>
<script src="/themes/startui/js/lib/bootstrap-table/bootstrap-table.js"></script>
<script src="/themes/startui/js/lib/bootstrap-table/bootstrap-table-export.min.js"></script>
<script src="/themes/startui/js/lib/bootstrap-table/tableExport.min.js"></script>


<script src="/themes/startui/js/lib/bootstrap-table/bootstrap-table-reorder-columns.min.js"></script>
<script src="/themes/startui/js/lib/bootstrap-table/jquery.dragtable.js"></script>
<script>

function stateFormatter(value) {
    return  value + ' <i class="glyphicon glyphicon-star"></i> ';
}

		$(document).ready(function() {

			try {
				$('.panel').lobiPanel({
					sortable: true
				}).on('dragged.lobiPanel', function(ev, lobiPanel){
					$('.dahsboard-column').matchHeight();
				});
			} catch (err) {}

			google.charts.load('current', {'packages':['corechart']});
			google.charts.setOnLoadCallback(drawChart);
			function drawChart() {
				var dataTable = new google.visualization.DataTable();
				dataTable.addColumn('string', 'Day');
				dataTable.addColumn('number', 'Values');
				// A column for custom tooltip content
				dataTable.addColumn({type: 'string', role: 'tooltip', 'p': {'html': true}});
				dataTable.addRows([
					['MON',  130, ' '],
					['TUE',  130, '130'],
					['WED',  180, '180'],
					['THU',  175, '175'],
					['FRI',  200, '200'],
					['SAT',  170, '170'],
					['SUN',  250, '250'],
					['MON',  220, '220'],
					['TUE',  220, ' ']
				]);

				var options = {
					height: 314,
					legend: 'none',
					areaOpacity: 0.18,
					axisTitlesPosition: 'out',
					hAxis: {
						title: '',
						textStyle: {
							color: '#fff',
							fontName: 'Proxima Nova',
							fontSize: 11,
							bold: true,
							italic: false
						},
						textPosition: 'out'
					},
					vAxis: {
						minValue: 0,
						textPosition: 'out',
						textStyle: {
							color: '#fff',
							fontName: 'Proxima Nova',
							fontSize: 11,
							bold: true,
							italic: false
						},
						baselineColor: '#16b4fc',
						ticks: [0,25,50,75,100,125,150,175,200,225,250,275,300,325,350],
						gridlines: {
							color: '#1ba0fc',
							count: 15
						}
					},
					lineWidth: 2,
					colors: ['#fff'],
					curveType: 'function',
					pointSize: 5,
					pointShapeType: 'circle',
					pointFillColor: '#f00',
					backgroundColor: {
						fill: '#008ffb',
						strokeWidth: 0,
					},
					chartArea:{
						left:0,
						top:0,
						width:'100%',
						height:'100%'
					},
					fontSize: 11,
					fontName: 'Proxima Nova',
					tooltip: {
						trigger: 'selection',
						isHtml: true
					}
				};

				var chart = new google.visualization.AreaChart(document.getElementById('chart_div'));
				chart.draw(dataTable, options);
			}
			$(window).resize(function(){
				drawChart();
				setTimeout(function(){
				}, 1000);
			});
		});
</script>
<?php $this->end(); ?>