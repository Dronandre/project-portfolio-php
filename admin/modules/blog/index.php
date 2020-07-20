<?php

ob_start();
include ROOT . "admin/templates/blog/index.tpl";
$content = ob_get_contents();
ob_end_clean();

include ROOT . 'admin/templates/template.tpl';