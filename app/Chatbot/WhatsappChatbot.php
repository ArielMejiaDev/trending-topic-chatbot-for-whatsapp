<?php namespace App\Chatbot;

use Twilio\Rest\Client;
use Twilio\Twiml;

class WhatsappChatbot extends Chatbot 
{

    public function send()
    {
        $this->bot = new Twiml();
        $this->bot->message($this->text);
        print $this->bot;
    }

    public function sendMessage(string $message, string $phoneNumber)
    {
        $twilio = new Client(config('chatbot.twilio_account_sid'), config("chatbot.twillio_auth_token"));
        $message = $twilio->messages
        ->create("whatsapp:{$phoneNumber}",
            [
                "body" => $message,
                "from" => "whatsapp:".config('chatbot.twilio_whatsapp_number')
            ]
        );
        print($message->sid);
    }

}