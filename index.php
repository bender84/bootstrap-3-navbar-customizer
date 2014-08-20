<?php
function changeColor($hex, $amount) {
	$hex = str_replace("#", "", $hex);

	if(strlen($hex) == 3) {
		$r = hexdec(substr($hex,0,1).substr($hex,0,1));
		$g = hexdec(substr($hex,1,1).substr($hex,1,1));
		$b = hexdec(substr($hex,2,1).substr($hex,2,1));
	} else {
		$r = hexdec(substr($hex,0,2));
		$g = hexdec(substr($hex,2,2));
		$b = hexdec(substr($hex,4,2));
	}

	$rNew = ($r + $amount) >=0 ? ($r + $amount) : 0;
	$gNew = ($g + $amount) >=0 ? ($g + $amount) : 0;
	$bNew = ($b + $amount) >=0 ? ($b + $amount) : 0;

	$hexNew = "";
	$hexNew .= str_pad(dechex($rNew), 2, "0", STR_PAD_LEFT);
	$hexNew .= str_pad(dechex($gNew), 2, "0", STR_PAD_LEFT);
	$hexNew .= str_pad(dechex($bNew), 2, "0", STR_PAD_LEFT);

	return $hexNew;
}


$bootstrap='/* Bootstrap 3 navbar customizer: http://apps.rotten77.cz/b3nc/ */
.navbar-default {
	background-color: #%BG_COLOR%;
	border-color: #%BG_COLOR2%;
}
.navbar-default .navbar-nav>li>a,
.navbar-default .navbar-brand {
	color: #%TEXT_COLOR%;
}
.navbar-default .navbar-nav>.active>a,
.navbar-default .navbar-nav>.active>a:hover,
.navbar-default .navbar-nav>.active>a:focus,
.navbar-default .navbar-nav>li>a:hover,
.navbar-default .navbar-brand:hover {
	color: #%TEXT_COLOR%;
	background-color: #%BG_COLOR2%;
}
.navbar-default .navbar-toggle {
	border-color:#%TEXT_COLOR%;
}
.navbar-default .navbar-toggle .icon-bar {
	background:#%TEXT_COLOR%;
}

.navbar-default .navbar-toggle:hover,
.navbar-default .navbar-toggle:focus,
.navbar-default .navbar-nav>.open>a,
.navbar-default .navbar-nav>.open>a:hover,
.navbar-default .navbar-nav>.open>a:focus,
.navbar-nav>li>.dropdown-menu {
	background-color: #%BG_COLOR2%;
	color: #%TEXT_COLOR%;
}
.dropdown-menu .divider {
	background-color: #%BG_COLOR%;
}
.dropdown-menu>li>a {
	color: #%TEXT_COLOR%;
}
.dropdown-menu > li > a:hover,
.dropdown-menu > li > a:focus,
.dropdown-menu > .active > a,
.dropdown-menu > .active > a:hover,
.dropdown-menu > .active > a:focus {
	color: #%TEXT_COLOR%;
	background-color: #%BG_COLOR%;
}
@media (max-width: 767px) {
	.navbar-default .navbar-nav .open .dropdown-menu>li>a {
		color: #%TEXT_COLOR%;
		background-color: #%BG_COLOR%;
	}
	.navbar-default .navbar-nav .open .dropdown-menu>li>a:hover,
	.navbar-default .navbar-nav .open .dropdown-menu>li>a:active,
	.navbar-default .navbar-nav .open .dropdown-menu>.active>a,
	.navbar-default .navbar-nav .open .dropdown-menu>.active>a:hover,
	.navbar-default .navbar-nav .open .dropdown-menu>.active>a:focus {
		color: #%TEXT_COLOR%;
		background-color: #%BG_COLOR2%;
	}
}';


$CONTRAST = isset($_POST['CONTRAST']) ? intval($_POST['CONTRAST']) : 40;

$Y_PADDING = isset($_POST['Y_PADDING']) ? intval($_POST['Y_PADDING']) : 10;
$X_PADDING = isset($_POST['X_PADDING']) ? intval($_POST['X_PADDING']) : 15;
$FONT_SIZE = isset($_POST['FONT_SIZE']) ? intval($_POST['FONT_SIZE']) : 14;

if($FONT_SIZE<14) $FONT_SIZE = 14;
if($Y_PADDING<10) $Y_PADDING = 10;
if($X_PADDING<15) $X_PADDING = 15;

if($Y_PADDING>10 || $X_PADDING>15 || $FONT_SIZE>14) {

$bootstrap.='
@media (min-width: 768px) {
	.navbar-nav>li>a,.navbar>.container .navbar-brand, .navbar>.container-fluid .navbar-brand {
		height:auto;
		padding:%Y_PADDING_S%px %X_PADDING_S%px;
		font-size: %FONT_SIZE_S%px;
	}
}
@media (min-width: 992px) {
	.navbar-nav>li>a,.navbar>.container .navbar-brand, .navbar>.container-fluid .navbar-brand {
		padding:%Y_PADDING_M%px %X_PADDING_M%px;
		font-size: %FONT_SIZE_M%px;
	}
}
@media (min-width: 1199px) {
	.navbar-nav>li>a,.navbar>.container .navbar-brand, .navbar>.container-fluid .navbar-brand {
		padding:%Y_PADDING%px %X_PADDING%px;
		font-size: %FONT_SIZE%px;
	}
}';

// large
$bootstrap = str_replace("%Y_PADDING%", $Y_PADDING, $bootstrap);
$bootstrap = str_replace("%X_PADDING%", $X_PADDING, $bootstrap);
$bootstrap = str_replace("%FONT_SIZE%", $FONT_SIZE, $bootstrap);

// medium
$Y_PADDING_M = intval($Y_PADDING - (($Y_PADDING-10) / 3));
$X_PADDING_M = intval($X_PADDING - (($X_PADDING-15) / 3));
$FONT_SIZE_M = intval($FONT_SIZE - (($FONT_SIZE-14) / 3));
$bootstrap = str_replace("%Y_PADDING_M%", $Y_PADDING_M, $bootstrap);
$bootstrap = str_replace("%X_PADDING_M%", $X_PADDING_M, $bootstrap);
$bootstrap = str_replace("%FONT_SIZE_M%", $FONT_SIZE_M, $bootstrap);

// small
$Y_PADDING_S = intval($Y_PADDING - (($Y_PADDING-10) / 2));
$X_PADDING_S = intval($X_PADDING - (($X_PADDING-15) / 2));
$FONT_SIZE_S = intval($FONT_SIZE - (($FONT_SIZE-14) / 2));
$bootstrap = str_replace("%Y_PADDING_S%", $Y_PADDING_S, $bootstrap);
$bootstrap = str_replace("%X_PADDING_S%", $X_PADDING_S, $bootstrap);
$bootstrap = str_replace("%FONT_SIZE_S%", $FONT_SIZE_S, $bootstrap);

}


$TEXT_COLOR = isset($_POST['TEXT_COLOR']) ? $_POST['TEXT_COLOR'] : "ffffff";
$BG_COLOR = isset($_POST['BG_COLOR']) ? $_POST['BG_COLOR'] : "936bad";
$BG_COLOR2 = isset($_POST['BG_COLOR2']) ? $_POST['BG_COLOR2'] : "";
$BG_COLOR2_VAL = $BG_COLOR2;

if($BG_COLOR2=="") {
	$BG_COLOR2 = changeColor($BG_COLOR, -$CONTRAST);
	$BG_COLOR2_VAL = "";
}


$bootstrap = str_replace("%TEXT_COLOR%", $TEXT_COLOR, $bootstrap);
$bootstrap = str_replace("%BG_COLOR%", $BG_COLOR, $bootstrap);
$bootstrap = str_replace("%BG_COLOR2%", $BG_COLOR2, $bootstrap);

?><!DOCTYPE html>
<html lang="cs">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge" />
<meta name="viewport" content="width=device-width, initial-scale=1" />
<title>Bootstrap 3 navbar customizer</title>
	<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" />
	<meta name="description" content="Customize (colors, size) Bootstrap 3 navbar" />
<?php
	// Google Analytics tracking on my site
	if(preg_match("/rotten77/", $_SERVER['SERVER_NAME'])) include dirname(__FILE__) . "/../ga.html";
?>
<style>
body {
	padding-top:60px;
}
textarea {
	font-family: monospace;
}
.color-picker-wrap {
	width: 40px;
}
</style>
		<?php echo "<style>\n".$bootstrap."\n</style>"; ?>
</head>
<body>
<nav class="navbar navbar-default navbar-fixed-top" role="navigation" id="menu">
	<div class="container">
		<div class="navbar-header">
			<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#main-menu">
				<span class="sr-only">Toggle menu</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<a class="navbar-brand" href="#">Bootstrap 3</span></span></a>
	</div>
	
	<div class="collapse navbar-collapse" id="main-menu">
		<ul class="nav navbar-nav navbar-right">
			<li class="active"><a href="#">Menu 1</a></li>
			<li><a href="#">Menu 2</a></li>
			<li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown">Menu 3 <span class="caret"></span></a>
				<ul class="dropdown-menu" role="menu">
					<li><a href="#">Menu 3.1</a></li>
					<li class="active"><a href="#">menu 3.2</a></li>
					<li><a href="#">menu 3.4</a></li>
					<li class="divider"></li>
					<li><a href="#">Menu 3.5</a></li>
					<li class="divider"></li>
					<li><a href="#">Menu 3.6</a></li>
				</ul>
			</li>
			<li><a href="#">Menu 4</a></li>
		</ul>
	</div><!-- /.navbar-collapse -->
	</div><!-- /.container-fluid -->
</nav>

<div class="container">
	<div class="row">
		<div class="col-md-12">
			<h1>Bootstrap 3 navbar customizer</h1>
			<hr />
		</div>
	</div>
	<div class="row">
		<div class="col-md-6">
			<form role="form" class="form-horizontal" action="./" method="post">
				<div class="form-group">
					<label for="BG_COLOR" class="col-lg-2 control-label">Background color</label>
					
					<div class="col-lg-6">
						<div class="input-group">
							<span class="input-group-addon">#</span>
							<input type="text" class="form-control" name="BG_COLOR" id="BG_COLOR" value="<?php echo $BG_COLOR; ?>" placeholder="888888" />
								
							<span class="input-group-btn color-picker-wrap">
								<input type="color" data-target="BG_COLOR" class="color-picker form-control" />
							</span>
						</div>
					</div>
				</div>

				<div class="form-group">
					<label for="BG_COLOR2" class="col-lg-2 control-label">Border/active color</label>
					
					<div class="col-lg-6">
						<div class="input-group">
							<span class="input-group-addon">#</span>
							<input type="text" class="form-control" name="BG_COLOR2" id="BG_COLOR2" value="<?php echo $BG_COLOR2_VAL; ?>" placeholder="" />
								
							<span class="input-group-btn color-picker-wrap">
								<input type="color" data-target="BG_COLOR2" class="color-picker form-control" />
							</span>
						</div><br />
								<em>Leave it blank if you want apply &quot;Contrast&quot;</em>
					</div>
				</div>

				<div class="form-group">
					<label for="TEXT_COLOR" class="col-lg-2 control-label">Text color</label>
					
					<div class="col-lg-6">
						<div class="input-group">
							<span class="input-group-addon">#</span>
							<input type="text" class="form-control" name="TEXT_COLOR" id="TEXT_COLOR" value="<?php echo $TEXT_COLOR; ?>" placeholder="ffffff" />

							<span class="input-group-btn color-picker-wrap">
								<input type="color" data-target="TEXT_COLOR" class="color-picker form-control" />
							</span>
						</div>
					</div>
				</div>

				<div class="form-group">
					<label for="CONTRAST" class="col-lg-2 control-label">Contrast</label>
					
					<div class="col-lg-6">
						<select name="CONTRAST" id="CONTRAST" class="form-control">
							<option value="20"<?php if($CONTRAST==20) echo ' selected="selected"'; ?>>Soft</option>
							<option value="40"<?php if($CONTRAST==40) echo ' selected="selected"'; ?>>Medium</option>
							<option value="80"<?php if($CONTRAST==80) echo ' selected="selected"'; ?>>Hard</option>
						</select>
					</div>
				</div>


				<div class="form-group">
					<label for="FONT_SIZE" class="col-lg-2 control-label">Font size</label>
					
					<div class="col-lg-6">
						<input type="text" class="form-control" name="FONT_SIZE" id="FONT_SIZE" value="<?php echo $FONT_SIZE; ?>" placeholder="10" /><br />
						<em>In [px]</em>
					</div>
				</div>
				
				<div class="form-group">
					<label for="Y_PADDING" class="col-lg-2 control-label">Y Padding</label>
					
					<div class="col-lg-6">
						<input type="text" class="form-control" name="Y_PADDING" id="Y_PADDING" value="<?php echo $Y_PADDING; ?>" placeholder="10" /><br />
						<em>Top and bottom padding of text in menu items</em>
					</div>
				</div>

				<div class="form-group">
					<label for="X_PADDING" class="col-lg-2 control-label">X Padding</label>
					
					<div class="col-lg-6">
						<input type="text" class="form-control" name="X_PADDING" id="X_PADDING" value="<?php echo $X_PADDING; ?>" placeholder="15" /><br />
						<em>Space between menu items</em>
					</div>
				</div>

				<div class="form-group">
					<div class="col-lg-8 col-lg-offset-2">
						<button type="submit" class="btn btn-info">Submit</button>
					</div>
				</div>
				
				
			</form>
		</div>
		<div class="col-md-6">
			<p class="form">
				<textarea cols="20" rows="30" class="form-control"><?php echo $bootstrap; ?></textarea>
			</p>
		</div>
	</div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
<script>
$(function(){
	// Check if browser has support of input[type="color"]
	var i = document.createElement("input");
	i.setAttribute("type", "color");
	if(i.type == "text") $('.color-picker-wrap').hide();

	$('#BG_COLOR, #TEXT_COLOR, #BG_COLOR2').each(function(){
		$('input[data-target="'+$(this).attr("id")+'"]').val("#" + $(this).val());
	});

	$('.color-picker').change(function(){
		console.log($(this).val());
		$('#'+$(this).data("target")).val($(this).val().replace("#", ""));
	});
});
</script>
</body>
</html>