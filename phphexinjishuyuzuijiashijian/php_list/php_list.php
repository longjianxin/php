<?php
$br = (php_sapi_name() == "cli")? "":"<br>";

if(!extension_loaded('php_list')) {
	dl('php_list.' . PHP_SHLIB_SUFFIX);
}
$module = 'php_list';
$functions = get_extension_funcs($module);
echo "Functions available in the 面试题 extension:$br\n";
foreach($functions as $func) {
    echo $func."$br\n";
}
echo "$br\n";
$function = 'confirm_' . $module . '_compiled';
if (extension_loaded($module)) {
	$str = $function($module);
} else {
	$str = "Module $module is not compiled into PHP";
}
echo "$str\n";
?>
