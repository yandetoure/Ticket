<?php
include "config.php";
$id = $_GET['id'];
$ticket->deleteTicket($id);