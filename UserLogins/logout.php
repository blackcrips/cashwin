<?php

require_once('./inc/autoLoadClassesLogin.inc.php');
$logout = new AgentsController();
$logout->logout();

header("location: login.php");
