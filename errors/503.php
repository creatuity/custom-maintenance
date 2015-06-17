<?php

require_once dirname(__DIR__) .'/errors/processor.php';
require_once 'creatuity_processor.php';
require_once 'countdown_processor.php';

$processor = new Creatuity_Processor();
$processor->process503();

