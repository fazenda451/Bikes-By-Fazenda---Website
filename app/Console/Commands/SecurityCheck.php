<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use App\Models\User;

class SecurityCheck extends Command
{
    protected $signature = 'security:check';
    protected $description = 'Verifica o estado da segurança do projeto';

    public function handle()
    {
        $this->info('🔐 VERIFICAÇÃO DE SEGURANÇA - Bikes By Fazenda');
        $this->info('=' . str_repeat('=', 50));
        
        $issues = 0;
        
        // 1. Verificar APP_KEY
        if (empty(config('app.key'))) {
            $this->error('❌ APP_KEY não está definida!');
            $this->warn('   Execute: php artisan key:generate');
            $issues++;
        } else {
            $this->info('✅ APP_KEY está definida');
        }
        
        // 2. Verificar configurações de sessão
        if (config('session.encrypt')) {
            $this->info('✅ Encriptação de sessões ativada');
        } else {
            $this->error('❌ Encriptação de sessões desativada');
            $issues++;
        }
        
        // 3. Verificar dados encriptados
        $totalUsers = User::count();
        $usersWithPhone = User::whereNotNull('phone')->count();
        $usersWithAddress = User::whereNotNull('address')->count();
        
        if ($totalUsers > 0) {
            $this->info("📊 Total de utilizadores: {$totalUsers}");
            
            if ($usersWithPhone > 0) {
                // Verificar se pelo menos alguns telefones estão encriptados
                $encryptedPhones = 0;
                User::whereNotNull('phone')->chunk(10, function ($users) use (&$encryptedPhones) {
                    foreach ($users as $user) {
                        if ($this->isEncrypted($user->getRawOriginal('phone'))) {
                            $encryptedPhones++;
                        }
                    }
                });
                
                if ($encryptedPhones > 0) {
                    $this->info("✅ {$encryptedPhones} telefones encriptados");
                } else {
                    $this->warn("⚠️  0 telefones encriptados de {$usersWithPhone}");
                    $this->warn('   Execute: php artisan users:encrypt-data');
                }
            }
        }
        
        // 4. Verificar middlewares de segurança
        $middlewares = config('app.middleware', []);
        if (in_array(\App\Http\Middleware\SecurityHeaders::class, $middlewares) || 
            $this->checkMiddlewareInKernel()) {
            $this->info('✅ Headers de segurança configurados');
        } else {
            $this->error('❌ Headers de segurança não configurados');
            $issues++;
        }
        
        // 5. Verificar ambiente
        if (config('app.env') === 'production') {
            if (config('app.debug')) {
                $this->error('❌ DEBUG ativado em produção!');
                $issues++;
            } else {
                $this->info('✅ DEBUG desativado em produção');
            }
        }
        
        // 6. Verificar HTTPS em produção
        if (config('app.env') === 'production') {
            if (!config('session.secure')) {
                $this->warn('⚠️  Cookies seguros não forçados em produção');
            } else {
                $this->info('✅ Cookies seguros configurados');
            }
        }
        
        // 7. Verificar rate limiting
        if ($this->checkRateLimiting()) {
            $this->info('✅ Rate limiting configurado');
        } else {
            $this->warn('⚠️  Rate limiting pode não estar configurado');
        }
        
        $this->info('=' . str_repeat('=', 50));
        
        if ($issues === 0) {
            $this->info('🎉 EXCELENTE! Nenhum problema crítico encontrado.');
        } else {
            $this->error("⚠️  {$issues} problema(s) encontrado(s) que precisam de atenção.");
        }
        
        $this->info('🛡️  Verificação concluída!');
    }
    
    private function isEncrypted($value)
    {
        if (empty($value)) return false;
        
        try {
            decrypt($value);
            return true;
        } catch (\Exception $e) {
            return false;
        }
    }
    
    private function checkMiddlewareInKernel()
    {
        // Verificar se o middleware existe no ficheiro Kernel.php
        $kernelPath = app_path('Http/Kernel.php');
        if (file_exists($kernelPath)) {
            $content = file_get_contents($kernelPath);
            return str_contains($content, 'SecurityHeaders');
        }
        
        return false;
    }
    
    private function checkRateLimiting()
    {
        // Verificar se existem rotas com throttle
        $routes = \Illuminate\Support\Facades\Route::getRoutes();
        
        foreach ($routes as $route) {
            $middleware = $route->gatherMiddleware();
            foreach ($middleware as $mid) {
                if (str_contains($mid, 'throttle')) {
                    return true;
                }
            }
        }
        
        return false;
    }
} 