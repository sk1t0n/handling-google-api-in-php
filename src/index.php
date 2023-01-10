<?php

namespace Sk1t0n\HandlingGoogleApiInPhp;

use \Dotenv\Dotenv;
use Sk1t0n\HandlingGoogleApiInPhp\Entities\Spreadsheet;
use Sk1t0n\HandlingGoogleApiInPhp\UseCases\Sheets\GoogleServiceSheets;

require_once dirname(__DIR__) . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'autoload.php';

$dotenv = Dotenv::createUnsafeImmutable(dirname(__DIR__));
$dotenv->load();

$spreadsheetId = getenv('SPREADSHEET_ID');
$sheetId = getenv('SHEET_ID');

$spreadsheet = new Spreadsheet($spreadsheetId, $sheetId);
$service = new GoogleServiceSheets($spreadsheet);

// read
$range = $sheetId;
var_dump($service->readSheet($range));

// write
$newRow = [
    'New post ' . time(),
    'New post ...'
];
$rows = [$newRow];
$service->addRows($rows);
