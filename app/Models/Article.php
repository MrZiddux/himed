<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use \Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Database\QueryException;

class Article extends Model
{
    use HasFactory, Sluggable;
    
    protected $table = 'articles';
    protected $fillable = [
        'author', 'title', 'slug', 'thumbnail', 'content', 'tags'
    ];

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }


    public function checkSlug($request)
    {
        $slug = SlugService::createSlug(Article::class, 'slug', $request);
        return $slug;
    }

    public function create($payload)
    {
        try {
            $data = new Article();
            $data->author = $payload['author'];
            $data->title = $payload['title'];
            $data->tags = $payload['tags'];
            $data->slug = $payload['slug'];
            $data->thumbnail = $payload['thumbnail'];
            $data->content = $payload['content'];
            $data->save();
        } catch (QueryException $e) {
            dd($e->errorInfo);
        }
        return $data;
    }

    public function getDataBySlug($slug)
    {
        return $this->where('slug', $slug)->first();
    }

    public function getDataById($id)
    {
		return $this->findOrFail($id);
    }

    public function getDataArticle()
    {
        $data = Article::all();
        return $data;
    }

    public function updateArticle($payload, $id)
    {
        return $this->findOrFail($id)->update($payload);
    }

    public function deleteArticle($id)
    {
        return $this->findOrFail($id)->delete();
    }

    public function limitData($limit)
    {
        return $this->paginate($limit);
    }

    public function popularData()
    {
        return $this->orderBy('created_at', 'DESC')->get();
    }

    public function getDataByTags($tag, $limit)
    {
        return $this->where('tags', 'LIKE', '%'.$tag.'%')->paginate($limit);
    }

    public function getDataByTitle($keyword, $limit)
    {
        return $this->where('title', 'LIKE', '%'.$keyword.'%')->paginate($limit);
    }
}
