<?php

// # Get Multiple Addresses Balance Sample
// This method allows you to
// retrieve balance of multiple addresses at once.
// API called: '/v1/btc/main/addrs/1J38WorKqMin9g5jqUfngZLJvA7TQUBZNE;1JP8F...'

require __DIR__ . '/../bootstrap.php';

// The following code takes you through
// the process of retrieving balance of multiple Addresses at once.

/// ### Retrieve Multiple Addresses Balance
// (See bootstrap.php for more on `ApiContext`)
try {

    // List of addresses. You can use height or hash and mix them in the same request
    $addressList = Array(
        '1J38WorKngZLJvA7qMin9g5jqUfTQUBZNE',
        '1JP8FqoXtCMrR1sZc2McLWmHxENox1Y1PV',
        '1ENn7XmqXNnReiQEFHhBGzfiv5gAyBj7r1'
    );

    $addressesBalance = \BlockCypher\Api\AddressBalance::getMultiple($addressList, array(), $apiContexts['BTC.main']);
} catch (Exception $ex) {
    ResultPrinter::printError("Get Multiple Addresses Balance", "Addresses Balance", implode(",", $addressList), null, $ex);
    exit(1);
}

ResultPrinter::printResult("Get Multiple Addresses Balance", "Addresses Balance", implode(",", $addressList), null, $addressesBalance);

return $addressesBalance;