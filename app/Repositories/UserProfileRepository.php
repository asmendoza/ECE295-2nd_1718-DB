<?php

namespace App\Repositories;

use App\Repositories\Contracts\UserProfileRepositoryInterface;
use App\Models\UserProfile;
use Carbon\Carbon;
use Illuminate\Http\Request;

class UserProfileRepository extends BaseRepository implements UserProfileRepositoryInterface
{

    protected $model;

    public function __construct(UserProfile $userProfile)
    {
        parent::__construct($userProfile);
        $this->model = $userProfile;
    }

}