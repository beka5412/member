<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class CheckPaymentStatus extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'paymentstatus:check';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Check expiry dates of PurchasedCourse records and update payment_status if needed.';

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
     * @return int
     */
    public function handle()
    {
        DB::table('purchased_courses')
            ->join('students', 'purchased_courses.student_id', '=', 'students.id')
            ->where('purchased_courses.expires_at', '!=', '0000-00-00 00:00:00')
            ->where('purchased_courses.expires_at', '<=', now()->subDays(2))
            ->where('purchased_courses.payment_status', '!=', 'cancelled')
            ->where('purchased_courses.payment_type', '!=', 'lifetime')
            ->update([
                'purchased_courses.payment_status' => 'cancelled',
                'students.status' => 'off'
            ]);

        $updatedCoursesCount = DB::table('purchased_courses')
            ->where('payment_status', 'cancelled')
            ->count();

        $this->info($updatedCoursesCount . ' records have been updated.');
    }
}
