<?php
spl_autoload_register(function($class) {
	$class = ltrim($class, '\\');
	if (strpos($class, 'OAuth\\OAuth2\\Service') === 0) {
		$nsparts   = explode('\\', $class);
		$class     = array_pop($nsparts);
		$nsparts[] = '';
		$path      = __DIR__ . DIRECTORY_SEPARATOR . implode(DIRECTORY_SEPARATOR, $nsparts);
		$path     .= str_replace('_', DIRECTORY_SEPARATOR, $class) . '.php';
		if (file_exists($path)) {
			require $path;
			return true;
		}
	}
	return false;
});
