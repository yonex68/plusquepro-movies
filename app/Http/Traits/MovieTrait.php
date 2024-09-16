<?php

namespace App\Http\Traits;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

trait MovieTrait {

    /**
     * Retrieve JSON response of TMDB API
     */
    public function callTMDBendpoint($endpoint) {
        $response = Http::withHeaders([
            'Authorization' => 'Bearer '.config('app.tmdb.api_key'),
            'accept' => 'application/json'
        ])->get(config('app.tmdb.base_url').$endpoint);

        return $response->object();
    }
}
