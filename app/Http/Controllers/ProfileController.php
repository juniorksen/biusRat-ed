<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests\InfoRequest;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Hash;
use App\Models\UserPhoto;
use App\Models\Caloria;
use App\Models\VideoEliminado;




class ProfileController extends Controller
{

    public function presentacion2(Request $request) // Add videos
    {
        // Validar que el archivo es un video y su tamaño máximo (100MB en este caso)
        $request->validate([
            'file' => 'required|file|mimes:mp4,avi,mkv|max:102400', // Tamaño máximo en KB
        ]);
    
        // Obtener el ID del usuario autenticado
        $userId = Auth::id();
        $fileName = time() . '.' . $request->file->extension();
        $request->file->move(public_path('videos'), $fileName);
    
        $userphotos = new UserPhoto;
        $userphotos->url_fotos = $fileName;
        $userphotos->user_id = $userId;
        $userphotos->save();
    
        return redirect()->route('ejercicios');
    }
    

    public function calorias() {
        $user = Auth::user();
        $calorias = Caloria::where('user_id', $user->id)->paginate(3);
        return view('calorias', compact('calorias'));
    }

    public function caloriascreate() {
        return view('caloriascreate');
    }

    public function storecalorias(InfoRequest $request) // Add videos
    {
        // Get the ID of the authenticated user
        $userId = Auth::id();
        $fileName = time() . '.' . $request->file->extension();
        $request->file->move(public_path('videos'), $fileName);

        $calorias = new Caloria;
        $calorias->titulo = $request->input('titulo');
        $calorias->descripcion = $request->input('descripcion'); 
        $calorias->url_comida = $fileName;
        $calorias->calorias = $request->input('calorias');
        $calorias->user_id = $userId;
        $calorias->save();

        return redirect()->route('ejercicios');
    }

    public function parques() {
        return view('parques');
    }

    public function showDeletedVideos()
    {
        // Obtener todos los videos eliminados
        $videosEliminados = VideoEliminado::all();

        // Pasar los videos eliminados a la vista
        return view('videosEliminado', compact('videosEliminados'));
    }
}
