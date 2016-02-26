<div class="panel panel-default">
    <!-- Default panel contents -->
    <div class="panel-heading">Blog</div>
    <!-- List group -->

    <ul class="list-group">
        <?php foreach ($posts as $p): ?>
            <li class="list-group-item"><a href="<?php echo $p->url ?>"><?php echo $p->title ?></a></li>
        <?php endforeach ?>
    </ul>
</div>
