<?php

namespace App\Controllers;

use App\Models\Tb_bookModel; //namespace memanggil model Tb_bookModel untuk $bookModel

class Books extends BaseController
{
    protected $Tb_bookModel;
    public function __construct()
    {
        //konek pakai model, dengan instansiasi kelas model di semua method ini
        $this->Tb_bookModel = new Tb_bookModel();
    }

    public function index()
    {
        //$bookData = $this->Tb_bookModel->query("Select * From tb_book");
        $data = [
            'title' => 'BOOK LIST',
            'book' => $this->Tb_bookModel->getBook()
        ];

        return view('books/v_books', $data);
    }

    public function detail($slug)
    {

        //$data = $this->Tb_bookModel->getBook($slug);
        $data = [
            'title' => 'BOOK DETAIL',
            'book' => $this->Tb_bookModel->getBook($slug)
        ];

        if (empty($data['book'])) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('The Book' . $slug . 'is can not find');
        }
        return view('books/v_bookdetail', $data);
        // $slugs = $this->Tb_bookModel->query("Select * From tb_book Where slug = '$slug'");
        // foreach ($slugs->getResultArray() as $b) {
        //     dd($b);
        // }
    }

    public function addbook()
    {
        //session();
        $data = [
            'title' => "ADD NEW BOOK",
            'validation' => \Config\Services::validation()
        ];

        return view('books/v_addbook', $data);
    }

    public function savebook()
    {
        if (!$this->validate([
            'book_title' => [
                'rules' => 'required|is_unique[tb_book.title]',
                'errors' => [
                    'required' => 'Book Title field can not empty ',
                    'is_unique' => 'Book Title already used in database '
                ]
            ]
        ])) {
            $validation = \Config\Services::validation();
            return redirect()->to('/books/addbook')->withInput()->with('validation', $validation);
        }

        $slug = url_title($this->request->getVar('book_title'), '-', true);
        $this->Tb_bookModel->save([
            'title' => $this->request->getVar('book_title'),
            'slug' => $slug,
            'author' => $this->request->getVar('author'),
            'publisher' => $this->request->getVar('publisher'),
            'category' => $this->request->getVar('category'),
            'cover' => $this->request->getVar('cover')
        ]);

        session()->setFlashdata('message', 'New Book added successfully.');

        return redirect()->to('/books');
    }

    public function delete($id)
    {
        $this->Tb_bookModel->delete($id);
        session()->setFlashdata('message', 'Book DELETED successfully.');
        return redirect()->to('/books');
    }

    public function form_updatebook($slug)
    {
        $data = [
            'title' => "EDIT / UPDATE BOOK",
            'validation' => \Config\Services::validation(),
            'book' => $this->Tb_bookModel->getBook($slug)
        ];

        return view('books/v_updatebook', $data);
    }

    public function updatebook($id)
    {
        // cek judulnya terlebih dahulu
        $oldbook = $this->Tb_bookModel->getBook($this->request->getVar('slug'));
        if ($oldbook['title'] == $this->request->getVar('book_title')) {
            $rule_title = 'required';
        } else {
            $rule_title = 'required|is_unique[tb_book.title]';
        }

        // validasi data, jika ada judul yang sama dan tidak diubah
        if (!$this->validate([
            'book_title' => [
                'rules' => $rule_title,
                'errors' => [
                    'required' => 'Book Title field can not empty ',
                    'is_unique' => 'Book Title already used in database '
                ]
            ]
        ])) {
            $validation = \Config\Services::validation();
            return redirect()->to('/books/form_updatebook/' . $this->request->getVar('slug'))->withInput()->with('validation', $validation);
        }

        $slug = url_title($this->request->getVar('book_title'), '-', true);
        $this->Tb_bookModel->save([
            'id' => $id,
            'title' => $this->request->getVar('book_title'),
            'slug' => $slug,
            'author' => $this->request->getVar('author'),
            'publisher' => $this->request->getVar('publisher'),
            'category' => $this->request->getVar('category'),
            'cover' => $this->request->getVar('cover')
        ]);

        session()->setFlashdata('message', 'Book Has Been Updated.');

        return redirect()->to('/books');
    }
}
