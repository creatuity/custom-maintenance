<?php

require_once 'processor.php';
require_once 'creatuity_processor.php';
require_once 'countdown_processor.php';

$processor = new Creatuity_Countdown_Processor();
$processor->processCountdownData();


