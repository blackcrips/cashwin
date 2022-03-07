<?php

require_once('./autoLoadIncClasses.inc.php');

$clientsController = new ClientsController();
$clientsController->addClient();
$clientsView = new ClientsView();
