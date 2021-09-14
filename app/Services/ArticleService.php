<?php 

namespace App\Services;

use App\Models\Article;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use DomDocument;

use function PHPUnit\Framework\isNull;

class ArticleService
{	
	private $articleService;

  public function __construct()
  {
    $this->Article = new Article();
  }

  public function getData()
  {
    return $this->Article->getDataArticle();
  }

  public function getDataSlug($slug)
  {
    return $this->Article->getDataBySlug($slug);
  }

  private function imageHandler($payload)
  {
    $filename = null;
    if($payload->hasfile('thumbnail')) {
      $file = $payload->file('thumbnail');
      $filename = rand() . '.' . $file->getClientOriginalExtension();
      $file->move(public_path('images/uploads/articles'), $filename);
    }

    return $filename;
  }

  private function contentImgHandler($payload)
  {
    /**
     * Body untuk konten
     */
    $dom = new DomDocument();
    libxml_use_internal_errors(true);
    $dom->loadHtml($payload->content, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);
    libxml_clear_errors();
    $images = $dom->getElementsByTagName('img');
    
    foreach($images as $k => $img){
        $data = $img->getAttribute('src');
        if(Str::length($data) > 100) {
          list($type, $data) = explode(';', $data);
          $list = list(, $data)      = explode(',', $data);
          $data = base64_decode($data);
          
          $image_name = "/images/uploads/articles/". Str::random(9).time().$k.'.png';
          $path = public_path().$image_name;
          File::put($path,$data);
      
          $img->removeAttribute('src');
          $img->setAttribute('src', $image_name);
        } 
        // else {
        //   File::put(public_path($data),$data);
        // }
    }
    $content = $dom->saveHTML();
    return $content;
  }

  private function removeReplaceImg($payload, $id = null)
  {
    $data = $this->Article->getDataById($id);
    if($payload->hasfile('thumbnail')) {
      
      File::delete(public_path('images/uploads/articles/'.$data->thumbnail));
    }
		// $content = $data->content;
    // $dom = new DomDocument();
    // libxml_use_internal_errors(true);
    // $dom->loadHtml($content, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);
    // libxml_clear_errors();
    // $images = $dom->getElementsByTagName('img');
		
		// foreach ($images as $img) {
    //     $data = $img->getAttribute('src');
    //     File::delete(public_path($data));
    // }
  }

  public function createData($payload)
  {
    
    $file = $payload->file('thumbnail');
    $filename = rand() . '.' . $file->getClientOriginalExtension();
    $file->move(public_path('images/uploads/articles'), $filename);
    
    /**
     * Body untuk konten
     */
    $dom = new DomDocument();
    libxml_use_internal_errors(true);
    $dom->loadHtml($payload->content, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);
    libxml_clear_errors();
    $images = $dom->getElementsByTagName('img');
    
    foreach($images as $k => $img){
        $data = $img->getAttribute('src');
        list($type, $data) = explode(';', $data);
        $list = list(, $data)      = explode(',', $data);
        $data = base64_decode($data);
        
        $image_name = "/images/uploads/articles/". Str::random(9).time().$k.'.png';
        $path = public_path().$image_name;
        $thefile = File::put($path,$data);
    
        $img->removeAttribute('src');
        $img->setAttribute('src', $image_name);
    }

    $content = $dom->saveHTML();

    $slug = $this->Article->checkSlug($payload->title);

    $tags = implode('|', $payload->tags);

    $payload = [
        'author' => $payload->author,
        'title' => $payload->title,
        'tags' => $tags,
        'slug' => $slug,
        'thumbnail' => $filename,
        'content' => $content,
    ];

		return $this->Article->create($payload);
  }

  public function updateData($payload, $id)
  {
    $this->removeReplaceImg($payload, $id);
    $filename = $this->imageHandler($payload);
    $content = $this->contentImgHandler($payload);
    $tags = implode('|', $payload->tags);
    if($filename == null) {
      $filename = $this->Article->getDataById($id)->thumbnail;
      $data = [
        'author' => $payload->author,
        'title' => $payload->title,
        'tags' => $tags,
        'thumbnail' => $filename,
        'content' => $content,
      ];
    } else {
      $data = [
        'author' => $payload->author,
        'title' => $payload->title,
        'tags' => $tags,
        'thumbnail' => $filename,
        'content' => $content,
      ];
    }

    return $this->Article->updateArticle($data, $id);
  }

  public function deleteData($id)
  {
    $data = $this->Article->getDataById($id);
		
    File::delete(public_path('images/uploads/articles/'.$data->thumbnail));
		
		$content = $data->content; 
		$dom = new DomDocument();
    libxml_use_internal_errors(true);
    $dom->loadHtml($content, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);
    libxml_clear_errors();
    $images = $dom->getElementsByTagName('img');
		
		foreach ($images as $img) {
        $data = $img->getAttribute('src');
        File::delete(public_path($data));
    }

		return $this->Article->deleteArticle($id);
  }
}