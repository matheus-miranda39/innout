<?php
session_start();
requireValidSection();

$date = (new DateTime())->getTimestamp();
$today = strftime('%d de %B de %Y', $date);

loadTemplateView('day_records', ['today' => $today]);