<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\User;

class CalculateActiveUsers extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'larabbs:calculate-active-users';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = '计算并生成活跃用户';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle(User $user)
    {
        $this->info('正在计算...');
        $user->calculateAndCacheActiveUsers();
        $this->info('生成成功..');

    }
}
