<?php

namespace App\Http\Controllers;
use VerumConsilium\Browsershot\Facades\PDF;

use App\User;
use http\Env\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Solarium\Client;
// Add to your controller to get all metatags data
use Metatags;
use Illuminate\Support\Facades\Storage;

use Spatie\Browsershot\Browsershot;

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

    public function textanalysis()
    {
        try {
            $text = 'You can customize which type of tokenizer to tokenize with by WWWith passing in the name of the tokenizer class';
//            $tokens = tokenize($text);
            $tokens = tokenize($text, \TextAnalysis\Tokenizers\PennTreeBankTokenizer::class);
            $normalizedTokens = normalize_tokens($tokens);
            $freqDist = freq_dist(tokenize($text));
            $trigrams = ngrams($tokens,3, '|');

            $bigrams = ngrams($tokens);
            $stemmedTokens = stem($tokens);

            $rake = rake($tokens, 3);
            $results = $rake->getKeywordScores();
            $sentimentScores = vader($tokens);
//            $nb->predict(tokenize('my favorite food is a burrito'));

dd($sentimentScores);

        }catch (\Exception $e){
            dd($e->getMessage());
        }


    }
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function generate(Request $request)
    {
        $url= $request->input('pdf_url','https://google.com');
        $width = 1300;
        $height = 2500;
        $format = 'A4';
        $landscape = 'false';
        Browsershot::url($url)
            ->setRemoteInstance('192.168.0.103', 3111)
            ->noSandBox()
            ->landscape($landscape)
            ->format($format)
            ->setOption('emulateMedia', 'screen')
            ->margins(5, 5, 5, 5)
            //for javascript loading
            ->setDelay(2000)
            ->save(storage_path("a.pdf"));
        return response(file_get_contents(storage_path("a.pdf")), 200)
            ->header('Content-Type', 'application/pdf');
    }

    public function screenshotPdf()
    {

//        $domain = 'https://nextwavedeals.com';
//        $today=date('Y-m-d');
//        $directory='public/pdfs/';
//        $extension='.txt';
//        $test ='Testdir';
//
//        $base_path=$directory.$today.'/'.$test.'/';
//        if(!Storage::disk('local')->has($base_path)){
//            Storage::disk('local')
//                ->makeDirectory($base_path, 0775, true);
//        }
//        $name="screenshot";
//        $full_path=$base_path;
//        echo $full_path;

//        dd( public_path());
        $domain = 'https://www.google.com';
//        $domain = 'https://nextwavedeals.com';
        $today=date('Y-m-d');
        $directory='public/pdfs/';
        $extension='.txt';
        $base_path=$directory.$today.'/'.$domain.'/';
        if(!Storage::disk('local')->has($base_path)){
            Storage::disk('local')
                ->makeDirectory($base_path, 0775, true);
        }
        $name="screenshot";
        $full_path=$base_path.$name.$extension;

//        dd($targetPath);


       // $pathToImage = public_path("/__Uploads/__Screenshot/") . "screenshot.png";

        //Storage::disk('local')->put($full_path, 'Test content');
        //dd('ssss');
        //Browsershot::url($domain)->save($pathToImage)->setNodeBinary('/usr/bin/node')->setNpmBinary('/usr/bin/npm');

        //try {
            //                Browsershot::url('https://www.google.com/')->save('example.pdf');
//            $echo = Browsershot::html('Foo');
               // ->setNodeBinary('/usr/local/bin/node')
               // ->setNpmBinary('/usr/local/bin/npm');

//            dd($echo);


            $test = Browsershot::url($domain)
               // ->setNodeModulePath("/var/www/laravel7/node_modules/")
                //->setNodeBinary('/usr/local/bin/node')
                // ->setNpmBinary('/usr/local/bin/npm')
//            ->setIncludePath('$PATH:/usr/local/bin')
//            ->setNodeBinary('/home/laradock/.nvm/versions/node/v15.14.0/bin/node')
//            ->setNpmBinary('/home/laradock/.nvm/versions/node/v15.14.0/bin/npm')
                ->save($full_path);

//      $test =   Browsershot::html('Foo')
//            ->setIncludePath('$PATH:/usr/local/bin');

            dd($test);

        //}catch (\Exception $e){
           // dd($e->getMessage());
       // }


        dd('ss');

        $pathToImage =

        $test = Browsershot::url('https://www.google.com/')
//            ->setNodeBinary('/usr/local/bin/node')
//            ->setNpmBinary('/usr/local/bin/npm')
            ->save('example.pdf');

        dd($test);
        dd('test');

     /*  $test =  Browsershot::html('Foo')
            ->setNodeBinary('/usr/local/bin/node')
            ->setNpmBinary('/usr/local/bin/npm');

        dd($test);*/

        Browsershot::url('https://www.google.com')
            ->setNodeBinary('/usr/bin/node')
            ->setNpmBinary('/usr/bin/npm')
            ->bodyHtml();
        dd('s');

//
//        Browsershot::url('https://www.google.com/')
//            ->setNodeBinary('/usr/bin/node')
//            ->setNpmBinary('/usr/bin/npm')
//            ->bodyHtml();
//        dd('ss');
//        Browsershot::url('https://www.google.com/')->save('example.pdf');
//
//
//        dd('ss');
//        $pdfStoredPath = PDF::loadUrl('https://google.com')
//            ->storeAs('pdfs/', 'google.pdf');
//        dd('ss');
        PDF::loadHtml('<h1>Awesome PDF</h1>')
            ->download('myawesomepdf.pdf', [
                'Authorization' => 'token'
            ]);

        dd('Test');
    }
    public function index()
    {
        $url = 'https://yotpo.com/go/3Qq25utf';

        $client = new \GuzzleHttp\Client();
        $response = $client->get($url);

// Extract the body from the response data
        $content =$response->getBody()->getContents();
 /*       $tags = get_meta_tags($content);


        dd($tags);
// Extract meta tags from the body
        $tags = get_meta_tags($content);
        dd($tags);
        // Web page URL
        $url = 'https://www.codexworld.com/';

// Extract HTML using curl
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);

        $data = curl_exec($ch);
        curl_close($ch);

// Load HTML to DOM object
        $dom = new DOMDocument();
        @$dom->loadHTML($data);

// Parse DOM to get Title data
        $nodes = $dom->getElementsByTagName('title');
        $title = $nodes->item(0)->nodeValue;

// Parse DOM to get meta data
        $metas = $dom->getElementsByTagName('meta');

        $description = $keywords = '';
        for($i=0; $i<$metas->length; $i++){
            $meta = $metas->item($i);

            if($meta->getAttribute('name') == 'description'){
                $description = $meta->getAttribute('content');
            }

            if($meta->getAttribute('name') == 'keywords'){
                $keywords = $meta->getAttribute('content');
            }
        }

        echo "Title: $title". '<br/>';
        echo "Description: $description". '<br/>';
        echo "Keywords: $keywords";

        dd('dd');*/
//        $metadata = Metatags::get("https://example.com/");
//
//        print_r($metadata);

        $web = new \spekulatius\phpscraper();

        /**
         * Navigate to the test page. It contains:
         *
         * <meta name="author" content="Lorem ipsum" />
         * <meta name="keywords" content="Lorem,ipsum,dolor" />
         * <meta name="description" content="Lorem ipsum dolor etc." />
         * <meta name="image" content="https://test-pages.phpscraper.de/assets/cat.jpg" />
         */
//        $web->go('https://test-pages.phpscraper.de/meta/lorem-ipsum.html');
//        $web->go('https://yotpo.com/go/3Qq25utf');
        $web->setContent('', $content);

        dd($web->openGraph);
        dd($web->metaTags);
        dd($web->keywords);
        dd($web->twitterCard);
// Get the information:
//        echo $web->author;          // "Lorem ipsum"
//        echo $web->description;     // "Lorem ipsum dolor etc."
//        echo $web->image;           // "https://test-pages.phpscraper.de/assets/cat.jpg"


        dd('sss');

       return  response()->json(User::find(1));
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
