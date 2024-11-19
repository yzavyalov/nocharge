<?php

namespace App\Services;

use App\Enums\CheckEmailStatusEnum;
use App\Http\Requests\CheckEmailRequest;
use Carbon\Carbon;
use Iodev\Whois\Factory as WhoisFactory;

class CheckUserEmailService
{

    public static function checkUserEmail(CheckEmailRequest $request)
    {
        $email = $request->validated()['email'];
        $domain = substr(strrchr($email, "@"), 1);

        // Проверка на временные домены
        if (self::isDisposableDomain($domain)) {
            return CheckEmailStatusEnum::Temporary;
        }

        // Проверка на возраст домена
        $whoisInfo = self::getDomainRegistrationDate($domain);

        if (!$whoisInfo) {
            return CheckEmailStatusEnum::Error;
        }

        $registrationDate = Carbon::parse($whoisInfo);
        $oneMonthAgo = Carbon::now()->subMonth();

        if ($registrationDate->greaterThan($oneMonthAgo)) {
            return CheckEmailStatusEnum::NewDomain;
        }

        // Если все проверки пройдены успешно
        return CheckEmailStatusEnum::OkDomain;
    }


    // Функция для проверки временного домена
    private static function isDisposableDomain($domain)
    {
        // Массив с URL источников для проверки доменов
        $sources = [
            'https://raw.githubusercontent.com/disposable/disposable-email-domains/master/domains.txt',
            'https://github.com/disposable-email-domains/disposable-email-domains/blob/main/disposable_email_blocklist.conf',
//            'https://yet-another-source.com/domains.txt',
        ];

        foreach ($sources as $source) {
            $tempDomainsList = @file_get_contents($source); // Используем @, чтобы подавить предупреждения в случае ошибки
            if ($tempDomainsList === false) {
                continue; // Если не удалось получить данные с источника, переходим к следующему
            }

            $tempDomainsArray = explode("\n", $tempDomainsList);

            // Убираем лишние пробелы и пустые строки
            $tempDomainsArray = array_map('trim', $tempDomainsArray);
            $tempDomainsArray = array_filter($tempDomainsArray, function($domain) {
                return !empty($domain); // Убираем пустые строки
            });

            // Проверяем, содержится ли домен в текущем источнике
            if (in_array($domain, $tempDomainsArray)) {
                return true; // Если домен найден в одном из источников
            }
        }

        // Если домен не найден ни в одном источнике
        return false;
    }


    // Функция для получения даты регистрации домена через WHOIS
    private static function getDomainRegistrationDate($domain)
    {
        $whois = WhoisFactory::get()->createWhois();

        try {
            $info = $whois->loadDomainInfo($domain);
            return $info->getCreationDate(); // Возвращает дату регистрации домена
        } catch (\Exception $e) {
            return false;
        }
    }
}
