<?php namespace App\Chatbot;

use Illuminate\Support\Str;

abstract class Chatbot 
{

    protected $bot;
    protected $receivedText;
    protected $fallbackText = 'I´m sorry I didn´t understand the request';
    protected $greetingText = "👋 Hi";
    protected $greetingsNeedles = ['hi', 'hello', 'good morning', 'good evening', 'good afternoon', 'good night'];
    public $text;

    public function setFallbackText(string $fallbackText = null)
    {
        if ($fallbackText) {
            $this->fallbackText = $fallbackText;
        }
        $this->text = $this->fallbackText;
        return $this;
    }

    public function setGreetings(string $greetingText = null, $needles = []) 
    {
        if ($needles) $this->greetingsNeedles = $needles;
        if ($greetingText) $this->greetingText = $greetingText;
        if (Str::contains($this->getTextByUser(), $this->greetingsNeedles)) {
            $this->text = $this->greetingText;
        }
        return $this;
    }

    public function responseTo($needle, $callback)
    {
        if (Str::contains(strtolower($this->getTextByUser()), $needle)) {
            $callback();
        }
    }

    public function getTextByUser()
    {
        return $this->receivedText = strtolower($_REQUEST['Body']);
    }

    public abstract function send();


}
