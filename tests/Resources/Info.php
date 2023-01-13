<?php

use Anaf\Responses\Info\GetResponse;

test('get', function () {
    $client = mockClient('POST', 'PlatitorTvaRest/api/v7/ws/tva', [], getAnafInfo());

    $result = $client->info()->get();

    expect($result)
        ->toBeInstanceOf(GetResponse::class);

    expect($result->generalData->companyName)
        ->toBe('ANDALI SOLUTIONS PRO S.R.L.');
});
