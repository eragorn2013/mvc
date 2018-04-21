<?php 

require_once './application/config/config_system.php';
require_once './application/core/Model.php';
require_once './application/core/Controller.php';
require_once './application/core/View.php';
require_once './application/core/Route.php';
require_once './application/core/User.php';
require_once './application/core/Data.php';
require_once './vendor/autoload.php';

route::run();