<?php

namespace App\Policies;

use App\User;
use App\Post;
use Illuminate\Auth\Access\HandlesAuthorization;

class PostPolicy
{
    use HandlesAuthorization;


    public function create(User $user)
    {
        return $this->getPermission($user, 1);
    }
    
    public function update(User $user)
    {
       return $this->getPermission($user, 2);
   }

    public function delete(User $user)
    {
        return $this->getPermission($user, 3);
    }

    public function role(User $user)
    {
        return $this->getPermission($user, 6);

    }

    public function permission(User $user)
    {
        return $this->getPermission($user, 5);

    }

    public function adminUpdate(User $user)
    {
        return $this->getPermission($user, 8);

    }

    public function adminDelete(User $user)
    {
        return $this->getPermission($user, 9);

    }

     public function adminCreate(User $user)
    {
        return $this->getPermission($user, 7);

    }

    protected function getPermission($user, $per_id)
    {
        foreach ($user->roles as $role) {
            foreach ($role->permissions as $permission) {
                if ($permission->id == $per_id) {
                 return true;
             }
         }
     }
     return false;
 }
}
