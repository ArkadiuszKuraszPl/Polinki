<?php

namespace App\Listeners;

use Illuminate\Auth\Events\Login as LoginEvent;
use Illuminate\Support\Facades\Request;
use App\Models\Login;

class LogUserLogin
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(LoginEvent $event): void
    {
        // Zapis logowania
        Login::create([
            'user_id' => $event->user->id,
            'ip_address' => Request::ip(),
            'user_agent' => Request::header('User-Agent'),
            'logged_in_at' => now(),
        ]);
    }
}
