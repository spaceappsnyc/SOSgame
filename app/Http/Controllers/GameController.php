<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Character;
use App\Disaster;
use App\Emoji;
use \stdClass;
use Webpatser\Uuid\Uuid;

class GameController extends Controller
{
      public function start(Request $request)
      {

            $disaster = Disaster::find(rand(1,Disaster::count()));
            $character = Character::find(rand(1,Character::count()));

            $emoji = Emoji::where('character_id','=',$character->id)->get();
            $emoji = $emoji[rand(0,count($emoji)-1)];

            //return rand(0,10);

            $game = new stdClass();
            $game->id = Uuid::generate()->string;

            $game->disaster = $disaster;
            $game->disaster->generated_level = rand(1,3);

            $game->character = $character;
            $game->character->disabled = rand(0,1) == 0 ? 0 : 1;
            $game->emoji = $emoji;
            $game->emoji->url = "https://raw.githubusercontent.com/EmojiTwo/emojitwo/master/svg/".$emoji->code.".svg";

            return json_decode( json_encode($game), true);
      }
}
