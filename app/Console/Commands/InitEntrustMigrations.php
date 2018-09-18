<?php

namespace App\Console\Commands;

use App\Models\User;
use Zizaco\Entrust\MigrationCommand;

class InitEntrustMigrations extends MigrationCommand
{
    public function handle()
    {
        $this->fire();
    }

    /**
     * Create the migration.
     *
     * @param string $name
     *
     * @return bool
     */
    protected function createMigration($rolesTable, $roleUserTable, $permissionsTable, $permissionRoleTable)
    {
        $migrationFile = base_path("/database/migrations")."/".date('Y_m_d_His')."_entrust_setup_tables.php";

        $usersTable  = User::getTableName();
        $userModel   = User::class;
        $userKeyName = (new $userModel())->getKeyName();

        $data = compact('rolesTable', 'roleUserTable', 'permissionsTable', 'permissionRoleTable', 'usersTable', 'userKeyName');

        $output = $this->laravel->view->make('entrust::generators.migration')->with($data)->render();

        if (!file_exists($migrationFile) && $fs = fopen($migrationFile, 'x')) {
            fwrite($fs, $output);
            fclose($fs);
            return true;
        }

        return false;
    }
}