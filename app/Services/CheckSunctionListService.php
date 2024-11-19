<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class CheckSunctionListService
{
    public static function searchSanctionsList($data, $method = 'match')
    {
        // URL for the sanctions list
        $url = "https://api.opensanctions.org";

        // Build the URL for the specified method
        $urlRequest = $url . self::getParametr($method).$data['base'];

        // Define query parameters for GET request
        $queryParams = [
            'queries' => [
                'entity1' => [
                    'schema' => $data['schema'] ?? 'Person',
                    'properties' => [
                        'name' => [$data['name']],
                        'birthDate' => [$data['birthDate'] ?? ''],
                        'nationality' => [$data['country'] ?? ''], // Изменено с "countries" на "nationality"
                    ],
                ],
            ],
        ];

        // Отправляем запрос с авторизацией и параметрами
        $response = Http::asJson()->withHeaders([
            'Authorization' => 'ApiKey ' . env('OPENSANCTIONS_API_KEY'),
        ])->post($urlRequest, $queryParams);

        if ($response->successful())
            return json_decode($response);
        else
            return false;
    }

protected static function getParametr($method)
{
    switch ($method) {
        case 'match':
            return '/match/';
        case 'search':
            return '/search/';
        case 'entities':
            return '/entities';
        default:
            return '/search/';
    }
}


    public static function extractNamesFromFile($filePath)
    {
        // Читаем содержимое файла
        $fileContent = file_get_contents($filePath);

        // Регулярное выражение для поиска имен после "Name:"
        $pattern = '/Name:\s*(\d+: ([A-Z]+))+/m';

        // Массив для хранения имен
        $names = [];

        // Находим все совпадения по регулярному выражению
        preg_match_all($pattern, $fileContent, $matches);

        // Проверяем совпадения и добавляем имена в массив
        if (!empty($matches[2])) {
            $names = $matches[2];  // Имя будет находиться в подмассиве $matches[2]
        }

        // Объединяем имена в одну строку через пробел
        $namesString = implode(' ', $names);

        return $namesString;
    }

//        // Использование функции
//        $filePath = 'path/to/your/file.txt';  // Укажите путь к вашему файлу
//        $namesString = extractNamesFromFile($filePath);
//
//        // Выводим строку с именами
//        echo $namesString;


}
