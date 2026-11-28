<?php

namespace App\Services;

use App\Models\PhotoCategory;
use App\Models\Photo;

class PhotosService
{

    public function getAllPhotos($per_page = -1)
    {
        if($per_page == -1){
            return Photo::orderBy('created_at', 'desc')->get();    
        }
        return Photo::orderBy('created_at', 'desc')->paginate($per_page);
    }

    public function getPhotoById($id)
    {
        return Photo::find($id);
    }

    public function create($data)
    {
        return Photo::create($data);
    }

    public function update($photo, $data)
    {
        return $photo->update($data);
    }

    public function delete($photo)
    {
        return $photo->delete($photo);
    }

    public function getAllPhotoCategories($per_page = -1)
    {
        if($per_page == -1){
            return PhotoCategory::orderBy('created_at', 'desc')->get();    
        }
        return PhotoCategory::orderBy('created_at', 'desc')->paginate($per_page);
    }

    public function getPhotoCategoryById($id)
    {
        return PhotoCategory::find($id);
    }
    
    public function create_photo_category($data)
    {
        return PhotoCategory::create($data);
    }

    public function update_photo_category($photo_category, $data)
    {
        return $photo_category->update($data);
    }

    public function delete_photo_category($photo_category)
    {
        return $photo_category->delete($photo_category);
    }

    public function getPhotosByCatId($id)
    {
        return Photo::where('category_id', $id)->get();
    }
    
}
