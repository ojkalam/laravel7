<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Solarium\Client;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    protected $client;

    public function __construct(\Solarium\Client $client)
    {
//        $this->middleware('auth');
        $this->client = $client;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }
    public function notificationTest()
    {
        //notification testing

        return view('notification');
    }

    public function solr()
    {

        // get a select query instance
        $select = array(
            'query'         => '*:*',
            'start'         => 0,
            'rows'          => 1000,
            'fields'        => array('PK_Product','Site_Root','title','product_type'),
            'sort'          => array('PK_Product' => 'desc'),
            'filterquery' => array(
                'alexa_rank' => array(
                    'query' => 'alexa_rank:[1 TO 200000]'
                ),
            ),
        );

        $query = $this->client->createSelect($select);

// apply settings using the API
//        $query->setQuery('*:*');
//        $query->setStart(10)->setRows(20);
//        $query->setFields(array('title','body_html'));

// create a filterquery using the API

// create a facet field instance and set options using the API
        $resultset = $this->client->execute($query);
        return $resultset->getData();
        dd();
        // get a select query instance
        $query = $this->client->createQuery($this->client::QUERY_SELECT);

// this executes the query and returns the result
        $resultset = $this->client->execute($query);
        return $resultset->getData();
die;

        // create a ping query
        $ping = $this->client->createPing();

        // execute the ping query
        try {
            $res = $this->client->ping($ping);
            return $res->getData();
            dd();
            return response()->json($res);
        } catch (\Solarium\Exception $e) {
            return response()->json('ERROR', 500);
        }
    }


}
