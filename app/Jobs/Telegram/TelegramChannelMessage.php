<?php

namespace App\Jobs\Telegram;

use App\Models\Order;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;
use App\Services\Telegram\TelegramService;

class TelegramChannelMessage implements ShouldQueue
{
    use Queueable;

    private TelegramService $service;

    /**
     * Create a new job instance.
     */
    public function __construct(private Order $order)
    {
        $this->service = new TelegramService();
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $this->service->setOrder($this->order)->sendMessage('test');
    }
}
