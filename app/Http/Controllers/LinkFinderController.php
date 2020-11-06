<?php

namespace App\Http\Controllers;

use App\CommonFunctions\LinkFinderCommonFunction;
use App\LinkFinder;
use Illuminate\Http\Request;

class LinkFinderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
//    public function getCdxResults(Request $request)
//    {
//        $request->validate([
//            'search_link' => 'required|regex:/^(https?:\/\/)?([\da-z\.-]+)\.([a-z\.]{2,6})([\/\w \.-]*)*\/?$/',
//        ]);
//
//        $link_finder = new LinkFinderCommonFunction($request->search_link);
//        $urls_collection = $link_finder->getCdxApiData();
//        $chunk_urls = $urls_collection->chunk(100);
////        dd($chunk_url);
//
//        return view('linkfinder',compact('chunk_urls'));
//    }

    public function index()
    {
        $urls_collection  = LinkFinder::paginate(5);


        return view('linkfinder.index', compact('urls_collection'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\LinkFinder  $linkFinder
     * @return \Illuminate\Http\Response
     */
    public function show(LinkFinder $linkFinder)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\LinkFinder  $linkFinder
     * @return \Illuminate\Http\Response
     */
    public function edit(LinkFinder $linkFinder)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\LinkFinder  $linkFinder
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, LinkFinder $linkFinder)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\LinkFinder  $linkFinder
     * @return \Illuminate\Http\Response
     */
    public function destroy(LinkFinder $linkFinder)
    {
        //
    }
}
