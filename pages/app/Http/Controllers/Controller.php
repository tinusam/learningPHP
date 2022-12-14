<?php
 
namespace App\Http\Controllers;
 
use Event;
use App\Podcast;
use App\Events\PodcastWasPurchased;
use App\Http\Controllers\Controller;
 
class UserController extends Controller
{
    /**
     * Show the profile for the given user.
     *
     * @param  int  $userId
     * @param  int  $podcastId
     * @return Response
     */
    public function purchasePodcast($userId, $podcastId)
    {
        $podcast = Podcast::findOrFail($podcastId);
 
        // Purchase podcast logic...
 
        event(new PodcastWasPurchased($podcast));
    }
}