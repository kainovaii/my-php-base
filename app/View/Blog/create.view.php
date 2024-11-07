<div class="container mt-3">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <form action="/api/blog/create" method="POST">
                <div class="row">
                    <div class="col-md-6 mt-2">
                        <div class="form-group">
                            <label>Title</label>
                            <input class="form-control" type="text" name="title" placeholder="Enter title...">
                        </div>
                    </div>
                    <div class="col-md-6 mt-2">
                        <div class="form-group">
                            <label>Slug</label>
                            <input class="form-control" type="text" name="slug" placeholder="Enter slug...">
                        </div>
                    </div>
                    <div class="col-md-12 mt-2">
                        <div class="form-group">
                            <label>Content</label>
                            <textarea style="height: 300px;" class="form-control" name="content" placeholder="Enter content..."></textarea>
                        </div>
                    </div>
                    <div class="col-md-12 mt-2">
                        <button class="btn btn-primary" type="submit">Create</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>