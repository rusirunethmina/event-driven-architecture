<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Mail;

class SendEmailJob implements ShouldQueue
{
    use Queueable;

    protected $to, $view, $data;

    public function __construct($to, $view, $data)
    {
        $this->to = $to;
        $this->view = $view;
        $this->data = $data;
    }

    public function handle()
    {
        Mail::send($this->view, $this->data, function ($message) {
            $message->to($this->to)->subject('Notification');
        });
    }
}
