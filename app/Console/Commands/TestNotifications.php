<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Session;

class TestNotifications extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'notifications:test {--type=success} {--message=Test notification}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Test the notification system';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $type = $this->option('type');
        $message = $this->option('message');

        $this->info("Testing notification system...");
        $this->info("Type: {$type}");
        $this->info("Message: {$message}");

        // Simular uma sessão com notificação
        Session::flash($type, $message);
        Session::flash('notification_type', $type);
        Session::flash('notification_message', $message);

        $this->info("✅ Notification test completed!");
        $this->info("Check your browser console for more details.");
        $this->info("You can also call 'testarNotificacoes()' in the browser console to test all notification types.");

        return Command::SUCCESS;
    }
} 