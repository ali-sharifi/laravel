<?php

namespace App\Http\Controllers;

use Session;
use Request;
use App\User;
use App\Note;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class NotesController extends Controller
{
    public function index()
    {
        return view('index');
    }

    public function showRegister()
    {
        return view('register');
    }

    public function showNotes()
    {
        $user = \App\User::where('email', Session::get('email'))->first();
        $notes = \App\Note::where('user_id', $user->id)->first();
        //return $notes;
        return view('notes')->with('notes', $notes);
    }

    public function saveNotes()
    {
        $input = \Input::all();
        $user = \App\User::where('email', Session::get('email'))->first();
        $notes = \App\Note::where('user_id', $user->id)->first();
        $note = \input::get('notes');
        $site = null;

        for ($i = 1; $i < count($input); $i++) {
            if (array_key_exists("website" . $i, $input)) {
                if (strlen(\input::get('website' . $i)) > 0) {
                    $site = $site . \input::get('website' . $i);
                    $site = $site . "\r\n";
                }
            }
        }
        $tbd = \input::get('tbd');

        $image = \Input::file('file');
        $file = null;
        if ($image != null) {
            $file = file_get_contents($image);
        }

        if ($notes == null) {
            $notes = Note::create(array(
                'note' => $note,
                'website' => $site,
                'tbd' => $tbd,
                'user_id' => $user->id,
                'image1' => $file
            ));
        } else {
            $notes->note = $note;
            $notes->website = $site;
            $notes->tbd = $tbd;
            $notes->user_id = $user->id;
            if ($notes->image1 == null) {

                $notes->image1 = $file;
            } elseif
            ($notes->image2 == null
            ) {

                $notes->image2 = $file;
            } elseif
            ($notes->image3 == null
            ) {

                $notes->image3 = $file;
            } elseif
            ($notes->image4 == null
            ) {

                $notes->image4 = $file;
            }
            $notes->save();
        }

        if (\input::get('delete1') == 1) {
            $notes->image1 = null;
            $notes->save();
        }
        if (\input::get('delete2') == 1) {
            $notes->image2 = null;
            $notes->save();
        }
        if (\input::get('delete3') == 1) {
            $notes->image3 = null;
            $notes->save();
        }
        if (\input::get('delete4') == 1) {
            $notes->image4 = null;
            $notes->save();
        }
        return view('notes')->with('notes', $notes);
    }

    public function forgotPassword()
    {
        return view('forgotPassword');
    }

    public function logout()
    {
        Auth::logout();
        return Redirect::to('/');
    }

    public function register()
    {
        $rules = array(
            'email' => 'required|email',
            'password' => 'required|alphaNum|min:3|confirmed',
            'password_confirmation' => 'required|min:3',
            'captcha' => 'required|captcha'
        );

        $validator = \Validator::make(\Input::all(), $rules);

        if ($validator->fails()) {
            return \Redirect::to('/register')
                ->withErrors($validator)
                ->withInput(\Input::except('password', 'password_confirmation'));
        } else {
            $email = \input::get('email');
            $pass = \input::get('password');
            User::create(array(
                'email' => $email,
                'password' => Hash::make($pass),
            ));
            //Session::flush();
            Session::put('login', '1');
            Session::put('email', \Input::get('email'));
            return \Redirect::to('/notes');
        }
    }

    public function login()
    {
        // validate the info, create rules for the inputs
        $rules = array(
            'email' => 'required|email', // make sure the email is an actual email
            'password' => 'required|alphaNum|min:3' // password can only be alphanumeric and has to be greater than 3 characters
        );

        // run the validation rules on the inputs from the form
        $validator = \Validator::make(\Input::all(), $rules);

        // if the validator fails, redirect back to the form
        if ($validator->fails()) {
            return \Redirect::to('/')
                ->withErrors($validator)// send back all errors to the login form
                ->withInput(\Input::except('password')); // send back the input (not the password) so that we can repopulate the form
        } else {

            // create our user data for the authentication
            $userdata = array(
                'email' => \Input::get('email'),
                'password' => \Input::get('password')
            );

            // attempt to do the login
            if (\Auth::attempt($userdata)) {

                // validation successful!
                // redirect them to the secure section or whatever
                // return Redirect::to('secure');
                // for now we'll just echo success (even though echoing in a controller is bad)
                //echo 'SUCCESS!';
                Session::put('login', '1');
                Session::put('email', \Input::get('email'));
                return \Redirect::to('/notes');

            } else {

                // validation not successful, send back to form
                return \Redirect::to('/')
                    ->withErrors(['Email or Password is incorrect', 'The Message'])
                    ->withInput(\Input::except('password'));

            }

        }
    }
}
