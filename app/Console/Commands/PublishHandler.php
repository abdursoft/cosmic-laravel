<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Magazine;
use Carbon\Carbon;

class PublishHandler extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:publish-handler';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Publish magazines automatically when publish_date is reached';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $now = Carbon::now();

        $magazines = Magazine::where('publish_status', 'scheduled')
            ->where('publish_date', '<=', $now)
            ->get();

        if ($magazines->isEmpty()) {
            $this->info('No magazines to publish right now.');
            return Command::SUCCESS;
        }

        foreach ($magazines as $mag) {
            $mag->update(['publish_status' => 'published']);
            $this->info("Published magazine: {$mag->title}");
        }

        return Command::SUCCESS;
    }
}
