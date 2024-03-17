<?php

use Illuminate\Support\Facades\Route;
use App\Events\message;

Route::get('/', function () {
    return view('pusher');
});

Route::get('/sms', function () {
    $data['donor_name'] = 'Nasir khan';
    $data['donor_amount'] = '10.05';
    event(new message($data));
     dd('event fired');
});
