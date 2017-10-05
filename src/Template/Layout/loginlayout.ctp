<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Page title -->
    <title>BAGTRACE</title>
    <!-- Vendor styles -->
    <link rel="stylesheet" href="/themes/startui/css/separate/pages/login.min.css">
    <link rel="stylesheet" href="/themes/startui/css/lib/bootstrap/bootstrap.min.css"/>
    <link href='/themes/startui/css/main.css' rel='stylesheet' type='text/css'>
</head>
<body class="login-page" >

<div class="page-center">
 	<div class="page-center-in">
		<div class="container-fluid">
			<?= $this->fetch('content') ?>
	 	</div>
	</div>
</div>
<script src="/themes/startui/js/lib/jquery/jquery.min.js"></script>
<script src="/themes/startui/js/lib/match-height/jquery.matchHeight.min.js"></script>
<script>
        $(function() {
            $('.page-center').matchHeight({
                target: $('html')
            });

            $(window).resize(function(){
                setTimeout(function(){
                    $('.page-center').matchHeight({ remove: true });
                    $('.page-center').matchHeight({
                        target: $('html')
                    });
                },100);
            });
        });
</script>
</body>
</html>
