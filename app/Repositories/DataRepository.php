<?php

namespace App\Repositories;

use App\Http\Resources\Api\DataResource;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Cache;

class DataRepository
{
    public function getHotelsData(array $data)
    {
        empty($data['language']) ? $key = 'ar' : $key = $data['language'];
        $client = new Client([
            'headers' => [
                'Cache-Control' => 'cache',
            ]
        ]);
        $res = $client->get('http://affiliatefeed.agoda.com/datafeeds/feed/getfeed?apikey=59e095c9-82fc-4f24-8a7a-ae2e41bbfe5c&mcity_id=23028&olanguage_id=40&feed_id=5&language='.$key);
        $response = $res->getBody()->getContents();
        $responseXml = json_encode(simplexml_load_string($response));
        $hotels = json_decode($responseXml)->{'hotels'};
        Cache::put('hotels_api',DataResource::collection((array)$hotels->hotel));
        return response()->json(DataResource::collection((array)$hotels->hotel),200);
    }
}
