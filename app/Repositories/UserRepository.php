<?php

namespace App\Repositories;

use App\Http\Requests\GetUserRequest;
use App\Interfaces\UserRepositoryInterface;
use App\Models\User;

// class UserRepository
class UserRepository implements UserRepositoryInterface
{
    // Repository methods for User model

    public function getUsers(GetUserRequest $getUserRequest): \Illuminate\Contracts\Pagination\LengthAwarePaginator|\Illuminate\Database\Eloquent\Collection
    {

        $paginate = $getUserRequest->boolean('paginate', false);
        $per_page = $getUserRequest->input('perPage', User::PER_PAGE);

        $users = User::query()
            ->orderBy('updated_at', 'desc');

        $withRelations = explode(',', $getUserRequest->with);
        $withRelations = array_unique($withRelations);

        foreach ($withRelations as $withRelation) {

            switch (strtolower($withRelation)) {

                case 'posts':

                    $users = $users->with([
                        'posts' => function($query){
                            $query->orderBy('created_at', 'desc')
                                  ->limit(1);
                        }
                    ]);
                    break;

                default:
                    break;

            }

        }

        if ($paginate) {
            $users = $users->paginate($per_page);
        } else {
            $users = $users->get();
        }

        return $users;

    }

    public function ping() {
        return "pong from UserRepository";
    }
}
