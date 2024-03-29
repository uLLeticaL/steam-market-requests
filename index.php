<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Steam's Market Bulk Demo</title>

    <!-- Bootstrap framework -->
    <link rel="stylesheet" href="/res/cosmo/css/bootstrap.min.css" />
    <link rel="stylesheet" href="/res/bootstrap/css/bootstrap-responsive.min.css" />
    <!-- tooltips-->
    <link rel="stylesheet" href="/res/lib/qtip2/jquery.qtip.min.css" />
    <!-- main styles -->
    <link rel="stylesheet" href="/res/css/style.css" />

    <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=PT+Sans" />

    <!--[if lte IE 8]>
        <link rel="stylesheet" href="css/ie.css" />
        <script src="js/ie/html5.js"></script>
                    <script src="js/ie/respond.min.js"></script>
    <![endif]-->
    
    <style>
        /** Fix scroll bar <3 **/
        .antiscroll-inner{width:256px !important;}
    </style>
    
  </head>
  <body>
    <div id="maincontainer" class="clearfix">
      <!-- header -->
      <header>
        <div class="navbar navbar-fixed-top">
          <div class="navbar-inner">
            <div class="container-fluid" style="margin-top:5px;">
              <a class="brand" style="width:250px;" href="/">Steam's Market Bulk Demo</a>
              <ul class="nav user_menu pull-right">
                <li class="dropdown">
                  <a href="https://github.com/pgrimaud/steam-market-requests" class="dropdown-toggle">GitHub</a>
                  <ul class="dropdown-menu">
                    <li><a href="/index/logout">Déconnexion</a></li>
                  </ul>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </header>
			
			<!-- main content -->
			<div id="contentwrapper">
				<div class="main_content">

					<div class="alert alert-warning">
						Request is actually "trading card" on Steam's Market. <input id="get-data" type="button" value="You can re-fetch data" class="btn btn-inverse" /><img src="/res/img/ajax-loader.gif" id="loader" style="display:none;margin-left:10px;"/><span id="rows" style="color:black;margin-left:10px;margin-top:2px;"></span>
					</div>
					
					<div class="row-fluid">
						<div class="span12" id="loaddata">
						</div>
					</div>
				</div>
			</div>
			
      <script src="/res/js/jquery.min.js"></script>
      <script src="/res/js/jquery-migrate.min.js"></script>
      <!-- smart resize event -->
      <script src="/res/js/jquery.debouncedresize.min.js"></script>
      <!-- hidden elements width/height -->
      <script src="/res/js/jquery.actual.min.js"></script>
      <!-- js cookie plugin -->
      <script src="/res/js/jquery_cookie.min.js"></script>
      <!-- main bootstrap js -->
      <script src="/res/bootstrap/js/bootstrap.min.js"></script>
      <!-- bootstrap plugins -->
      <script src="/res/js/bootstrap.plugins.min.js"></script>
      <!-- tooltips -->
      <script src="/res/lib/qtip2/jquery.qtip.min.js"></script>
      <!-- fix for ios orientation change -->
      <script src="/res/js/ios-orientationchange-fix.js"></script>
      <!-- scrollbar -->
      <script src="/res/lib/antiscroll/antiscroll.js"></script>
      <script src="/res/lib/antiscroll/jquery-mousewheel.js"></script>
      <!-- mobile nav -->
      <script src="/res/js/selectNav.js"></script>
      <!-- common functions -->
      <script src="/res/js/gebo_common.js"></script>
			<!-- datatables -->
			<script src="/res/lib/datatables/jquery.dataTables.min.js"></script>
			<script src="/res/lib/datatables/jquery.dataTables.bootstrap.min.js"></script>
    
			<script>
				function loadTable(){
					$.get('/script/loadjson.php', function(data) {
						$('#loaddata').html(data);
						$('#data').dataTable({
                "sDom": "<'row'<'span6'<'dt_actions'>l><'span6'f>r>t<'row'<'span6'i><'span6'p>>",
								"iDisplayLength": 100,
                "sPaginationType": "bootstrap_alt",
                "oLanguage": {
                    "sLengthMenu": "_MENU_ records per page"
                }
            });
					});
				}
				$(window).load(function(){
					loadTable();
				});
				$('#get-data').click(function(){
					$('#loader').show();
					$.post('/script/request.php',
					function(data){
						$('#rows').html('Fetching '+data+' rows, It can take more than 5 minutes.');
						$.post('/script/createjson.php',{rows:data},
						function(data){
							$('#loader').hide();
							$('#rows').html('Data fetched!');
							loadTable();
						});
					});
				});
			</script>
			
    </div>
  </body>
</html>