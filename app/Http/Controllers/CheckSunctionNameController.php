<?php

namespace App\Http\Controllers;

use App\Http\Requests\SunctionCheckRequest;
use App\Services\CheckSunctionListService;
use Illuminate\Http\Request;

class CheckSunctionNameController extends Controller
{
    public function checkSunction(SunctionCheckRequest $request)
    {
        $date = $request->validated();

        $responseSunction = CheckSunctionListService::searchSanctionsList($this->getParametrs($date));

        if ($responseSunction->responses->entity1->status === 200 && $responseSunction->responses->entity1->results)
        {
            $persons = (array) $responseSunction->responses->entity1->results;
        }
        else
            $persons = [];


    }

    protected function getParametrs($data)
    {
        $parametrs = [];

        $schema = 'Person';
        $base = 'default';

        // Проверяем наличие и значения в $data
        if (($data['organisation'] ?? null) == 2) {
            $schema = 'Company';
        } elseif (($data['organisation'] ?? null) == 1) {
            $schema = 'Person';
        }

        if (($data['base'] ?? null) == 2) {
            $base = 'peps';
        } elseif (($data['base'] ?? null) == 1) {
            $base = 'sanctions';
        }

        $parametrs['schema'] = $schema;
        $parametrs['base'] = $base;
        $parametrs['name'] = $data['name'];
        $parametrs['country'] = $data['country'];
        $parametrs['taxnumber'] = $data['taxnumber'];
        $parametrs['birthDate'] = $data['birthDate'];

        return $parametrs;
    }
}
