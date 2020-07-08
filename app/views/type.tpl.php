<h1>
    Type
</h1>
<div>
<?php foreach( $viewData["allTypes"] as $type ) : ?>
                <li>
                  <a href="<?= BASE_URI ?>/catalog/type/<?= $type->getId() ?>" 
                     class="text-muted"
                  >
                    <?= $type->getName(); ?>
                  </a>
                </li>  
              <?php endforeach; ?>  
</div>
