<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\Api\DataResource;
use App\Repositories\DataRepository;
use Illuminate\Http\Request;
use GuzzleHttp\Client;

class DataController extends Controller
{
    private $data;

    public function __construct(DataRepository $dataRepository)
    {
        $this->data = $dataRepository;
    }
    public function index(Request $r)
    {
        return $this->data->getHotelsData($r->all());
//        $client = new Client([
//            'headers' => [
//                'Cache-Control' => 'cache',
//            ]
//        ]);
//        $res = $client->get('http://affiliatefeed.agoda.com/datafeeds/feed/getfeed?apikey=59e095c9-82fc-4f24-8a7a-ae2e41bbfe5c&mcity_id=23028&olanguage_id=40&feed_id=5');
//        $response = $res->getBody()->getContents();
//        $responseXml = json_encode(simplexml_load_string($response));
//        $hotels = json_decode($responseXml)->{'hotels'};
//        return DataResource::collection((array)$hotels->hotel);
    }
}
