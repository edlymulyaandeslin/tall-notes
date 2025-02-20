<?php

namespace App\Console\Commands;

use App\Jobs\SendEmail;
use App\Models\Note;
use Carbon\Carbon;
use Illuminate\Console\Command;

class SendScheduleNotes extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:send-schedule-notes';

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
        $now = Carbon::now();

        $notes = Note::where('is_published', true)
            ->where('send_date', $now->toDateString())
            ->get();

        $noteCount = $notes->count();

        $this->info("{$noteCount} notes were sent");

        foreach ($notes as $note) {
            SendEmail::dispatch($note);
        }
    }
}
