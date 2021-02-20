<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reward;
use App\Models\Kid;

class KidRewardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(Kid $kid)
    {
        $data['rewards'] = Reward::latest()->get();
        $data['kid'] = $kid;
        return view('reward.entrant.index', $data);
    }

    public function claim_reward(Kid $kid, Reward $reward)
    {
        $avialable_stars = $kid->available_stars();
        $stars_required = $reward->stars_required;
        if ($avialable_stars > 0 && $avialable_stars >= $stars_required) {


            $kid->claimed_rewards()->create([
                'reward_id' => $reward->id,
                'stars_used' => $reward->stars_required
            ]);
        }

        return back();
    }
}
