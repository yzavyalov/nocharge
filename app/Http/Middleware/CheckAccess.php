<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckAccess
{
    public function handle(Request $request, Closure $next)
    {
        // Проверяем URL запроса на наличие опасных запросов
        if ($this->containsDangerousQueries($request)) {
            // Если URL содержит опасные запросы, перенаправляем пользователя на главную страницу
            return redirect('/');
        }

        return $next($request);
    }

    private function containsDangerousQueries(Request $request)
    {
        // Список опасных запросов, которые вы хотите заблокировать
        $dangerousQueries = ['.env', '.git', 'php', 'cgi-bin', 'etc/passwd', 'wp-admin', 'wp-login', 'admin', 'backup', 'xmlrpc', 'remote.php', 'vendor', 'composer', 'node_modules', 'npm-debug'];

        // Проверяем URL на наличие опасных запросов
        foreach ($dangerousQueries as $query) {
            if (strpos($request->url(), $query) !== false) {
                return true;
            }
        }

        return false;
    }
}
