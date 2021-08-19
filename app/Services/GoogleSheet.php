<?php

namespace App\Services;

use Exception;
use Google_Client;
use Google\Service\Sheets;
use Illuminate\Support\Collection;

class GoogleSheet
{

    public function getClient()
    {
        $client = new Google_Client();
        $client->setApplicationName('Google Sheets API Testing');
        $client->setScopes(Sheets::SPREADSHEETS_READONLY);
        $client->setAuthConfig(storage_path('credentials.json'));
        $client->setAccessType('offline');
        $client->setPrompt('select_account consent');

        // Load previously authorized token from a file, if it exists.
        // The file token.json stores the user's access and refresh tokens, and is
        // created automatically when the authorization flow completes for the first
        // time.
        return $client;
    }

    public function read($spreadSheetId, $sheetName)
    {
        $client = $this->getClient();
        $service = new Sheets($client);

        $range = $sheetName;
        $response = $service->spreadsheets_values->get($spreadSheetId, $range);
        $items = $response->getValues();

        return $items;
    }
    public function collection($spreadSheetId, $sheetName)
    {
        $items = $this->read($spreadSheetId, $sheetName);

        $collection = Collection::make($items)->map(function ($item, $key) use ($items) {
            if ($key > 0) {
                $row = Collection::make($item);

                return Collection::make($items[0])->combine($row);
            }
        });

        $collection->shift();

        return $collection;
    }
}
