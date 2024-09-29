<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\AccessControl\Branch;
use App\Models\AccessControl\BranchType;
use App\Models\AccessControl\Role;
use Illuminate\Database\Seeder;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        //create branch Type
        $this->call(BranchTypeSeeder::class);


        $brachType = BranchType::withTrashed()->where('id', 1)->first();

        if ($brachType) {
            if ($brachType->trashed()) {
                $brachType->restore();
            }
            if ($brachType->name != 'Office') {
                $brachType->name = 'Office';
                $brachType->save();
            }
        } else {
            $brachType = BranchType::updateOrCreate(['id' => 1], [
                'id' => 1,
                'name' => 'Office',
                'description' => 'Office Branch Type For All',
            ]);
        }

        // Retrieve the branch with id 1, including trashed items
        $brach = Branch::withTrashed()->where('id', 1)->first();

        if ($brach) {
            if ($brach->trashed()) {
                $brach->restore();
            }
            if ($brach->name != 'Main Office') {
                Branch::create([
                    'branch_type_id' => $brachType->id,
                    'name' => $brach->name,
                ]);
                $brach->update([
                    'branch_type_id' => $brachType->id,
                    'name' => 'Main Office'
                ]);
            }
        } else {
            Branch::create([
                'id' => 1,
                'branch_type_id' => 1,
                'name' => "Main Office",
            ]);
        }
        \App\Models\User::updateOrCreate(
            ['id' => 1],
            [
                'name' => 'admin',
                'password' => bcrypt('12345678'),
                'email' => 'admin@gmail.com',
                'branch_id' => 1
            ]
        );


        $role = Role::updateOrCreate(
            ['id' => 1],
            [
                'name' => 'Supper Admin',
                'slug' => 'supper_admin',
                'is_default' => true
            ]
        );


        
        
        
            
        $role->users()->sync(1);



    }
}
