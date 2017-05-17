<?php

namespace MilSonUno\Chat;

use Illuminate\Container\Container;
use Illuminate\Foundation\Application as LaravelApplication;
use Illuminate\Support\ServiceProvider;
use Laravel\Lumen\Application as LumenApplication;
use MilSonUno\Chat\Conversations\ConversationRepository;
use MilSonUno\Chat\Messages\MessageRepository;

class ChatServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     */
    public function boot()
    {
        $this->setupConfig();
        $this->setupMigrations();
        $this->loadViewsFrom(__DIR__.'/views', 'Chat');
    }
    /**
     * Register the application services.
     */
    public function register()
    {
        $this->registerBroadcast();
        $this->registerChat();
    }
    /**
     * Setup the config.
     */
    protected function setupConfig()
    {
        $source = realpath(__DIR__ . '/../config/chat.php');
        // Check if the application is a Laravel OR Lumen instance to properly merge the configuration file.
        if ($this->app instanceof LaravelApplication && $this->app->runningInConsole()) {
            $this->publishes([$source => config_path('Chat.php')]);
        } elseif ($this->app instanceof LumenApplication) {
            $this->app->configure('Chat');
        }
        $this->mergeConfigFrom($source, 'Chat');
    }
    /**
     * Publish migrations files.
     */
    protected function setupMigrations()
    {
        $this->publishes([
            realpath(__DIR__.'/../database/migrations/') => database_path('migrations'),
        ], 'migrations');
    }
    /**
     * Register Chat class.
     */
    protected function registerChat()
    {
        $this->app->singleton('Chat', function (Container $app) {
            return new Chat($app['config'], $app['Chat.broadcast'], $app[ConversationRepository::class], $app[MessageRepository::class]);
        });

        $this->app->alias('Chat', Chat::class);
    }

    /**
     * Register Chat class.
     */
    protected function registerBroadcast()
    {
        $this->app->singleton('Chat.broadcast', function (Container $app) {
            return new Live\Broadcast($app['config']);
        });

        $this->app->alias('Chat.broadcast', Live\Broadcast::class);
    }

    /**
     * Get the services provided by the provider.
     *
     * @return string[]
     */
    public function provides()
    {
        return [
            'Chat',
            'Chat.broadcast',
        ];
    }
}
