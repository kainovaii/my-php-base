<div class="container mt-3">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <form action="/api/blog/edit" method="POST">
                <input type="hidden" name="author" value="<?= $article->author ?>">
                <input type="hidden" name="id" value="<?= $article->id ?>">
                <div class="row">
                    <div class="col-md-12 mt-2">
                        <div class="form-group">
                            <label>Title</label>
                            <input class="form-control" type="text" name="title" value="<?= $article->title ?>">
                        </div>
                    </div>
                    <div class="col-md-12 mt-2">
                        <div class="form-group">
                            <label>Content</label>
                            <textarea style="height: 300px;" class="form-control" name="content"><?= $article->content ?></textarea>
                        </div>
                    </div>
                    <div class="col-md-12 mt-2">
                        <button class="btn btn-primary" type="submit">Edit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>