<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ArticleRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $status = $this->request->all()['status'];

        if ($status == 'update') {
            $array =  [
                'author' => 'required',
                'title' => 'required',
                'tags' => 'required',
                'tags.*' => 'required',
                'thumbnail' => 'image|mimes:jpg,jpeg,png',
                'content' => 'required',
            ];
        } else {
            $array = [
                'author' => 'required',
                'title' => 'required',
                'tags' => 'required',
                'tags.*' => 'required',
                'thumbnail' => 'required|image|mimes:jpg,jpeg,png',
                'content' => 'required',
            ];
        }

        return $array;
    }
}
