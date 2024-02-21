<?php namespace Config;
use CodeIgniter\Events\Events;
Events::on('pre_system', function () {
	if (ENVIRONMENT !== 'testing')
	{
		while (\ob_get_level() > 0)
		{
			\ob_end_flush();
		}

		\ob_start(function ($buffer) {
			return $buffer;
		});
	}

	/*
	 * --------------------------------------------------------------------
	 * Debug Toolbar Listeners.
	 * --------------------------------------------------------------------
	 * If you delete, they will no longer be collected.
	 */
	if (ENVIRONMENT !== 'production')
	{
		Events::on('DBQuery', 'CodeIgniter\Debug\Toolbar\Collectors\Database::collect');
		Services::toolbar()->respond();
	}
});
