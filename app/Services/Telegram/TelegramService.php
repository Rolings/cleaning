<?php

namespace App\Services\Telegram;

use App\Models\Order;
use Telegram\Bot\Api;

class TelegramService
{
    /**
     * @var Api
     */
    protected Api $telegram;

    /**
     * @var Order
     */
    protected Order $order;

    public function __construct()
    {
        $this->telegram = new Api(config('telegram.bots.mybot.token'));
    }

    /**
     * @param Order $order
     * @return $this
     */
    public function setOrder(Order $order): self
    {
        $this->order = $order;

        return $this;
    }

    private function generateMessage(): array
    {
        return [
            'id'            => $this->order->id,
            'customer'      => $this->order->fullName,
            'phone'         => $this->order->phone,
            'time create'   => $this->order->created_at->format('d F Y / h:i A'),
            'order time'    => $this->order->order_at->format('d F Y / h:i A'),
            'order address' => $this->order->apt_suite . ' ' . $this->order->address . ' ' . $this->order->city . ' ' . $this->order->state->postal_abbreviation . ' ' . $this->order->zip,
            'comment'       => $this->order->comment
        ];
    }

    private function formatMessage(array $data): string
    {
        $message = "_____________________\n";
        foreach ($data as $key => $value) {
            $message .= ucfirst($key) . ": " . $value . "\n";
        }
        $message .= "_____________________";

        return $message;
    }

    /**
     * @param string $message
     * @return void
     * @throws \Telegram\Bot\Exceptions\TelegramSDKException
     */
    public function sendMessage(string $message): void
    {
        $this->telegram->sendMessage([
            'chat_id' => '-1002288592982',
            'text'    => $this->formatMessage($this->generateMessage()),
        ]);
    }

}
