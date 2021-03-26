<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reward;
use App\Models\User;

class KidRewardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(User $user)
    {
        $data['rewards'] = Reward::latest()->get();
        $data['user'] = $user;
        return view('reward.entrant.index', $data);
    }

    public function claim_reward(User $user, Reward $reward)
    {
        $avialable_stars = $user->available_stars();
        $stars_required = $reward->stars_required;
        if ($avialable_stars > 0 && $avialable_stars >= $stars_required) {

            /*
            $user->claimed_rewards()->create([
                'reward_id' => $reward->id,
                'stars_used' => $reward->stars_required
            ]);
            */

            $user->claimed_rewards()->attach(
                $reward->id,
                [
                    'stars_used' => $reward->stars_required
                ]
            );
        }

        return back();
    }
}
