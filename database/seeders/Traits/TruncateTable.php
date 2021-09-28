<?php

namespace Database\Seeders\Traits;

use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

trait TruncateTable
{
    /**
     * @param $table
     *
     * @return bool
     */
    protected function truncate($table): bool
    {
        switch (DB::getDriverName()) {
            case 'mysql':
                try {
                    DB::table($table)->truncate();

                    $statement = true;
                } catch (Exception $exception) {
                    $statement = false;

                    Log::critical($exception->getMessage());
                }
                break;
            case 'pgsql':
                $statement = DB::statement('TRUNCATE TABLE '.$table.' RESTART IDENTITY CASCADE');
                break;
            case 'sqlite': case 'sqlsrv':
                $statement = DB::statement('DELETE FROM '.$table);
                break;
            default:
                $statement = false;
        }

        return $statement;
    }

    /**
     * @param array $tables
     */
    protected function truncateMultiple(array $tables)
    {
        foreach ($tables as $table) {
            $this->truncate($table);
        }
    }
}
