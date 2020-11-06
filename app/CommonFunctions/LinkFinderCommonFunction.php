<?php

namespace App\CommonFunctions;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;


class LinkFinderCommonFunction extends CommonFunction
{
    public $data = [];
    public $url;
    public function __construct($url)
    {
        $this->url = $url;
    }

    public function getCdxApiData()
    {
        try{
            $client = new Client();
            $result = $client->get('http://web.archive.org/cdx/search/cdx?url=*.'.$this->url.'/*&output=json&fl=original&collapse=urlkey&pageSize=50&page=1');

            $this->data =Collection::make( json_decode($result->getBody()) );
            $this->data->shift();
            return $this->data;

        }catch (\Exception $e){
            return Collection::make([]);
        }
    }

}
