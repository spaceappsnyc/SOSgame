<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Character;
use App\Disaster;
use App\Emoji;
use App\Decision;
use App\Game;
use App\CharacterGame;
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
            $game->disaster_proximity = rand(0,1) == 0 ? 0 : 1;

            $disaster = Disaster::find(rand(1,Disaster::count()));
            $game->disaster = $disaster;
            $game->disaster->generated_level = rand(1,3);

            $game->characters = $characters;


            // SAVE GAME SESSION

            $game_session = new Game();
            $game_session->id = $game->id;
            $game_session->disaster_id = $disaster->id;
            $game_session->disaster_proximity = $game->disaster_proximity;
            $game_session->save();

            $game_session = Game::find($game->id);

            foreach($characters as $c)
            {
                  $cg = new CharacterGame;
                  $cg->character_id=1;
                  $cg->game_id=$game->id;
                  $cg->save();
            }



            return json_decode(json_encode($game), true);

      }

      public function getGame($id)
      {
            //$game_id = $req->input('game_id');
            //$stay_leave = $req->input('stay_leave');

            $game = Game::with('disaster')->where('id','=',$id)->first();
            return $game;

      }

      public function generateActions(Request $req)
      {
            $game_id = $req->input('game_id');
            $stay_leave = $req->input('stay_leave');

            $game = Game::where('id','=',$req->input('game_id'))->first();
            $disaster = $game->disaster;

            //CORRECT DECISIONS
            $correct_decisions = $disaster->decisions()->wherePivot('stay_go',$stay_leave)->get()->all();
            shuffle($correct_decisions);
            $correct_decisions = array_slice($correct_decisions,0,5);

            $wrong_decisions = [];

            //WRONG DECISIONS
            $all_decisions = Decision::all();
            foreach($all_decisions as $d)
            {
                  $e = false;
                  foreach($correct_decisions as $cd)
                  {
                        if($cd->id == $d->id)
                        {
                              $e = true;
                              break;
                        }
                  }
                  if(!$e) $wrong_decisions[] = $d;
            }

            shuffle($wrong_decisions);
            $wrong_decisions = array_slice($wrong_decisions,0,5);
            $decisions = array_merge($wrong_decisions,$correct_decisions);
            shuffle($decisions);
            shuffle($decisions);
            return $decisions;

      }

}
