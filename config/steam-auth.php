<?php

return [

    /*
     * Redirect URL after login
     */
    'redirect_url' => '/auth/steam/handle',
    /*
     * Realm override. Bypass domain ban by Valve. 
     * Use alternative domain with redirection to main for authentication (banned by valve).
     */
    // 'realm' => 'redirected.com',
    /*
     *  API Key (set in .env file) [http://steamcommunity.com/dev/apikey]
     */
    'api_key' => env('STEAM_API_KEY', 'B1FFABDFB4DEC8C8010ACAF5A9051075'),
    /*
     * Is using https?
     */
    'https' => false,
];