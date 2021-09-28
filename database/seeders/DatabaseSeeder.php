<?php

namespace Database\Seeders;

use Database\Seeders\Traits\TruncateTable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use TruncateTable;

    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        $this->truncateMultiple([
            'failed_jobs',
        ]);
        $this->call([
            // CreateAdminUser::class,
            CreateCategories::class,
            //AuthSeeder::class,
        ]);

        Model::reguard();
    }
}
