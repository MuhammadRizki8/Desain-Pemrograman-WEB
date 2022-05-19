<?php echo $this->extend('template/v_template'); ?>
<?php echo $this->section('content'); ?>
<div class="container">
    <div class="row">
        <div class="col">
            <h2 class="mt-5 text-center">"<?php echo $book['title'] ?>" Book Detail</h2>
            <div class="card mx-auto" style="max-width: 800px;">
                <div class="row no-gutters">
                    <div class="col-md-12">
                        <div class="card-body">
                            <h5 class="card-title">Book Title : <?php echo $book['title']; ?></h5>
                            <p class="card-text"><b>Author : </b><?php echo $book['author']; ?></p>
                            <p class="card-text"><b>Publisher : </b><?php echo $book['publisher']; ?></p>
                            <p class="card-text"><b>Category : </b><?php echo $book['category']; ?></p>
                            <!-- <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p> -->
                            <a href="/books/form_updatebook/<?php echo $book['slug']; ?>" class="btn btn-warning">Edit</a>
                            <!-- delete dengan kondisi tidak memunculkan di url -->
                            <form action="/books/<?php echo $book['id']; ?>" method="POST" class="d-inline">
                                <?php echo csrf_field(); ?>
                                <input type="hidden" name="_method" value="DELETE">
                                <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure want to DELETE this book ?'); ">Delete</button>
                            </form>
                            <a href="/books" class="btn btn-info">Back to List</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php echo $this->endSection('contetn'); ?>