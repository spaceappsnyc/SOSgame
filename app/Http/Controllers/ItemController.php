<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Item;

class ItemController extends Controller
{
      public function get()
      {
            $items = Item::all();
            foreach($items as $item)
            {
                  $item->emoji_url = "https://raw.githubusercontent.com/EmojiTwo/emojitwo/master/svg/".$item->emoji.".svg";
            }
            return $items;
      }
}
