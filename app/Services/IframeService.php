<?php

namespace App\Services;


use Composer\Cache;
use DiDom\Document;
use Embed\Embed;
use Embera\Embera;
use Essence\Essence;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;


class IframeService
{
    public static function fourhundredfour($url): bool
    {
        $url_headers = @get_headers($url);

        if (!$url_headers || (strpos($url_headers[0], '404')) || (strpos($url_headers[0], '403'))) {
            return true;
        } else {
            return false;
        }
    }

    public static function checkingwayimage($url, $imageway){
        if (str_contains($imageway, 'http')) {   //проверяем src
            $image = $imageway;
        } else {
            $path = parse_url($url);
            if (str_starts_with($imageway, '/')) {
                $site = $path['scheme'] . '://' . $path['host'];

                $image = $site . $imageway;
            } else {
                $image = $url.$imageway;
            }
        }
        return $image;
    }


    public static function backgroundImage($document, $url)
    {
        $css = $document->first('link'); //ищем файл стиля, чтобы вытянуть картинку из бекграунда находим первый link
//    dd($css);
        if (isset($css)) {
            $cssway = $css->attributes(['href']); //берем его путь
            $style = self::checkingwayimage($url,$cssway[array_key_first($cssway)]);

            if (str_contains($style, '.css')) {
                if (self::fourhundredfour($style)) {
                    $image = '';//если не находим, то отдаем $image пустым
                } else {
                    $style = file_get_contents($style); //забираем его и вытягиваем бэкграунд картинку
                    $match = array();
                    preg_match('/background-image:\s*url\((.*?)\)/i', $style, $match);
                    if ($match) {
                        $image = $match[1];
                        if (self::fourhundredfour($image)) {
                            $image = ''; //если ссылки нет, то отдаем пустую картинку
                        } else {
                            $image = $image;
                        }
                    } else {
                        $image = '';
                    }
                }
            } else {
                $image = '';
            }
        }else{
            $image = '';
        }
        return $image;
    }

    public static function parcingImage($html, $url)
    {
        $document = new Document();

        $document->loadHtml($html);

        $docImage = $document->first('img');  //ищем картинку

        if (!$docImage) {
            $image = self::backgroundImage($document, $url); //если не нашли,то ищем бэкграунд картинку
        } else {
            $way = $docImage->attributes(['src']);
            if (str_contains($way['src'], 'http')) {   //проверяем src
                $image = $way['src'];
            } else {
                $path = parse_url($url);
                if (str_starts_with($way['src'], '/')) {
                    $site = $path['scheme'] . '://' . $path['host'];

                    $image = $site . $way['src'];
                } else {
                    $image = $url . $way['src'];
                }
            }
            $checkImage = self::fourhundredfour($image);

            if ($checkImage) {
                $image = self::backgroundImage($document, $url);
            }
        }
        return $image;
    }


    public static function oembedly($url)
    {
        $embed = new Embed();

        $ifr_data = $embed->get($url);

        $ifr_data_embed = $ifr_data->getOEmbed();

        $dataLink = $ifr_data_embed->all();

        $document = $ifr_data->getDocument();

        $html = (string)$document; //достаем html страницу

        $data['url'] = $url;

        isset($dataLink['type']) ? $data['type'] = $dataLink['type'] : $data['type'] = "";

        isset($dataLink['version']) ? $data['version'] = $dataLink['version'] : $data['version'] = "";

        isset($dataLink['title']) ? $data['title'] = $dataLink['title'] : $data['title'] = $ifr_data->title;

        isset($dataLink['author_name']) ? $data['author'] = $dataLink['author_name'] :

            $data['author'] = $ifr_data->authorName;

        isset($dataLink['author_url']) ? $data['author_url'] = $dataLink['author_url'] :

            $data['author_url'] = $ifr_data->authorUrl;

        isset($dataLink['provider_name']) ? $data['provider_name'] = $dataLink['provider_name'] :

            $data['provider_name'] = $ifr_data->providerName;

        $image = $ifr_data->image;  //достаем картинку через Embed
        if ($image) {
            $image = $image->getScheme() . '://' . $image->getHost() . $image->getPath(); //если картинка есть, то собираем к ней путь
        } else {
            $image = self::parcingImage($html, $url); //парсим картинку
        }


        if (isset($dataLink['thumbnail_url'])) {
            $data['thumbnail_url'] = $dataLink['thumbnail_url'];
        } else {
            $data['thumbnail_url'] = $image;
        }

        isset($dataLink['thumbnail_width']) ? $data['thumbnail_width'] = $dataLink['thumbnail_width'] :

            $data['thumbnail_width'] = "";

        isset($dataLink['thumbnail_height']) ? $data['thumbnail_height'] = $dataLink['thumbnail_height'] :

            $data['thumbnail_height'] = "";

        $data['description'] = $ifr_data->description;

        $data['keywords'] = $ifr_data->keywords;

        $data['language'] = $ifr_data->language;

        if (isset($dataLink['html'])) {
            $data['html'] = $dataLink['html'];
        } elseif (isset($ifr_data->code->html)) {
            $data['html'] = $ifr_data->code->html;
        } else {
            $data['html'] = '';
        }

        $data['cache_age'] = $ifr_data->publishedTime;

        $data['options'] = '';

        return $data;
    }

    public static function getTenor($query)
    {
        $tenorKey = env('TENOR_API_KEY');

        // dd($query);
        $limit = $query->get('limit');
        $pos = $query->get('pos');
        $searchString = $query->get('searchString');

        $response = Http::get('https://tenor.googleapis.com/v2/search', [
            'q' => $searchString,
            'key' => $tenorKey,
            'limit' => $limit,
            'media_filter' => 'tinygif,gifpreview',
            'pos' => $pos
        ]);

        if ($response->successful()) {
            return $response->json();
        } else {
            return null;
        }

    }

    public static function searchVideos($query)
    {
        $apiKey = env('YOUTUBE_API_KEY');

        $response = Http::get('https://www.googleapis.com/youtube/v3/search', [
            'part' => 'snippet',
            'q' => $query->get('query'),
            'key' => $apiKey,
            'maxResults' => 6,
            'fields' => 'nextPageToken,prevPageToken,pageInfo,items(id/videoId,snippet/title,snippet/description,snippet/thumbnails/high/url)',
            'type' => 'video', // (optional) video, channel, playlist
            'pageToken' => $query->get('pageToken')
        ]);

        if ($response->successful()) {
            return $response->json();
        }
        else if ($response->status() == 403) {
            return 'The limit of requests per day has been expired';
        }
        else {
            return null;
        }

    }

    public static function searchPhotos($query)
    {
        $apiKey = env('PEXELS_API_KEY');

        $response = Http::withHeaders([
            'Authorization' => $apiKey
        ])->get('https://api.pexels.com/v1/search', [
            'query' => $query->get('query'),
            'page' => $query->get('page'),
            'per_page' => 6
        ]);

        if ($response->successful()) {
            return $response->json();
        } else {
            return null;
        }
    }

    public static function getfacebookpost($url)
    {
        $response = "https://graph.facebook.com/v10.0/oembed_post?url=" . $url . "&access_token=" . config('app.facebooktoken');

        $data = json_encode(Http::get($response)->json());

        return json_decode($data);

    }

    public static function getfacebookpage($url)
    {
        $response = "https://graph.facebook.com/v10.0/oembed_page?url=" . $url . "&access_token=" . config('app.facebooktoken');

        $data = json_encode(Http::get($response)->json());

        return json_decode($data);
    }

    public static function getfacebookvideo($url)
    {
        $response = "https://graph.facebook.com/v10.0/oembed_video?url=" . $url . "&access_token=" . config('app.facebooktoken');

        $data = json_encode(Http::get($response)->json());

        return json_decode($data);

    }


    public static function getinsta($url)
    {
        $response = "https://graph.facebook.com/v10.0/instagram_oembed?url=" . $url . "&access_token=" . config('app.facebooktoken');

        $data = json_encode(Http::get($response)->json());

        $data = json_decode($data);
        if (isset($data->error)) {
            $data = self::oembedly($url);
        }

        $data = (array)$data;

        $data['url'] = $url;

        return $data;
    }


    public static function facebookoembed($url)
    {
        $parseUrl = parse_url($url);

        if (str_starts_with($parseUrl['path'], '/watch') || str_starts_with($parseUrl['path'], '/real')) {
            $parameter = 'video';
        } elseif (str_starts_with($parseUrl['path'], '/groups') || str_starts_with($parseUrl['path'], '/profile')) {
            $parameter = 'page';
        } else {
            $parameter = 'post';
        }
        switch ($parameter) {
            case "page":

                $fbData = self::getfacebookpage($url);

                if (isset($fbData->error)) {

                    $fbData = self::getfacebookpost($url);

                    if (isset($fbData->error)) {
                        $fbData = self::getfacebookvideo($url);

                        if (isset($fbData->error)) {
                            $fbData = self::oembedly($url);
                        }
                    }
                }
                break;

            case "post":

                $fbData = self::getfacebookpost($url);

                if (isset($fbData->error)) {
                    $fbData = self::getfacebookpage($url);

                    if (isset($fbData->error)) {
                        $fbData = self::getfacebookvideo($url);

                        if (isset($fbData->error)) {
                            $fbData = self::oembedly($url);
                        }
                    }
                }
                break;
            case "video":
                $fbData = self::getfacebookvideo($url);

                if (isset($fbData->error)) {
                    $fbData = self::getfacebookpost($url);

                    if (isset($fbData->error)) {
                        $fbData = self::getfacebookpage($url);

                        if (isset($fbData->error)) {
                            $fbData = self::oembedly($url);
                        }
                    }
                }
                break;
        }

        $data = (array)$fbData;

        $data['url'] = $url;

        return $data;
    }

    public static function gettwitter($url)
    {
        $response = "https://publish.twitter.com/oembed?url=" . $url;

        $data = json_encode(Http::get($response)->json());

        $data = json_decode($data);

        return (array)$data;
    }

    public static function getamazon($url)
    {
        $embed = new Embed();

        $ifr_data = $embed->get($url);

        $document = $ifr_data->getDocument();

        $html = (string)$document; //достаем html страницу

        $image = $document->select('//img');  //ищем картинки

        $arrImage = $image->strAll('id'); //определяем ид картинки в массиве

        $idImage = array_search('landingImage', $arrImage);

        $allImageSrc = $image->strAll('src');

        $image = $allImageSrc[$idImage]; //путь к картинке товара с амазон

        $title = $document->getDocument()->getElementsByTagName('title')->item(0)->nodeValue; //получаем заголовок

        $meta = $document->select('//meta');

        $metaDescription = $meta->strAll('content');

        !isset($metaDescription[7]) ? $description = '' : $description = $metaDescription[7]; //описание

        $data['url'] = $url;

        $data['type'] = 'image';

        $data['title'] = $title;

        $data['provider_name'] = 'Amazon';

        $data['thumbnail_url'] = $image;

        $data['description'] = $description;

        return $data;
    }

    public static function getwiki($url)
    {
        $embed = new Embed();

        $ifr_data = $embed->get($url);

        $document = $ifr_data->getDocument();

        $image = $document->select('//img');

        $imageSrc = $image->strAll('src');

        $image = $imageSrc[1]; //картинка

        $title = $document->getDocument()->getElementById('firstHeading')->firstChild->nodeValue; //получаем заголовок

        $description = $document->getDocument()->getElementsByTagName('p')->item(1)->nodeValue; //получаем описание

        $data['url'] = $url;

        $data['type'] = 'image';

        $data['title'] = $title;

        $data['provider_name'] = 'Wikipedia';

        $data['thumbnail_url'] = $image;

        $data['description'] = $description;

        return $data;
    }

    public static function giphyombed($url)
    {
        $data = self::oembedly($url);

        $data['html'] = '';

        return $data;
    }

    public static function getpinterest($url){
        $embera = new Embera();
        $document = $embera->getUrlData($url);
        $data = $document;
        $data = Arr::collapse($data);
        $data['url'] = $url;
        return $data;
    }


    public static function essence($url)
    {
        $Essence = new Essence();
        $Media = $Essence->extract($url);
        $data = $Media;
        return $data;
    }

    public static function curlGetPage($url, $referer = 'https://www.google.com/')
    {
        $headers = array(
            'cache-control: no-cache',
            'upgrade-insecure-requests: 1',
            'user-agent: Mozilla/5.0 (Linux; Android 6.0; Nexus 5 Build/MRA58N) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/110.0.0.0 Mobile Safari/537.36',
            'sec-fetch-user: ?1',
            'accept: text/html,application/xhtml+xml,application/xml;q=0.9,image/avif,image/webp,image/apng,*/*;q=0.8,application/signed-exchange;v=b3;q=0.7',
            'x-compress: null',
            'sec-fetch-site: none',
            'sec-fetch-mode: navigate',
//      'accept-encoding: gzip, deflate, br',
            'accept-language: ru-RU,ru;q=0.9,en-US;q=0.8,en;q=0.7,uk;q=0.6',
            'cookie: CTK=1gqtbjhs2k7qt800; CSRF=erAB9xt7WB2Gk0wfb1ymCjlE46pkCGlq; INDEED_CSRF_TOKEN=bJZr54t0MSQEorOBlChigNEapoTWsu1p; LV="LA=1678169983:CV=1678169983:TS=1678169983"; UD="LA=1678169983:CV=1678169983:TS=1678169983"; SURF=XNaEsRiSrtaMa6A07FloiGrHQu209PiH; OptanonAlertBoxClosed=2023-03-07T06:35:07.230Z; indeed_rcc=LV:UD:CTK; CMP_VISITED=1; _gcl_au=1.1.1251733153.1678170926; PTK=tk=1gqtd4t9fjtvj800&type=jobsearch&subtype=topsearch; cmp-jobsCta=hidden; cmppmeta="eNoBUACv//p0MD6cD+JXa4BugU7tr9cBb3oTjFWSDA6MJFTJf0+maqmkVC+FGeZG1jt3fbpYRHhly31tKxoTIn9534ch9aqAzVaXY/LziJTOILbE9fvMxh8ncg=="; SHARED_INDEED_CSRF_TOKEN=bJZr54t0MSQEorOBlChigNEapoTWsu1p; RF=wKGgxUwMHWV1aKM-FTjqiMrjRY8zAroFxocW7SGr9uJASaKa98Jda29TEymDVLcsmEvuK92ca2Dtd5yKNhNcUHYP856TWt_5E3AVILU9PRm77h3A5msAlNWcRMp927do; _ga=GA1.2.1944132806.1678203897; SESSION_START_TIME=1678203874177; SESSION_ID=1gqubtqs1k7bq800; SESSION_END_TIME=1678203874178; JSESSIONID=28808AD7003FACEAED852DAF4E487D97; ac=US9KAL54Ee2anltuN4nm5Q#UTBbcL54Ee2anltuN4nm5Q; gonetap=closed; indeed_rcc="cmppmeta:LV"; OptanonConsent=isGpcEnabled=0&datestamp=Thu+Mar+09+2023+14:50:39+GMT+0200+(Восточная+Европа,+стандартное+время)&version=202210.1.0&isIABGlobal=false&hosts=&consentId=8c517561-2b19-4192-a22f-125482bb61bc&interactionCount=2&landingPath=NotLandingPage&groups=C0001:1,C0002:0,C0003:0,C0004:0,C0007:0&geolocation=;&AwaitingReconsent=false; bvcmpgn=ro-indeed-com; _cfuvid=XOzG0DzqtB9SyiAkw52psaeOXIX1_ESrAP07AF7rgFI-1678433052206-0-604800000; __cf_bm=ijlRusQMrxhlOqkuIlewUIoSOp5bHETZzooGreaOX8c-1678436885-0-AVJLzJ600AHn5P4no4moAwy8D0kPietfzBvstf3pijEXfqd1p2EoqGMaDBmKPMTERENLDG1FFd7VddFqHTWLT0M='
        );


        $ch = curl_init();

        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt($ch, CURLOPT_REFERER, $referer);
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_TIMEOUT, 15);

        $response = curl_exec($ch);


        return $response;
    }


    public static function metaparser($url)
    {
        $html = self::curlGetPage($url);
        $data = array();
        if (stripos($html, 'meta name')) {
            preg_match_all('/<meta\s[^>]*>/', $html, $matches);    //'/<meta(.*?)">/'
//      dd($matches, $html);
            foreach ($matches[0] as $match) {
                if (stripos($match, 'og:title')) {
                    preg_match('/content="(.[^"]*)/', $match, $cont);
                    $data['title'] = $cont[1];
                }
                if (stripos($match, 'og:description')) {
                    preg_match('/content="(.[^"]*)/', $match, $cont);
                    $data['description'] = $cont[1];
                }
                if (stripos($match, 'og:image"')) {
                    preg_match('/content="(.[^"]*)/', $match, $cont);
                    $data['thumbnail_url'] = $cont[1];
                }
                if (stripos($match, 'og:site_name')) {
                    preg_match('/content="(.[^"]*)/', $match, $cont);
                    $data['provider'] = $cont[1];
                }
                if (stripos($match, 'keywords')) {
                    preg_match('/content="(.[^"]*)/', $match, $cont);
                    $data['keywords'] = $cont[1];
                }
            }
            $data ?: $data = IframeService::oembedly($url);
//      dd($data);
        }
        return $data;
    }

    public static function metas($url)
    {
        $embed = new Embed();
        $info = $embed->get($url);
        $metas = $info->getMetas();
        if ($metas->get('og:image') == null){
            $data = IframeService::metaparser($url);
            $serv = 1;
        }else{
            isset($metas->get('og:title')[0]) ? $data['title'] = $metas->get('og:title')[0] : $data['title'] = '';
            isset($metas->get('og:description')[0]) ? $data['description'] = $metas->get('og:description')[0] : $data['description'] = '';
            isset($metas->get('og:image')[0]) ? $data['thumbnail_url'] = $metas->get('og:image')[0] : $data['thumbnail_url'] = '';
            isset($metas->get('og:site_name')[0]) ? $data['provider_name'] = $metas->get('og:site_name')[0] : $data['provider_name'] = '';
            isset($metas->get('og:keywords')[0]) ? $data['keywords'] = $metas->get('og:keywords')[0] : $data['keywords'] = '';
            $serv = 2;
        }
//      dd($serv, $data);
        return $data;
    }


    public static function selectmethod($key, $url)
    {

        return match ($key) {

            'fb', 'facebook' => self::facebookoembed($url),

            'instagram' => self::getinsta($url),

            'youtube' => self::oembedly($url),

            'twitter' => self::gettwitter($url),

            'amazon' => self::getamazon($url),

            'wikipedia' => self::getwiki($url),

            'giphy' => self::giphyombed($url),

            'pinterest' => self::getpinterest($url),

            default => null,
        };

    }

    public static function getProviders(): array
    {
        return [
            'facebook' => 'facebookoembed',
            'fb' => 'facebookoembed',
            'instagram' => 'getinsta',
            'youtube' => 'oembedly',
            'twitter' => 'gettwitter',
            'amazon' => 'getamazon',
            'wikipedia' => 'getwiki',
            'giphy' => 'giphyombed',
            'pinterest' => 'getpinterest',
        ];
    }


    public static function linkimage($url)
    {
        $data['thumbnail_url'] = $url;

        return $data;
    }


    public static function selectImage($url)
    {
        $allowedExtensions = ['.jpg', '.png', '.jpeg', '.ico', '.gif', '.tiff', '.eps', '.svg', '.webp'];

        foreach ($allowedExtensions as $extension)
        {
            if (str_ends_with($url, $extension))
            {
                return true;
            }
        }

        return false;
    }



    public static function embera($url){
        $embera = new Embera();
        $document = $embera->getUrlData($url);
        $data = $document;
        return $data;
    }

    public static function allimagesfromsite($url){
        $dom = new Embed();
        $dom->get($url)->getDocument();

// Create a new DOMXPath object and use it to query for all <img> elements
        $imageurls = $dom->get($url)->getDocument()->select('//img')->strAll('src');
        $images = array();
        foreach ($imageurls as $image){
            $images[] = self::checkingwayimage($url,$image);
        }
        return $images;
    }

    public static function  allimagescurl($url){
        $html = self::curlGetPage($url);
        preg_match_all('/<img.*?src="(.*?)".*?>/i', $html, $matches);
        $imageurls = $matches[1];
        $images = array();
        foreach ($imageurls as $image){
            $images[] = self::checkingwayimage($url,$image);
        }
        return $images;
    }




    public static function dataresponse($url){
        $oembed = self::oembedly($url);
        $metas = self::metas($url);
        $data = $oembed;
        if ($oembed['thumbnail_url'] && $oembed['thumbnail_url'] != '')
        {
            $data['thumbnail_url'] = $oembed['thumbnail_url'];
        }
        elseif (isset($metas['thumbnail_url']) && $metas['thumbnail_url'] != '')
        {
            $data['thumbnail_url'] = $metas['thumbnail_url'];
        }
        else
            $data['thumbnail_url'] = '';

        if($data['thumbnail_url'] !== '')
        {
            if (self::fourhundredfour($data['thumbnail_url'])) $data['thumbnail_url'] = '';
        }
        if (isset($oembed['title']))
        {
            $data['title'] = $oembed['title'];
        }
        elseif (isset($metas['title']))
        {
            $data['title'] = $metas['title'];
        }
        else
        {
            $data['title'] = '';
        }
//      isset($oembed['title']) ? $data['title'] = $oembed['title'] : $data['title'] = $metas['title'];
        if (isset($oembed['description']))
        {
            $data['description'] = $oembed['description'];
        }
        elseif (isset($metas['description']))
        {
            $data['description'] = $metas['description'];
        }
        else
        {
            $data['description'] = '';
        }
//      isset($oembed['description']) ? $data['description'] = $oembed['description'] : $data['description'] = $metas['description'];
        isset($oembed['provider_name']) ? $data['provider_name'] = $oembed['provider_name'] : $data['provider_name'] = $metas['provider_name'];
        isset($oembed['keywords']) ? $data['keywords'] = $oembed['keywords'] : $data['keywords'] = $metas['keywords'];
        $imagesfirst = self::allimagesfromsite($url);
        $imagessecond = self::allimagescurl($url);
        $images = array_merge($imagesfirst,$imagessecond);
        $images = array_unique($images,SORT_STRING);
        $data['images'] = $images;

        return $data;
    }


    public static function getData($url): array
    {
        if (self::selectimage($url)) {
            $data = self::linkimage($url);
        } else {
            $keys = array_keys(self::getProviders());

            $parseUrl = parse_url($url);

            foreach ($keys as $key) {
                !Str::contains($parseUrl['host'], $key) ?: $data = IframeService::selectmethod($key, $url);  //Подбираем метод по ссылке
            }

            isset($data) ?: $data = IframeService::dataresponse($url);
        }

        return $data;
    }
}
