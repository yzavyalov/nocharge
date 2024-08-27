<?php

namespace App\Services;

class CatalogService
{
    public function create($link)
    {
        $linkData = IframeService::getData($link);

        dd($linkData);
    }
}
