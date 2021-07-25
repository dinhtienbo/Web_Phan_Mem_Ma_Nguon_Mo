
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
	<base href="<?=  base_url() ?>">
    <title><?= $title ?></title>
    <!--CSS -->
	<?=$css ?>
	<!--/CSS -->
</head><!--/head-->

<body>
	<!--header -->
	<?= $header ?>
	<!--/header-->
	
	<!--Slide -->
	<?= $slide ?>
	<!--/Slide -->
	
	<section>
		<div class="container">
			<div class="row">
				<!--Left Menu -->
				<?= $leftMenu ?>
				<!--/Left Menu -->
				
				<!--Content -->
				<?= $content?>
				<!--/Content -->
			</div>
		</div>
	</section>
	
	<!--Footer -->
	<?=$footer ?>
	<!--/Footer -->
	
    <!--JS -->
	<?= $js ?>
	<!--/JS -->
</body>
</html>