<?php

namespace App\Models;

use CodeIgniter\Model;

class Tb_bookModel extends Model
{
    protected $table = 'tb_book';
    protected $useTimestamps = true;
    protected $allowedFields = ['title', 'slug', 'author', 'publisher', 'category'];

    public function getBook($slug = false)
    {
        if ($slug == false) {
            return $this->findAll();
            //$bookData = $this->Tb_bookModel->query("Select * From tb_book");
            //return $bookData;
        }

        return $this->where(['slug' => $slug])->first();
        //$slugs = $this->Tb_bookModel->query("Select * From tb_book Where slug = '$slug'");
        //return $slugs;
    }
}
