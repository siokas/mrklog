<?php

namespace App\Http\Middleware;

use App\Models\Post as Post;
use Closure;
use DB;
use App\Repositories\PostRepository;
use Auth;

class UpdateAuth
{

    private $postRepository;

    public function __construct(PostRepository $postRepo) {
        $this->postRepository = $postRepo;
    }

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $id = substr(substr(substr($request->url(), strpos($request->url(), 'posts/')), strpos(substr($request->url(), strpos($request->url(), 'posts/')), '/') + 1),0,strpos(substr(substr($request->url(), strpos($request->url(), 'posts/')), strpos(substr($request->url(), strpos($request->url(), 'posts/')), '/') + 1),'/'));
        $input = $request->all();

        if(! Auth::user()){
            if(! $input){
                return redirect('pin/'. $id);
            }else{
                $pin = $input['pin'];
                $post = $this->postRepository->find($id);
                if($pin == $post->pin) return $next($request); else return redirect(route('posts.index'));
            }
        }else{
                $post = $this->postRepository->find($id);
                if($post->user_id != Auth::user()->id) return redirect(route('posts.index'));
            }

        return $next($request);
    }
}
