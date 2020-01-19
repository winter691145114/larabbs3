<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\User;

class RecordLastActivedAt extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'larabbs:record-last-actived-at';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = '同步用户最后登录时间到数据库';

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
        $this->info('正在同步...');
        $user->syncLastActivedAt();
        $this->info('同步完成...');
    }
}
