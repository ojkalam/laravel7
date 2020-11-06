@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card" id="app">

                <section class="content-header">
                    <div class="container-fluid">
                        <div class="row mb-2">
                            <div class="col-sm-6">
                                <h3>Links</h3>
                            </div>
                        </div>
                    </div>
                </section>

                <example-component></example-component>

            {{--    <section class="content">
                    <div class="container-fluid">
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <div class="card card-primary card-outline">
                            <div class="card-header">
                                <div class="row">
                                    <div class="col-12">
                                        <form id="search_link_form" action="{{ route('linkfinder.store') }}" method="post" >
                                            @csrf
                                            <div class="form-group form-inline">
                                                <input type="text" name="search_link" class="form-control w-50" placeholder="Search Links ie: keepa.com">

                                                <button type="submit" id="search_links" class="btn btn-default"> <i class="fa fa-search ml-2 mr-1"></i> Search</button>
                                                <i class="fa fa-star-o ml-2 mr-1"></i> Save
                                                <select class="form-control ml-2 action-border">
                                                    <option value="save">Save</option>
                                                    <option value="save">Delete</option>
                                                    <option value="parameters">Parameters</option>
                                                </select>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body learn-scss">
                                @if(isset($urls_collection))
                                    @if(count($urls_collection) > 0)
                                        <p class="form-control w-50">Filter Result :</p>
                                        <table class="table">
                                            <thead>
                                            <td>Save</td>
                                            <td>Links</td>
                                            <td>Data</td>
                                            </thead>
                                            <tbody>
--}}{{--                                            {{dd($urls_collection->currentPage()) }}--}}{{--
                                            @foreach($urls_collection as $urls)
                                                    <tr>
                                                        <td><i class="fa fa-star"></i> </td>
                                                        <td><a href="{{ $urls->url }}" target="_blank"> {{ $urls->url }} </a></td>
                                                        <td> {{ $urls->url_data }} </td>
                                                    </tr>
                                            @endforeach

                                            {{ $urls_collection->links() }}

                                            </tbody>
                                        </table>
                                    @else
                                        <p class="form-control w-50 text-center text-red">No Results found !</p>
                                    @endif
                                @endif
                            </div>
                        </div>
                    </div>
                </section>--}}


            </div>
        </div>
    </div>
</div>
@endsection



