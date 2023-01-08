<?php

namespace Sk1t0n\HandlingGoogleApiInPhp\Application\Sheets;

use \GuzzleHttp\Client as GuzzleClient;
use Sk1t0n\HandlingGoogleApiInPhp\Entities\Spreadsheet;

class GoogleServiceSheets
{    
    /** @var Spreadsheet */
    private $spreadsheet;

    /** @var \Google_Client */
    private $client;

    /** @var \Google_Service_Sheets */
    private $service;

    public function __construct(Spreadsheet $spreadsheet)
    {
        $this->spreadsheet = $spreadsheet;

        $this->client = new \Google_Client();
        $this->disableSSLVerify();
        $this->setupGoogleClient();

        $this->service = new \Google_Service_Sheets($this->client);
    }

    private function disableSSLVerify()
    {
        $guzzleClient = new GuzzleClient(['verify' => false]);
        $this->client->setHttpClient($guzzleClient);
    }

    private function setupGoogleClient()
    {
        $this->client->setApplicationName('Google Sheets API');
        $this->client->setScopes([\Google_Service_Sheets::SPREADSHEETS]);
        $this->client->setAccessType('offline');

        $credentials = 'config' . DIRECTORY_SEPARATOR . 'credentials.json';
        $this->client->setAuthConfig($credentials);
    }

    /**
     * Reads the range of cells from the sheet.
     * 
     * <code>
     * <?php
     * // Fetch All the Rows of a Sheet
     * $range1 = 'Sheet1';
     * // Fetch a Few Rows by Using a Range
     * $range2 = 'Sheet1!A1:F10';
     * // Fetch Only Cells of a Given Column
     * $range3 = 'Sheet1!B1:B21';
     * ?>
     * </code>
     * 
     * @param string $range the range of cells whose values you want to get
     * @return array[]
     */
    public function readSheet(string $range): array
    {
        $spreadsheetId = $this->spreadsheet->getSpreadsheetId();
        /** @var \Google_Service_Sheets_ValueRange */
        $response = $this->service->spreadsheets_values->get($spreadsheetId, $range);
        return $response->getValues();
    }

    /**
     * Adds rows to the end of the sheet.
     * 
     * @param array[] $rows
     * @return void
     */
    public function addRows(array $rows)
    {
        $spreadsheetId = $this->spreadsheet->getSpreadsheetId();
        $range = $this->spreadsheet->getSheetId();
        $valueRange = new \Google_Service_Sheets_ValueRange();
        $valueRange->setValues($rows);
        $options = ['valueInputOption' => 'USER_ENTERED'];
        $this->service->spreadsheets_values->append($spreadsheetId, $range, $valueRange, $options);
    }
}
