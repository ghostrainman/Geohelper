<?
CModule::AddAutoloadClasses(
    'intaro.geohelper',
    array(
        'Geohelper\ApiClient'                      => 'lib/ApiClient.php',
        'Geohelper\Http\Client'                    => 'lib/Http/Client.php',
        'Geohelper\Response\ApiResponse'           => 'lib/Response/ApiResponse.php',
        'Geohelper\Exception\InvalidJsonException' => 'lib/Exeption/InvalidJsonException.php',
        'Geohelper\Exception\CurlException'        => 'lib/Exeption/CurlException.php',
    )
);