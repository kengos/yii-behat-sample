<?php

return array_merge(
	require(dirname(__FILE__) . DIRECTORY_SEPARATOR . 'main.php'),
	array_merge(
		'components'=>array(
			'fixture'=>array(
				'class'=>'system.test.CDbFixtureManager',
			),
		),
		require(dirname(__FILE__) . DIRECTORY_SEPARATOR . 'db-test.php'),
	)
);
