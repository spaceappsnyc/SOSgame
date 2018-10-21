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

            // ADD CONDITION OF A MINIMUM OF 1 ADULT / SENIOR

            $characters = Character::get()->all();
            shuffle($characters);

            $characters = array_slice($characters, 0, rand(1,3));

            foreach($characters as $c){
                  $c->disabled = rand(0,1) == 0 ? 0 : 1;
                  $emoji = Emoji::where('character_id','=',$c->id)->get();
                  $emoji = $emoji[rand(0,count($emoji)-1)];
                  $emoji->url = "https://raw.githubusercontent.com/EmojiTwo/emojitwo/master/svg/".$emoji->code.".svg";
                  $c->emoji = clone $emoji;
            }

            $game = new stdClass();
            $game->id = Uuid::generate()->string;

            $disaster = Disaster::find(rand(1,Disaster::count()));
            $game->disaster = $disaster;
            $game->disaster->generated_level = rand(1,3);

            $game->characters = $characters;

            return json_decode(json_encode($game), true);

      }

}
