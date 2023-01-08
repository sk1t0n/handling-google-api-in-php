<?php

namespace Sk1t0n\HandlingGoogleApiInPhp\Entities;

class Spreadsheet
{
    /** @var string */
    private $spreadsheetId;

    /** @var string */
    private $sheetId;

    public function __construct(string $spreadsheetId, string $sheetId)
    {
        $this->spreadsheetId = $spreadsheetId;
        $this->sheetId = $sheetId;
    }

    public function getSpreadsheetId(): string
    {
        return $this->spreadsheetId;
    }

    public function setSpreadsheetId(string $spreadsheetId)
    {
        $this->spreadsheetId = $spreadsheetId;
    }

    public function getSheetId(): string
    {
        return $this->sheetId;
    }

    public function setSheetId(string $sheetId)
    {
        $this->sheetId = $sheetId;
    }
}
