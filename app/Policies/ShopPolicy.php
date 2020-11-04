<?php

namespace App\Policies;

use App\Shop;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Auth\Access\Response;

class ShopPolicy
{
    use HandlesAuthorization;

    public function show(User $user, Shop $shop)
    {
        return $user->ownsShop($shop) ? Response::allow() : Response::deny("deny");
    }

    public function update(User $user, Shop $shop)
    {
        return $user->ownsShop($shop) ? Response::allow() : Response::deny("deny");
    }
}
