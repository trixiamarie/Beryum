<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Support\Carbon;

class DeleteOldUsers extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:delete-old-users';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        // Calcola la data limite
        $cutoff = Carbon::now()->subHours(48);

        // Trova e cancella gli utenti
        $deletedCount = User::where('created_at', '<', $cutoff)->delete();

        // Mostra un messaggio di output
        $this->info("Deleted {$deletedCount} users who were registered more than 48 hours ago.");
    }
}
