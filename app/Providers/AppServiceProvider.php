<?php

namespace App\Providers;

use Illuminate\Support\Facades\URL;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->configureDatabaseFromEnvironment();

        /*
         * Con `php artisan config:cache`, `env()` deja de funcionar en runtime y `config('app.url')`
         * puede quedar con el valor del build (p. ej. http://localhost). Railway inyecta APP_URL
         * en el proceso: `getenv('APP_URL')` sí refleja el valor real del despliegue.
         */
        $appUrl = $this->resolveApplicationUrl();
        if ($appUrl === '') {
            return;
        }

        $scheme = parse_url($appUrl, PHP_URL_SCHEME);
        $forceHttps = $scheme === 'https'
            || $this->app->environment('production')
            || filter_var((string) getenv('FORCE_HTTPS'), FILTER_VALIDATE_BOOLEAN);

        if ($forceHttps) {
            URL::forceRootUrl($appUrl);
            URL::forceScheme('https');
        }
    }

    /**
     * URL pública de la app: prioriza variable de entorno del proceso (Railway / Docker).
     */
    private function resolveApplicationUrl(): string
    {
        $fromEnv = getenv('APP_URL');
        if (is_string($fromEnv) && $fromEnv !== '') {
            return rtrim($fromEnv, '/');
        }

        return rtrim((string) config('app.url'), '/');
    }

    private function envValue(string ...$keys): ?string
    {
        foreach ($keys as $key) {
            $value = getenv($key);
            if (is_string($value) && $value !== '') {
                return $value;
            }
        }

        return null;
    }

    private function configureDatabaseFromEnvironment(): void
    {
        $connection = $this->envValue('DB_CONNECTION');
        if ($connection !== null) {
            config(['database.default' => $connection]);
        }

        $mysql = array_filter([
            'url' => $this->envValue('DATABASE_URL', 'MYSQL_URL', 'MYSQL_PUBLIC_URL'),
            'host' => $this->envValue('DB_HOST', 'MYSQLHOST', 'MYSQL_HOST'),
            'port' => $this->envValue('DB_PORT', 'MYSQLPORT', 'MYSQL_PORT'),
            'database' => $this->envValue('DB_DATABASE', 'MYSQLDATABASE', 'MYSQL_DATABASE'),
            'username' => $this->envValue('DB_USERNAME', 'MYSQLUSER', 'MYSQL_USER'),
            'password' => $this->envValue('DB_PASSWORD', 'MYSQLPASSWORD', 'MYSQL_PASSWORD'),
        ], static fn ($value) => $value !== null);

        if ($mysql === []) {
            return;
        }

        config([
            'database.connections.mysql' => array_merge(
                config('database.connections.mysql', []),
                $mysql
            ),
        ]);
    }
}
