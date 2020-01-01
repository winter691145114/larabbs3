<?php

use Illuminate\Database\Seeder;
use App\Models\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = app(Faker\Generator::class);
        $avatars = [
            'https://iocaffcdn.phphub.org/uploads/images/201710/14/1/s5ehp11z6s.png',
            'https://iocaffcdn.phphub.org/uploads/images/201710/14/1/Lhd1SHqu86.png',
            'https://iocaffcdn.phphub.org/uploads/images/201710/14/1/LOnMrqbHJn.png',
            'https://iocaffcdn.phphub.org/uploads/images/201710/14/1/xAuDMxteQy.png',
            'https://iocaffcdn.phphub.org/uploads/images/201710/14/1/ZqM7iaP4CR.png',
            'https://iocaffcdn.phphub.org/uploads/images/201710/14/1/NDnzMutoxX.png',
        ];
        $users = factory(User::class)->times(10)->make()->each(function($user,$index)use($faker,$avatars){
            $user->avatar = $faker->randomElement($avatars);
        });
        $user_array = $users->makeVisible(['password','remember_token'])->toArray();
        User::insert($user_array);
        $user = User::find(1);
        $user->name = "winter";
        $user->email = "691145114@qq.com";
        $user->avatar = 'https://iocaffcdn.phphub.org/uploads/images/201710/14/1/ZqM7iaP4CR.png';
        $user->password = bcrypt('111111');
        $user->save();
        $user2 = User::find(2);
        $user2->name = "summer";
        $user2->email = "691145115@qq.com";
        $user2->password = bcrypt('222222');
        $user2->save();
    }
}
