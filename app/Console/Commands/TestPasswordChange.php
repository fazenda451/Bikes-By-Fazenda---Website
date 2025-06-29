<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class TestPasswordChange extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'password:test {email} {new_password}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Test password change functionality';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $email = $this->argument('email');
        $newPassword = $this->argument('new_password');

        $this->info("Testing password change for user: {$email}");

        // Encontrar o utilizador
        $user = User::where('email', $email)->first();

        if (!$user) {
            $this->error("User not found with email: {$email}");
            return Command::FAILURE;
        }

        $this->info("User found: {$user->name}");

        // Verificar password atual
        $this->info("Current password hash: " . substr($user->password, 0, 20) . "...");

        // Alterar password
        $user->password = Hash::make($newPassword);
        $user->save();

        $this->info("Password changed successfully!");
        $this->info("New password hash: " . substr($user->password, 0, 20) . "...");

        // Verificar se a nova password funciona
        if (Hash::check($newPassword, $user->password)) {
            $this->info("✅ Password verification successful!");
        } else {
            $this->error("❌ Password verification failed!");
            return Command::FAILURE;
        }

        $this->info("🎉 Password change test completed successfully!");

        return Command::SUCCESS;
    }
} 