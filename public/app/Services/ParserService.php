<?php

namespace App\Services;

use DiDom\Document;
use Embed\Embed;

class ParserService
{
    public static function metaparser($url)
    {
        $html = CurlService::curlGetPage($url);
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
            $data ?: $data = self::oembedly($url);
        }
        return $data;
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

}
