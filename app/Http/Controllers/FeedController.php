<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Dog;
use Response;
use App\Http\Requests;

class FeedController extends Controller
{
    public function index($code) {
		
		try {
			$statusCode = 200;
			$response = [
				'feed' => []
			];

			// Code must have the correct length
			if (sizeof($code) == 10) {

				$atr = str_split($code);
				$weight = array(
					'noise_weight' => ord($atr[0]) - 65,
					'activity_weight' => ord($atr[2]) - 65,
					'friend_weight' => ord($atr[4]) - 65,
					'train_weight' => ord($atr[6]) - 65,
					'health_weight' => ord($atr[8]) - 65
				);

				$score = array(
					'noise_score' => $atr[1],
					'activity_score' => $atr[2],
					'friend_score' => $atr[3],
					'train_score' => $atr[4],
					'health_score' => $atr[5]
				);

				$response['feed'] = [
					'noise' => $score['noise_weight']
				];

				/*$selection = Dog::where('noise_level',$atr[0])
						->where('activity_level',$atr[1])
						->where('friend_level',$atr[2])
						->where('train_level',$atr[3])
						->where('health_level',$atr[4])
						->get();*/

				/*foreach($selection as $dog){

	                $response['feed'][] = [
	                	'id' => $dog->id,
	                    'name' => $dog->name,
	                ];
	            }*/

			} else {

				throw new Exception("Error Processing Request", 1);

			}
		} catch (Exception $e) {
			$statusCode = 400;
		} finally {
			return Response::json($response['feed'], $statusCode);
		}
	}
}
