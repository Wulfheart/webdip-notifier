<?php

namespace App\Bot;

use Illuminate\Support\Str;
use WeStacks\TeleBot\Objects\Update;
use WeStacks\TeleBot\TeleBot;

class TestHandler extends \WeStacks\TeleBot\Interfaces\UpdateHandler
{

    public static function trigger(Update $update, TeleBot $bot): bool
    {
        return isset($update->message);

    }

    public function handle()
    {
        $this->bot->sendMessage([
            'chat_id' => $this->update->message->chat->id,
            'text' => (string)Str::of($this->update->message->text)->remove("/start "),
        ]);
        // TODO: Implement handle() method.
    }
}