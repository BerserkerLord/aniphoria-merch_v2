<?php
/**
 * @var App\View\AppView $this
 */
?>

<div class="pages index content">
    <div class="list-section pt-80 pb-80">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="row">
                        <?php
                        foreach($merchandising as $merchandising): ?>
                            <div class="col-4 text-center">
                                <?php
                                if(empty($merchandising->imagen[0]->nombre)){
                                    $imageName = 'default.png';
                                } else {
                                    $imageName = $merchandising->imagen[0]->nombre;
                                }
                                ?>
                                <div class="single-product-item">
                                    <div class="product-image">
                                        <?= $this -> Html -> link($this -> Html -> image('/img/productos/'.$imageName, ['alt' => $merchandising -> articulo.'.jpg']),
                                            ['controller' => 'Merchandising', 'action' => 'view', $merchandising->id], ['escape' => false]) ?>
                                    </div>
                                    <h3><?= $merchandising -> articulo  ?></h3>
                                    <p class="product-price"><?= '$'.$merchandising -> precio ?> </p>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
