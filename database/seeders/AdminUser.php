 <?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use App\Models\User;
use App\Models\Role;
use App\Models\Profile;
class AdminUser extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role = Role::create([
        	'name' => 'customer',
        	'description' => ' Customer Role'
        ]);

        $role = Role::create([
        	'name' => 'admin',
        	'description' => 'Admin Role'
        ]);

        $user = User::create([
        	'email' => 'admin@admin.com',
        	'password' => bcrypt('secret'),
        	'role_id' => $role->id,
        ]);

        Profile::create([
        	'user_id' => $user->id
        ]);
    }
}
