<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostController extends Controller
{
    
    public function index()
    {
        $posts = $this->getPosts();
        return view('posts.index',[
            'posts' => $posts,
        ]);
    }

    public function create()
    {
        return view('posts.create');
    }

    public function show($postId)
    {
        $post = $this->getPost($postId);
        return $post
            ? view('posts.show', [ 'post' => $post ])
            : abort(404);
    }

    public function edit($postId)
    {
        $post = $this->getPost($postId);
        return $post
            ? view('posts.edit', [ 'post' => $post ])
            : abort(404);
    }
    public function store()
    {
        //fetch request data
        $requestData = request()->all();
     
        return redirect()->route('posts.index');
    }
    public function update($postId)
    {

        return redirect()->route('posts.index');
    }
    public function delete($postId)
    {
        return redirect()->route('posts.index');
    }

    public function getPosts(){

        return
        [
            ['id' => 1, 'title' => 'first post', 'description' => 'first post describtion', 'posted_by' => 'Asmaa', 'email' => 'asmaa11298@mail.com', 'created_at' => '2022-02-19 5:00:00'],
            ['id' => 2, 'title' => 'second post', 'description' => 'second post describtion', 'posted_by' => 'Ebrahim', 'email' => 'ebrahim@gmail.com', 'created_at' => '2022-02-19 06:00:30'],
        ];
    }

    public function getPost($id)
    {
        $posts = $this->getPosts();
        foreach ($posts as $post) {
            if ($post['id'] == $id) {
                return $post;
            }
        }
        return null;
    }
}

  

