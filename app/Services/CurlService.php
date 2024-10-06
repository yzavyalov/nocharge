<?php

namespace App\Services;

class CurlService
{
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


}
