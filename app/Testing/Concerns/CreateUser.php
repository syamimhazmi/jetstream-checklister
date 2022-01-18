<?php
namespace App\Testing\Concerns;

use App\Models\User;

trait CreateUser
{
    /**
     * Create admin user.
     *
     * @return \App\Models\User
     */
    protected function createAdminUser(array $attributes = [])
    {
        return \tap(User::faker()->create(), static function ($user) {
            $user->roles()->sync([1]);
        });
    }


}
