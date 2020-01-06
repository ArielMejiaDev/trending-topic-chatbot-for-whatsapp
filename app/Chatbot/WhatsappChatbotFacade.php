<?php namespace App\Chatbot;

use Illuminate\Support\Facades\Facade;

class WhatsappChatbotFacade extends Facade
{
    public static function getFacadeAccessor()
    {
        return 'WhatsappChatbot';
    }
}