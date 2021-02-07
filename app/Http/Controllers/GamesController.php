<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Goutte\Client;

class GamesController extends Controller
{
    function list()
    {
    	$client = new Client();
    	$num = 1;  	

    	$crawler = $client->request('GET', 'https://store.steampowered.com/search/?sort_by=Reviews_DESC&maxprice=90&tags=5350&category1=998&supportedlang=norwegian&page=1');
    	$data = $crawler->filter('div.search_pagination_right > a')->each(function ($node) {
    		return $node->text();
    	});

    	$lastPage = $data[count($data)-2];
    	$games = array();
    	do
    	{
    		$crawler = $client->request('GET', 'https://store.steampowered.com/search/?sort_by=Reviews_DESC&maxprice=90&tags=5350&category1=998&supportedlang=norwegian&page='.$num);

			$data = $crawler->filter('div#search_resultsRows > a')->each(function ($node) {
				return $collection = collect([$node->attr('data-ds-appid') => [
								'image'=> $node->filter('img')->attr('src'),
								'title'=>$node->filter('span.title')->text(),
								'date'=>$node->filter('div.search_released')->text(),
								'price'=>$node->filter('div.search_price')->last()->text(),
								'review'=>$node->filter('span.search_review_summary')->attr('class'),							
						]]);
			});
			foreach($data as $item){
				foreach($item as $game)
				{
					if(strpos($game['title'], 'a') === false && strpos($game['review'], 'positive') !== false){
						array_push($games,$item);
					}
				}				
			}

			$num++;			
    	}while($num<=$lastPage);

		return view('games', ['data' => $games]);
    }
}
