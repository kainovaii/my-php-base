<div class="content">
    <div class="bg-dark text-secondary px-4 text-center">
        <div class="py-5">
            <h1 class="display-5 fw-bold text-white">Blog</h1>
        </div>
    </div>
    <div class="container mt-3">
        <a class="btn btn-primary" href="/blog/create">Create</a>
    </div>
    <div class="container mt-3">
        <div class="row">
            <?php foreach ($articles as $article) { ?>
            <div class="col-md-4">
                <div class="card shadow-sm">
                    <div class="card-body">
                        <p><strong><?= $article->title ?></strong></p>
                        <p class="card-text"><?= $article->content ?></p>
                        <div class="d-flex justify-content-between align-items-center">
                        <div class="btn-group">
                            <a href="/blog/<?= $article->id ?>" class="btn btn-sm btn-outline-secondary">View</a>
                        </div>
                        <small class="text-body-secondary"><?= $article->author ?></small>
                        </div>
                    </div>
                </div>
            </div>
            <?php } ?>
        </div>
    </div>
</div>