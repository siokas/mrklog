<?php

namespace App\Repositories;

use App\Models\Post;
use Prettus\Repository\Eloquent\BaseRepository;
use Conner\Tagging\Taggable;

class PostRepository extends BaseRepository
{
    use Taggable;
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'title',
        'article',
        'author'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Post::class;
    }
}
