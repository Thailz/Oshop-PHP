<h1>   
    Marque <?= $viewData["brand"]->getName(); ?>
</h1>


<?php foreach( $viewData["allBrands"] as $brand ) : ?>
             <li>
             <a href="<?= BASE_URI ?>/catalog/brand/<?= $brand->getId() ?>" 
                class="text-muted"
             >
               <?= $brand->getName(); ?>
             </a>
             </li>
         <?php endforeach; ?>   

