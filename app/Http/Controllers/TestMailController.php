<?php

namespace App\Http\Controllers;

use App\Mail\TestMail;
use App\Mail\Testmarkdown;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class TestMailController extends Controller
{
     public function email()
     {
       /*    $user = [
               'email'=> 'brice@test.com',
               'name'=> 'christelle'
           ];
         Mail::to($user['email'])->send(new TestMail($user));
*/
          Mail::to('brice@test.com')->send(new Testmarkdown());
         return view('emails.ok');
     }
}
