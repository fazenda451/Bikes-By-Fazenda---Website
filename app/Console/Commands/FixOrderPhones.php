<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use App\Models\Order;
use App\Models\User;

class FixOrderPhones extends Command
{
    protected $signature = 'orders:fix-phones {--dry-run : Executar em modo teste}';
    protected $description = 'Corrige telefones encriptados incorretamente nas encomendas';

    public function handle()
    {
        $dryRun = $this->option('dry-run');
        
        if ($dryRun) {
            $this->info('🧪 MODO DE TESTE - Nenhum dado será alterado');
        }
        
        $this->info('🔍 Procurando encomendas com telefones encriptados...');
        
        // Obter encomendas com telefones que parecem estar encriptados
        $orders = DB::table('orders')
                    ->whereNotNull('phone')
                    ->where('phone', 'LIKE', 'eyJ%') // Padrão típico de encriptação Laravel
                    ->orWhere('phone', 'LIKE', '%cipher%')
                    ->get();
        
        if ($orders->isEmpty()) {
            $this->info('✅ Nenhuma encomenda encontrada com telefones encriptados.');
            return;
        }
        
        $this->info("📊 Encontradas {$orders->count()} encomendas para corrigir.");
        
        $progressBar = $this->output->createProgressBar($orders->count());
        $progressBar->start();
        
        $fixed = 0;
        $errors = 0;
        
        foreach ($orders as $order) {
            try {
                // Buscar o utilizador da encomenda
                $user = User::find($order->user_id);
                
                if (!$user) {
                    $this->error("Utilizador não encontrado para encomenda ID {$order->id}");
                    $errors++;
                    continue;
                }
                
                // Usar o telefone desencriptado do utilizador
                $correctPhone = $user->phone;
                
                if ($dryRun) {
                    $this->info("Encomenda ID {$order->id}: '{$order->phone}' → '{$correctPhone}'");
                } else {
                    // Atualizar com o telefone correto
                    DB::table('orders')
                        ->where('id', $order->id)
                        ->update(['phone' => $correctPhone]);
                }
                
                $fixed++;
                
            } catch (\Exception $e) {
                $this->error("Erro ao processar encomenda ID {$order->id}: " . $e->getMessage());
                $errors++;
            }
            
            $progressBar->advance();
        }
        
        $progressBar->finish();
        $this->newLine(2);
        
        if ($dryRun) {
            $this->info("🧪 TESTE: {$fixed} encomendas SERIAM corrigidas.");
            $this->info('💡 Execute sem --dry-run para aplicar as correções.');
        } else {
            $this->info("✅ {$fixed} encomendas foram corrigidas!");
        }
        
        if ($errors > 0) {
            $this->error("❌ {$errors} erros ocorreram.");
        }
        
        $this->info('🔐 Processo concluído!');
    }
} 