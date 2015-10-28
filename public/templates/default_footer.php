<!-- deklarace JS -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
<script src="<?= ROOT ?>js/default.js" type="text/javascript"></script>
<?php
    foreach($this->js_files as $js)
        {
            echo '<script src="'.ROOT.'js/'.$js.'.css" type="text/javascript"></script>'."\n";
        }
?>
</body>
</html>
