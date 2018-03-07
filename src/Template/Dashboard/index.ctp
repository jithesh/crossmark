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
	        	
	        	<!-- weekly -->
	            <div class="col-xl-6">
	                <div class="chart-statistic-box">
	                    <div class="chart-txt">
	                        <div class="chart-txt-top">
	                            <p><span class="number"><?php echo $dailybagscount ?></span></p>
	                            <p class="caption">Bags</p>
	                        </div>
	                        <table class="tbl-data">
	                            <tr>
	                                <td class="price color-yellow"><?php echo $dailybagsprocessedcount ?></td>
	                                <td>Bags Processed</td>
	                            </tr>
	                            <tr>
	                                <td class="price color-lime"><?php echo $dailybagsexitedcount ?></td>
	                                <td>Bags Exited</td>
	                            </tr>
	                        </table>
	                    </div>
	                    <div class="chart-container" style="height:314px;"> 
	                        <div class="chart-container-in" style="height:314px;">
	                        	
	                        	
	                        	<canvas id="dailychart" height="164px"></canvas>
	                            
	                        </div>
	                    </div>
	                </div><!--.chart-statistic-box-->
	            </div><!--.col-->
	            
	            
	            <div class="col-xl-6">
	               
	                <div class="row">
	                    <div class="col-sm-12">
	                        <article class="statistic-box green">
	                            <div>
	                                <div class="number"><?php echo $bagsprocessedcount ?></div>
	                                <div class="caption"><div>Bags processed</div></div>
	                                <div class="percent">
	                                    <div class="arrow up"></div>
	                                    <p>15%</p>
	                                </div>
	                            </div>
	                        </article>
	                    </div><!--.col-->        
	                </div><!--.row-->
	                
	                 <div class="row">
	                    <div class="col-sm-12">
	                        <article class="statistic-box red">
	                            <div>
	                                <div class="number"><?php echo $bagsexitedcount ?></div>
	                                <div class="caption"><div>Bags exited</div></div>
	                                <div class="percent">
	                                    <div class="arrow down"></div>
	                                    <p>11%</p>
	                                </div>
	                            </div>
	                        </article>
	                    </div><!--.col-->        
	                </div><!--.row-->
	                
	            </div><!--.col-->
	        </div><!--.row-->
	
	
	        <div class="row">
	        <!-- daily -->
	        <!-- weekly -->
	            <div class="col-xl-6">
	                <div class="chart-statistic-box">
	                    <div class="chart-txt">
	                        <div class="chart-txt-top">
	                            <p><span class="number"><?php echo $weeklybagscount ?></span></p>
	                            <p class="caption">Bags</p>
	                        </div>
	                        <table class="tbl-data">
	                            <tr>
	                                <td class="price color-yellow"><?php echo $weeklybagsprocessedcount ?></td>
	                                <td>Bags Processed</td>
	                            </tr>
	                            <tr>
	                                <td class="price color-lime"><?php echo $weeklybagsexitedcount ?></td>
	                                <td>Bags Exited</td>
	                            </tr>
	                        </table>
	                    </div>
	                    <div class="chart-container" style="height:314px;"> 
	                        <div class="chart-container-in" style="height:314px;">
	                        	
	                        	
	                        	<canvas id="weeklychart" height="164px"></canvas>
	                            
	                        </div>
	                    </div>
	                </div><!--.chart-statistic-box-->
	            </div><!--.col-->
	        	      
	        	
	        	
	          
	        	<!-- monthly -->
	            <div class="col-xl-6">
	                <div class="chart-statistic-box">
	                    <div class="chart-txt">
	                        <div class="chart-txt-top">
	                            <p><span class="number"><?php echo $monthlybagscount ?></span></p>
	                            <p class="caption">Bags</p>
	                        </div>
	                        <table class="tbl-data">
	                            <tr>
	                                <td class="price color-yellow"><?php echo $monthlybagsprocessedcount ?></td>
	                                <td>Bags Processed</td>
	                            </tr>
	                            <tr>
	                                <td class="price color-lime"><?php echo $monthlybagsexitedcount ?></td>
	                                <td>Bags Exited</td>
	                            </tr>
	                        </table>
	                    </div>
	                    <div class="chart-container" style="height:314px;"> 
	                        <div class="chart-container-in" style="height:314px;">
	                        	
	                        	
	                        	<canvas id="monthlychart" height="164px"></canvas>
	                        	
	                        </div>
	                    </div>
	                </div>
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


<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.min.js"></script>
<script>
var dchart = document.getElementById("dailychart").getContext('2d');
var monthlydata = [];
var data1 = [];
var data2 = [];
//ajax function to load daily data for plotting daily chart
$.ajax({
	type : 'get',
	url : '/Dashboard/getDailyChartData',
	success : function(response) {
    	// psnotify("BagTrace","Success.");
    	var data=JSON.parse(response);
    	data1=data['date'];
		data2=data['count'];
    	// console.log(data);
    	
    	var dailyChart = new Chart(dchart, {
    type: 'line',
    data: {
        labels: data1,
        datasets: [{
            label: 'Daily',
            data: data2,
            backgroundColor: [
                'rgba(253, 256, 256, 0.4)'
            ],
            borderColor: [
                'rgba(256,256,256,2)'
            ],
            borderWidth: 2.5,pointRadius:3
        }]
    },
    options: {
    	responsive: true, 
		maintainAspectRatio: false,
    	legend: {
    		display: false,           
        },
        layout: {
        padding: {
            left: 0,}},
        scales: {       	
            xAxes: [{
            	position: 'top',
            	gridLines: {
                	display: false,drawBorder: false,
                },
                ticks: {
                    beginAtZero:true,fontColor: "white",fontSize: 13,fontStyle: 'bold',
                }
            }],
            yAxes: [{
            	position: 'right',
            	gridLines: {
                	display: false,drawBorder: false,
              	},
                ticks: {
                    fontColor: "white",fontSize: 13,fontStyle: 'bold',
                }
            }]
        },
        
    }
});
	},
	error : function(e) {
		sweet_alert("BagTrace","An error occurred: " + e.responseText.message);
		// alert("An error occurred: " + e.responseText.message);
    	console.log(e);
	}
});
        


//weekly chart
var wchart = document.getElementById("weeklychart").getContext('2d');
var data3 = [];
var data4 = [];
//ajax function to load monthly data for plotting monthly chart
$.ajax({
	type : 'get',
	url : '/Dashboard/getWeeklyChartData',
	success : function(response) {
    	// psnotify("BagTrace","Success.");
    	var data=JSON.parse(response);
    	data3=data['date'];
		data4=data['count'];
    	// console.log(data);
    	
    	var weekChart = new Chart(wchart, {
    type: 'line',
    data: {
        labels: data3.reverse(),
        datasets: [{
            label: 'Weekly',
            data: data4.reverse(),
            backgroundColor: [
                'rgba(253, 256, 256, 0.4)'
            ],
            borderColor: [
                'rgba(256,256,256,2)'
            ],
            borderWidth: 2.5,pointRadius:3
        }]
    },
    options: {
    	responsive: true, 
		maintainAspectRatio: false,
    	legend: {
    		display: false,           
        },
        scales: {       	
            xAxes: [{
            	id:'xAxis1',
            	position: 'top',
				gridLines: {
                	display: false,drawBorder: false,
          		},
          		ticks:{fontColor: "white",fontSize: 13,fontStyle: 'bold',
            		callback:function(label){
              			var month = label.split(";")[0];
              			var year = label.split(";")[1];
              			return year;
            		}
          		}
        	},
        {
          id:'xAxis2',
          position: 'top',
          gridLines: {
                	display: false,drawBorder: false,
              	},
          ticks:{fontColor: "white",fontSize: 13,fontStyle: 'bold',
            callback:function(label){
              var month = label.split(";")[0];
              var year = label.split(";")[1];
                return month;
              
            }
          }
        }],
            yAxes: [{
            	position: 'right',
            	gridLines: {
                	display: false,drawBorder: false,
              	},
                ticks: {
                    fontColor: "white",fontSize: 13,fontStyle: 'bold',
                }
            }]
        },
        
    }
});
	},
	error : function(e) {
		sweet_alert("BagTrace","An error occurred: " + e.responseText.message);
		// alert("An error occurred: " + e.responseText.message);
    	console.log(e);
	}
});
        


//monthly chart
var mchart = document.getElementById("monthlychart").getContext('2d');
var data5 = [];
var data6 = [];
//ajax function to load monthly data for plotting monthly chart
$.ajax({
	type : 'get',
	url : '/Dashboard/getMonthlyChartData',
	success : function(response) {
    	// psnotify("BagTrace","Success.");
    	var data=JSON.parse(response);
    	data5=data['date'];
		data6=data['count'];
    	// console.log(data);
    	
    	var monthChart = new Chart(mchart, {
    type: 'line',
    data: {
        labels: data5.reverse(),
        datasets: [{
            label: 'Weekly',
            data: data6.reverse(),
            backgroundColor: [
                'rgba(253, 256, 256, 0.4)'
            ],
            borderColor: [
                'rgba(256,256,256,2)'
            ],
            borderWidth: 2.5,pointRadius:3
        }]
    },
    options: {
    	responsive: true, 
		maintainAspectRatio: false,
    	legend: {
    		display: false,           
        },
        scales: {       	
            xAxes: [{
            	position: 'top',
            	gridLines: {
                	display: false,drawBorder: false,
                },
                ticks: {
                    fontColor: "white",fontSize: 13,fontStyle: 'bold',
                }
            }],
            yAxes: [{
            	position: 'right',
            	gridLines: {
                	display: false,drawBorder: false,
              	},
                ticks: {
                    fontColor: "white",fontSize: 13,fontStyle: 'bold',
                }
            }]
        },
        
    }
});
	},
	error : function(e) {
		sweet_alert("BagTrace","An error occurred: " + e.responseText.message);
		// alert("An error occurred: " + e.responseText.message);
    	console.log(e);
	}
});
       

</script>
<?php $this->end(); ?>