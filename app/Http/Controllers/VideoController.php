<?php

namespace App\Http\Controllers;

use App\Http\Requests\InfoRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Hash;
use App\Models\Video;
use App\Models\User;
use App\Models\UserPhoto;
use Illuminate\Support\Facades\DB;
use App\Models\Caloria;
use Illuminate\Support\Facades\Validator;

class VideoController extends Controller
{
    public function ejercicios()
    {
        $user = Auth::user();
        $videos = Video::where('user_id', $user->id)->paginate(5);
        return view('ejercicios', compact('videos'));
    }
    
    public function index()
    {
        return view('index');
    }

    public function create()
    {
        return view('create');
    }

    public function login()
    {
        return view('login');
    }

    public function presentacion (){
        return view('presentacion');
    }


    

    public function store(InfoRequest $request) // Add videos
    {
        // Get the ID of the authenticated user
        $userId = Auth::id();
        $fileName = time() . '.' . $request->file->extension();
        $request->file->move(public_path('videos'), $fileName);

        $video = new Video;
        $video->titulo = $request->input('titulo'); // Access using input()
        $video->descripcion = $request->input('descripcion'); // Access using input()
        $video->url_video = $fileName;
        $video->user_id = $userId;
        $video->save();

        return redirect()->route('ejercicios');
    }


    public function destroy($id)
    {
        try {
            DB::beginTransaction();

            DB::statement('CALL eliminar_video(?)', [$id]);

            DB::commit();

            return redirect()->route('ejercicios')->with('success', 'Video eliminado correctamente.');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->route('ejercicios')->with('error', 'Ocurrió un error al eliminar el video.');
        }
    }


    public function loginStore(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        $fileName = null; // Initialize filename as null

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        Auth::login($user);

        return redirect()->intended('ejercicios');
    }


    

    public function iniciar(Request $request) // Initiate session
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            // Authentication passed...
            return redirect()->intended('ejercicios'); // Redirect to 'ejercicios' route after successful login
        }

        return redirect()->back()->withErrors(['email' => 'These credentials do not match our records']);
    }

    public function Registrarse() // Registration function (fix casing)
    {
        return view('Registrarse');
    }

    public function logout()
    {
        Auth::logout(); // Log out the current user

        return redirect('/'); // Redirect the user to the home page
    }
    
    public function todos()
    {
        $usuariosConVideos = User::with('videos', 'UserPhoto')->whereHas('videos')->get();
    
        return view('todos')->with('usuariosConVideos', $usuariosConVideos);
    }
    


        public function mostrarVideosUsuario($usuarioId)
    {
        $usuario = User::findOrFail($usuarioId);
        $videos = $usuario->videos()->paginate(5);
        $calorias = Caloria::where('user_id', $usuarioId)->paginate(3);
        return view('mostrarVideosUsuario', compact('usuario', 'videos', 'calorias'));
    }


}
