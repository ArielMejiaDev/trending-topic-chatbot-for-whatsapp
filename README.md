# Trending Topic Chatbot for whatsapp

Is a chatbot to get the top ten topics around the world, it has version for Facebook Messenger and Whatsapp.

## Setup

### Create a Laravel project

```php
laravel new yourchatbotprojectname
```

### Create a twilio account

Visit this link: (click here)[https://www.twilio.com/login]

### Get Twilio SID number and Twilio Token

Visit this link: (click here)[https://www.twilio.com/console]

add the SID and Twilio token in env file as here:

```
TWILIO_ACCOUNT_SID="SIDNUMBER316546516165"
TWILIO_AUTH_TOKEN="AUTHTOKEN6456165165161"
```

### Register in Twilio Whatsapp sandobox

Visit this link: (click here)[https://www.twilio.com/console/sms/whatsapp/sandbox]

Twilio will provide a phone number, this is the number that will be available for your chatbot, follow the wizard to add you number to the twilio phone and paste the number in your Laravel env file

```
TWILIO_WHATSAPP_NUMBER="+14155238888" # THIS IS AN EXAMPLE NUMBER
```

* the convention of numbers is "+" "CountryCode" "yourphonenumber"

### Download the ArielDevMejia\Chatbot package

(Currently on development).

## How to use the API

The ArielMejiaDev\Chatbot package provides an abstract class to extend Facebook chatbots and whatsapp chatbots
the facebook and whatsapp chatbots classes are pretty much similar in use, this are the methods that both support:



### Example

```php
        $bot = WhatsappChatbotFacade::setFallbackText()->setGreetings("👋 Hi I am your chatbot");
        
        $bot->responseTo('help', function() use($bot){
            $bot->text = 'Hi, How can I help you';
        });
        
        $bot->responseTo(['thanks', 'thank you'], function() use($bot){
            $bot->text = '😀 Thanks to you, do you like trend of other city?';
        });
        
        $bot->responseTo(['bye', 'see you', 'no', 'no thanks'], function() use($bot){
            $bot->text = 'Ok Bye 👋🏽, Thanks for the great talk!';
        });

        $bot->send();
```
