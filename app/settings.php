<?php

$settings= [];

$settings['displayErrorDetails'] = true;

// data base
$settings['db'] = [];
$settings['db']['host'] = $config['database']['host'];
$settings['db']['port'] = $config['database']['port'];
$settings['db']['user'] = $config['database']['login'];
$settings['db']['pass'] = $config['database']['password'];
$settings['db']['name'] = $config['database']['db_name'];

