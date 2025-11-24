<?php 

namespace App\Services;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class TelegramService {

    protected $baseUrl;
    protected $channelId;

    // sets up the auth details.
    public function __construct()
    {
        $token = env("TELEGRAM_BOT_TOKEN");

        $this->baseUrl = 'https://api.telegram.org/bot' . $token . '/';
        $this->channelId = env('TELEGRAM_CHANNEL_ID');
    }

    public function sendMsg($title, $url){
        $sendMsgUrl = $this->baseUrl . 'sendMessage';

        $safeTitle = htmlspecialchars($title);
        $safeUrl = htmlspecialchars($url);

        $message = "<b>$safeTitle</b>\n\n";
        $message .= "<a href='$safeUrl'>Click here to read more</a>";

        $response = Http::asForm()->post($sendMsgUrl, [
            'chat_id' => $this->channelId,
            'text' => $message,
            'parse_mode' => 'HTML'
        ]);
    }

}