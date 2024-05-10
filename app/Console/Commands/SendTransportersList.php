<?php

namespace App\Console\Commands;

use App\Mail\TransportersList;
use App\Models\Transporter;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;

class SendTransportersList extends Command
{
    protected $signature = 'app:send-transporters-list {email}';

    protected $description = 'Send transporters list to a specified email.';

    public function handle(): int
    {
        $this->info('Sending transporters list...');

        $transporters = Transporter::get(['name', 'credit_limit']);

        Mail::to($this->argument('email'))
            ->send(new TransportersList($transporters));


        return Command::SUCCESS;
    }
}
