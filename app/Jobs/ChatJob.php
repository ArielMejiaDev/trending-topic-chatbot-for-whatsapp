<?php

namespace App\Jobs;

use App\Chatbot\WhatsappChatbot;
use App\Chatbot\WhatsappChatbotFacade;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class ChatJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $bot = WhatsappChatbotFacade::setFallbackText()
            ->setGreetings("👋 You can text me any city and I will give you the trending topics\nExample: 'Madrid trends', 'trends of London' or 'From Mexico'\nI support a variety of ways to ask for a trend");
        
        $bot->responseTo('help', function() use($bot){
            $bot->text = 'Hi, How can I help you';
        });
        
        $bot->responseTo(['thanks', 'thank you'], function() use($bot){
            $bot->text = '😀 Thanks to you, do you like trend of other city?';
        });
        
        $bot->responseTo(['bye', 'see you', 'no', 'no thanks'], function() use($bot){
            $bot->text = 'Ok Bye 👋🏽, Thanks for the great talk!';
        });
        
        $bot->responseTo(['author', 'who made you', 'made you'], function() use($bot){
            $bot->text = "I was made with ❤️ by Ariel Mejia Dev\nSite: arielmejia.dev\nGithub: github.com/ArielMejiaDev";
        });

        $bot->send();
    }
}
