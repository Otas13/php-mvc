<!DOCTYPE html>
<html lang="cs">
<head>
	<meta charset="utf-8">

	<title><?= $this->title; ?></title>

    <!-- Bootstrap -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="<?= ROOT ?>css/bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <link href="<?= ROOT ?>css/bootstrap/css/styles.css" rel="stylesheet">
        <script src="<?= ROOT ?>css/bootstrap/js/bootstrap.js"></script>

    <!-- Defaultni styl -->
        <link rel="stylesheet" type="text/css" href="<?= ROOT ?>css/default.css">

    <!-- nacteni vsech kodem zadanych stylu -->
	<?php
        foreach($this->css_files as $css)
        {
            echo '<link rel="stylesheet" type="text/css" href="'.ROOT.'css/'.$css.'.css">'."\n";
        }
    ?>
</head>
<body>
<div class="container">
<?php echo "\n"; ?>
