<?php

namespace App\Http\Controllers;

use GusApi\Exception\InvalidUserKeyException;
use GusApi\Exception\NotFoundException;
use GusApi\GusApi;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class NipController extends Controller
{
    public function index(Request $request)
    {
        if ($request->filled('nip')) {

            if (App::environment('local')) {
                $gus = new GusApi('abcde12345abcde12345', 'dev');
            }

            if (App::environment('production')) {
                $gus = new GusApi(env('GUS_API'));
            }

            try {
                $nipToCheck = $request->input('nip');
                $gus->login();

                $gusReports = $gus->getByNip($nipToCheck);

                return view('nip')->withResults($gusReports)->withNip($nipToCheck);

            } catch (InvalidUserKeyException $exception) {
                return redirect()->route('home')->with('error', 'Bad user key.');
            } catch (NotFoundException $exception) {
                return redirect()->route('home')->with('error', 'Nie znaleziono podmiotu');
            }
        } else {
            return view('nip');
        }
    }
}
