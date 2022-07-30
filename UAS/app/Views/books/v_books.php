<?php echo $this->extend('template/v_template'); ?>

<?php echo $this->section('content'); ?>
<div class="container">
    <div class="row">
        <div class="col">
            <h1>BOOKLIB | Book List</h1>
            <hr>
            <a href="/books/addbook" class="btn btn-primary mb-2">Add Book</a>
            <!-- menampilkan pesan telah berhasl menambahkan data -->
            <?php if (session()->getFlashdata('message')) { ?>
                <div class="alert alert-success" role="alert">
                    <?php echo session()->getFlashdata('message'); ?>
                </div>
            <?php } ?>
            <table class="table table-hover">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Book Title</th>
                        <th scope="col">Author</th>
                        <th scope="col">Publisher</th>
                        <th scope="col">Category</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $no = 1;
                    foreach ($book as $b) :
                        //foreach ($book->getResultArray() as $b) : 
                    ?>
                        <tr>
                            <th scope="row"><?php echo $no++ ?></th>
                            <td><?php echo $b['title']; ?></td>
                            <td><?php echo $b['author']; ?></td>
                            <td><?php echo $b['publisher']; ?></td>
                            <td><?php echo $b['category']; ?></td>
                            <td>
                                <a href="/books/detail/<?php echo $b['slug']; ?>" class="btn btn-success">Details</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?php echo $this->endSection('content'); ?>