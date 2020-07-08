<h1>Page produit</h1>
<?php foreach( $viewData["allProducts"] as $type ) : ?>
                <li>
                  <a href="<?= BASE_URI ?>/catalog/product/<?= $type->getId() ?>" 
                     class="text-muted"
                  >
                    <?= $type->getName(); ?>
                  </a>
                </li>  
              <?php endforeach; ?> 
              

             <?php foreach( $viewData["allProducts1"] as $type ) : ?>
                <li>
                  <a href="<?= BASE_URI ?>/catalog/product/<?= $type->getId() ?>" 
                     class="text-muted"
                  >
                    <?= $type->getName(); ?>
                  </a>
                </li>  
              <?php endforeach; ?>  
