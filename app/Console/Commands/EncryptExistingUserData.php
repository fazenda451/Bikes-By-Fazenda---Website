<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;

class EncryptExistingUserData extends Command
{
    /**
     * The name and signature of the console command.
     */
    protected $signature = 'users:encrypt-data {--dry-run : Executar em modo de teste sem alterar dados}';

    /**
     * The console command description.
     */
    protected $description = 'Encripta dados sensíveis dos utilizadores existentes na base de dados';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $dryRun = $this->option('dry-run');
        
        if ($dryRun) {
            $this->info('🧪 MODO DE TESTE - Nenhum dado será alterado');
        } else {
            $this->warn('⚠️  ATENÇÃO: Este comando irá encriptar dados na base de dados!');
            if (!$this->confirm('Tens a certeza que queres continuar?')) {
                $this->info('Operação cancelada.');
                return;
            }
        }

        $this->info('Iniciando encriptação dos dados dos utilizadores...');
        
        // Obter utilizadores diretamente da base de dados para evitar conflitos com casts
        $users = DB::table('users')
                    ->whereNotNull('phone')
                    ->orWhereNotNull('address')
                    ->orWhereNotNull('zip_code')
                    ->get();

        if ($users->isEmpty()) {
            $this->info('✅ Nenhum utilizador encontrado com dados para encriptar.');
            return;
        }

        $this->info("📊 Encontrados {$users->count()} utilizadores com dados para encriptar.");
        
        $progressBar = $this->output->createProgressBar($users->count());
        $progressBar->start();

        $encryptedCount = 0;
        $errors = 0;

        foreach ($users as $user) {
            try {
                $needsUpdate = false;
                $updates = [];

                // Verificar se phone precisa de encriptação
                if ($user->phone && !$this->isAlreadyEncrypted($user->phone)) {
                    $updates['phone'] = $dryRun ? '[SERIA_ENCRIPTADO]' : Crypt::encryptString($user->phone);
                    $needsUpdate = true;
                }

                // Verificar se address precisa de encriptação
                if ($user->address && !$this->isAlreadyEncrypted($user->address)) {
                    $updates['address'] = $dryRun ? '[SERIA_ENCRIPTADO]' : Crypt::encryptString($user->address);
                    $needsUpdate = true;
                }

                // Verificar se zip_code precisa de encriptação
                if ($user->zip_code && !$this->isAlreadyEncrypted($user->zip_code)) {
                    $updates['zip_code'] = $dryRun ? '[SERIA_ENCRIPTADO]' : Crypt::encryptString($user->zip_code);
                    $needsUpdate = true;
                }

                if ($needsUpdate && !$dryRun) {
                    // Atualizar diretamente na base de dados
                    DB::table('users')->where('id', $user->id)->update($updates);
                    $encryptedCount++;
                }

                if ($dryRun && $needsUpdate) {
                    $encryptedCount++;
                    $this->info("Utilizador ID {$user->id}: dados seriam encriptados");
                }

            } catch (\Exception $e) {
                $this->error("Erro ao processar utilizador ID {$user->id}: " . $e->getMessage());
                $errors++;
            }

            $progressBar->advance();
        }

        $progressBar->finish();
        $this->newLine(2);

        if ($dryRun) {
            $this->info("🧪 MODO DE TESTE - {$encryptedCount} utilizadores SERIAM encriptados.");
            $this->info('💡 Execute sem --dry-run para aplicar as mudanças realmente.');
        } else {
            $this->info("✅ {$encryptedCount} utilizadores foram encriptados com sucesso!");
        }

        if ($errors > 0) {
            $this->error("❌ {$errors} erros ocorreram durante o processo.");
        }

        $this->info('🔐 Processo concluído!');
    }

    /**
     * Verifica se um valor já está encriptado
     */
    private function isAlreadyEncrypted($value)
    {
        try {
            Crypt::decryptString($value);
            return true;
        } catch (\Exception $e) {
            return false;
        }
    }
} 