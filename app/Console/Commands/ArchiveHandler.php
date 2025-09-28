<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Issue;
use Carbon\Carbon;

class ArchiveHandler extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:archive-handler';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Archive issues older than 90 days';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $cutoff = Carbon::now()->subDays(90);

        $issues = Issue::where('is_archive', 0) // only active ones
            ->where('created_at', '<=', $cutoff)
            ->get();

        if ($issues->isEmpty()) {
            $this->info('No issues to archive.');
            return Command::SUCCESS;
        }

        foreach ($issues as $issue) {
            $issue->update(['is_archive' => 1]);
            $this->info("Archived issue: {$issue->title}");
        }

        return Command::SUCCESS;
    }
}
