<?php

namespace App\Console\Commands;

use App\Models\IssueSequence;
use Carbon\Carbon;
use Illuminate\Console\Command;

class IssueSequenceHandler extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:issue-sequence-handler';

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
        $cutoff = Carbon::now()->subDays(90);

        $issues = IssueSequence::where('created_at', '<=', $cutoff)
            ->get();


        foreach ($issues as $issue) {
            $issue->update(['status' => 'archived']);
            $this->info("Archived issue: {$issue->title}");
        }

        return Command::SUCCESS;
    }
}
