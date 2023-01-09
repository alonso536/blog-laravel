<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use App\Models\User;

class ImageController extends Controller
{
    public function store(Request $request) {
        $user = User::find(Auth::id());

        $request->validate([
            'image' => ['required', 'image', 'max:2048']
        ]);

        $image = $request->file('image');
        $imageName = time().$image->getClientOriginalName();

        Storage::disk('images')->put($imageName, File::get($image));

        $user->update([
            'image' => $imageName
        ]);

        return to_route('users.profile', Auth::user()->username);
    }

    public function show($filename) {
        $file = Storage::disk('images')->get($filename);
        return new Response($file, 200);
    }

    public function update(Request $request, $filename) {
        Storage::disk('images')->delete($filename);
        $this->store($request);
        return to_route('users.profile', Auth::user()->username);
    }

    public function destroy($filename) {
        Storage::disk('images')->delete($filename);

        $user = User::find(Auth::id());
        $user->update([
            'image' => null
        ]);

        return to_route('users.profile', Auth::user()->username);
    }
}
