<?php use Core\Http\Service\Service ?>
<div class="container mt-3">
   <h2><?= $article->title ?></h2> 
   <p><?= $article->content ?></p>
   <ul class="list-inline d-flex p-0">
      <li class="p-2"><strong><?= $article->author ?></strong></li>
   </ul>
   <ul class="list-inline d-flex p-0">
      <?php if (Service::get()->loggedUser->getUserIdentifier() == $article->author) { ?>
      <form class="d-flex" action="/api/blog/delete" method="POST">
         <input type="hidden" name="author" value="<?= $article->author ?>">
         <input type="hidden" name="id" value="<?= $article->slug ?>">
         <li class="p-2"><a class="btn btn-sm btn-primary" href="/blog/<?= $article->id ?>/edit">Edit</a></li>
         <li class="p-2"><button class="btn btn-sm btn-primary">Delete</button></li>
      </form>
      <?php } ?>
   </ul>
</div>