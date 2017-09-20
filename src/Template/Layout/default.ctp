<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">


    <!-- Page title -->
    <title>BAGTRACE</title>

    <!-- Vendor styles -->
    <link rel="stylesheet" href="/themes/startui/css/lib/lobipanel/lobipanel.min.css"/>
    <link rel="stylesheet" href="/themes/startui/css/separate/vendor/lobipanel.min.css"/>
    <link rel="stylesheet" href="/themes/startui/css/lib/jqueryui/jquery-ui.min.css"/>
    <link rel="stylesheet" href="/themes/startui/css/lib/font-awesome/font-awesome.min.css"/>
    <link rel="stylesheet" href="/themes/startui/css/lib/bootstrap/bootstrap.min.css"/>
    <link rel="stylesheet" href="/themes/startui/css/separate/vendor/select2.min.css"/>
    <link rel="stylesheet" href="/themes/startui/css/lib/bootstrap-sweetalert/sweetalert.css"/>

	<!-- App styles -->
    <link href='/themes/startui/css/main.css' rel='stylesheet' type='text/css'>

    <!-- <link rel="stylesheet" href="/themes/startui/css/main.css"> -->
    <style>

   	 .dataTables_filter { display: none; }
     .mptltoppad10{ padding-top: 10px; }
     .mptltoppad8{ padding-top: 8px; }
     .mptlmargintop48{ margin-top:48px; }

    </style>
</head>
<body class="with-side-menu theme-qa" >

<!-- Wrapper-->
<!-- <div class="wrapper"> -->
<?php if($this->request->params['action']!="edit"){ ?>
    <!-- Header-->
    <header class="site-header">
      <?= $this->element('/themes/startui/header'); ?>
    </header>
    <!-- End header-->

    <!-- Navigation-->
    <?= $this->element('/themes/startui/asidemenu'); ?>
    <!-- End navigation-->


    <!-- Main content-->
    <div class="page-content">
		<!-- include flash here if it is not the index....For index,included in indexbasic-->		
		<?php if($this->request->params['action']!="index"){ ?>

			<?php echo $this->Flash->render(); ?>
			<?php echo $this->Flash->render('auth'); ?>

		<?php } ?>
<?php } ?>		
		<?= $this->fetch('content') ?>

    </div>
    <!-- End main content-->


<!-- Vendor scripts -->
<!-- <script src="/themes/startui/vendor/pacejs/pace.min.js"></script> -->
<script src="/themes/startui/js/lib/jquery/jquery.min.js"></script>
<script src="/themes/startui/js/lib/tether/tether.min.js"></script>
<script src="/themes/startui/js/lib/bootstrap/bootstrap.min.js"></script>
<!-- <script src="/themes/startui/js/lib/datatables-net/datatables.min.js"></script> -->
<script src="/themes/startui/js/lib/select2/select2.js"></script>
<script src="/themes/startui/js/plugins.js"></script>

<script src="/themes/startui/js/lib/jqueryui/jquery-ui.min.js"></script>
<script src="/themes/startui/js/lib/lobipanel/lobipanel.min.js"></script>
<script src="/themes/startui/js/lib/match-height/jquery.matchHeight.min.js"></script>

<script src="/themes/startui/js/lib/bootstrap-sweetalert/sweetalert.min.js"></script>
<!-- App scripts -->




 <?= $this->fetch('scriptBottom') ?>
 
 <script src="/themes/startui/js/app.js"></script>
 
<script type="text/javascript">
$(document).ready(function(){
	// highlight menu if particular controller loaded
	var a = $('a[href="/<?php echo $this->request->params['controller'] ?>"]');
	if (!a.parent().hasClass('opened')){ a.parent().addClass('opened'); }
 	if (!a.find('.font-icon').hasClass('active')){ a.find('.font-icon').addClass('active'); }
 	//disable elements in view
 	var actionname = '<?php echo $this->request->params['action'] ?>';
	if(actionname=="view"){ $("input").prop('disabled', true);$("select").prop('disabled', true); }
});
function sweet_alert(titl,msg, callback_success, callback_cancel) {
    var d = swal(titl,msg);
    return d;
}
function sweet_confirmdelete(titl,msg, callback_success, callback_cancel) {
  var d = swal({
  		title: titl,
  		text: msg,
  		type: "error",
  		showCancelButton: true,
  		confirmButtonColor: "#d33928",
  		confirmButtonText: "Yes, delete it!",
  		closeOnConfirm: true
	},
	function(){
  		callback_success();
	});
    return d;
}
</script>
</body>

</html>
