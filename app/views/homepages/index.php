<?php require_once APPROOT . '/views/includes/header.php'; ?>

<!-- Voor het centreren van de container gebruiken we het bootstrap grid -->
<div class="container">
    <div class="row mt-3">

        <div class="col-2"></div>

        <div class="col-8">

            <h3><?php echo $data['title']; ?></h3>

            <a href="<?= URLROOT; ?>/smartphones/index">idashboard it even ja?martphones</a> |
            <a href="<?= URLROOT; ?>/sneakers/index">dashboard knoppen is de navbar</a> | 
            <a href="<?= URLROOT; ?>/horloges/index">Duurstloges</a> | 
            <a href="<?= URLROOT; ?>/zangeressen/index">Riik verander dit even </a> | 

        </div>
        
        <div class="col-2"></div>
        
    </div>

</div>

<?php require_once APPROOT . '/views/includes/footer.php'; ?>