<?php echo $this->extend('template/v_template'); ?>
<?php echo $this->section('content'); ?>
<div class="container">
    <div class="row">
        <div class="col-8">
            <h2 class="my-3">Update Book Form</h2>
            <form action="/books/updatebook/<?php echo $book['id']; ?>" method="POST">
                <!--menghalangi pembajakan dari form lain -->
                <?php echo csrf_field(); ?>
                <!-- ini untuk slug disembunyikan, karena bukan inputan user -->
                <input type="hidden" name="slug" value="<?php echo $book['slug']; ?>">

                <div class="form-group row">
                    <label for="book_title" class="col-sm-3 col-form-label">Book Title</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control <?php echo ($validation->hasError('book_title')) ? 'is-invalid' : ''; ?>" id="book_title" name="book_title" autofocus value="<?php echo (old('book_title')) ? old('book_title') : $book['title'] ?>">
                        <div class="invalid-feedback">
                            <?php echo $validation->getError('book_title'); ?>
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="author" class="col-sm-3 col-form-label">Author</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="pubisher" name="author" value="<?php echo (old('author')) ? old('author') : $book['author'] ?>">
                    </div>
                </div>
                <div class=" form-group row">
                    <label for="publisher" class="col-sm-3 col-form-label">Pubisher</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="pubisher" name="publisher" value="<?php echo (old('publisher')) ? old('publisher') : $book['publisher'] ?>">
                    </div>
                </div>
                <div class=" form-group row">
                    <label for="category" class="col-sm-3 col-form-label">Category</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="category" name="category" value="<?php echo (old('category')) ? old('category') : $book['category'] ?>">
                    </div>
                </div>
                <div class=" form-group row">
                    <label for="cover" class="col-sm-3 col-form-label">Book Cover</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="cover" name="cover" value="<?php echo (old('cover')) ? old('cover') : $book['cover'] ?>">
                    </div>
                </div>
                <div class=" form-group row">
                    <div class="col-sm-9">
                        <button type="submit" class="btn btn-primary">Update Book</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<?php echo $this->endSection('content'); ?>