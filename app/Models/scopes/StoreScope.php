<?php
namespace App\Models\scopes;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Scope;
use Illuminate\Support\Facades\Auth;

class StoreScope implements Scope{
    public function apply(Builder $builder, Model $model)
    {
        $user = Auth::user();

        if ($user->store_id){

            $builder->where('store_id', '=', $user->store_id);
        }
    }
}