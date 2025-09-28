<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\UserSubscription;
use Carbon\Carbon;

class SubscriptionHandler extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:subscription-handler';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Deactivate expired subscriptions';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $today = Carbon::now();

        $subscriptions = UserSubscription::where('status', 'active')
            ->where('expire_at', '<', $today)
            ->get();

        if ($subscriptions->isEmpty()) {
            $this->info('No expired subscriptions found.');
            return Command::SUCCESS;
        }

        foreach ($subscriptions as $subscription) {
            $subscription->update(['status' => 'inactive']);
            $this->info("Subscription ID {$subscription->id} has been deactivated.");
        }

        return Command::SUCCESS;
    }
}
