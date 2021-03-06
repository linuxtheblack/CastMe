<?php

namespace App\Listeners;

use App\ProfileDetails;
use Illuminate\Auth\Events\Registered;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Log;

class CreateProfileDetails {
  /**
   * Create the event listener.
   *
   * @return void
   */
  public function __construct() {
    //
  }

  /**
   * Handle the event.
   *
   * @param  Registered $event
   *
   * @return void
   */
  public function handle(Registered $event) {
    $details          = ProfileDetails::create();
    $details->user_id = $event->user->id;
    $details->save();
  }
}
