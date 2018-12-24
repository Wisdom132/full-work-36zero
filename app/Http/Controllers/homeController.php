<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;


class homeController extends Controller
{
    public function index()
    {
    	return view('index');
    }

    public function home()
    {
      return view('home');
  }

  public function footprint()
  {
   return view('clients');
}

public function musing()
{
    $posts = Post::orderBy('created_at', 'desc')->paginate(6);
    return view('musing', compact('posts'));
}

public function posts($slug)
{
    $related = Post::inRandomOrder()->take(3)->get();
    $posts = Post::where('slug', $slug)->first();
    return view('/posts', compact('posts', 'related'));
}

public function related($slug)
{
    $related =  Post::inRandomOrder()->take(3)->get();
    return view('partials.related', compact('related'));
}

public function contact()
{
  return view('contact');
}

public function mail(Request $request)
{
    $this->validate($request, [
        'email' => 'required|email',
        // 'name' => 'required',
        'subject' => 'required|min:5',
        'body' => 'required|min:10'
    ]);

    $data = [
        'email' => $request->email,
        // 'name' => $request->name,
        'subject' => $request->subject,
        'body' => $request->body,
    ];

    Mail::send('emails.send', $data, function($message) use ($data) {
        $message->from($data['email']);
        $message->to('excellentloaded@gmail.com');
        $message->subject($data['subject']);
        
    });
        
        Session::flash('success', 'Email sent successfully');
        return redirect(route('contact'));
    }
}
