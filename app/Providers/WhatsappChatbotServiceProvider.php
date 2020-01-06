<?php

namespace App\Providers;

use App\Chatbot\WhatsappChatbot;
use Illuminate\Support\ServiceProvider;

class WhatsappChatbotServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('WhatsappChatbot', function(){
            return new WhatsappChatbot;
        });
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
