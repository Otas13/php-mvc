<!DOCTYPE html>
<html lang="cs">
<head>
	<meta charset="utf-8">
	<title><?= $this->title; ?></title>
    <link rel="stylesheet" type="text/css" href="<?= ROOT ?>css/default.css">
	<?php
        foreach($this->css_files as $css)
        {
            echo '<link rel="stylesheet" type="text/css" href="'.ROOT.'css/'.$css.'.css">'."\n";
        }
    ?>
</head>
<body>
<?php echo "\n"; ?>
