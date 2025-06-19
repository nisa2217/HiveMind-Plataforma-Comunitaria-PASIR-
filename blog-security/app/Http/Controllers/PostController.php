<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except(['index', 'show']);
    }

    public function show(Post $post)
    {
        return view('posts.show', compact('post'));
    }

    public function index()
    {
        $posts = Post::latest()->paginate(10);
        return view('posts.index', compact('posts'));
    }

    public function create()
    {
        return view('posts.create');
    }

    public function edit(Post $post)
    {
        return view('posts.edit', compact('post'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|max:255',
            'description' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
    
        // Guardar en public/images/posts
        $imageName = time().'.'.$request->image->extension(); 
        $request->image->move(public_path('images/posts'), $imageName);
    
        Post::create([
            'title' => $request->title,
            'description' => $request->description,
            'image' => 'posts/'.$imageName, // Guardamos solo la ruta relativa
            'user_id' => auth()->id()
        ]);
    
        return redirect()->route('posts.index')
            ->with('success', 'Artículo creado exitosamente!');
    }
    
    public function update(Request $request, Post $post)
    {
        $validated = $request->validate([
            'title' => 'required|max:255',
            'description' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
    
        if ($request->hasFile('image')) {
            // Eliminar imagen anterior si existe
            if ($post->image) {
                $oldImagePath = public_path('images/'.$post->image);
                if (file_exists($oldImagePath)) {
                    unlink($oldImagePath);
                }
            }
            
            // Guardar nueva imagen
            $imageName = time().'.'.$request->image->extension(); 
            $request->image->move(public_path('images/posts'), $imageName);
            $validated['image'] = 'posts/'.$imageName;
        }
    
        $post->update($validated);
    
        return redirect()->route('posts.show', $post)
            ->with('success', 'Post actualizado correctamente');
    }
    
    public function destroy(Post $post)
    {
        // Eliminar la imagen asociada si existe
        if ($post->image) {
            $imagePath = public_path('images/'.$post->image);
            if (file_exists($imagePath)) {
                unlink($imagePath);
            }
        }
        
        $post->delete();
    
        return redirect()->route('posts.index')
            ->with('success', 'Post eliminado correctamente');
    }
}