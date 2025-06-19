<?php require_once APPROOT . '/views/includes/header.php'; ?>

<<<<<<< HEAD
<div class="container">
    <div class="row mt-3">
        <div class="col-2"></div>
        <div class="col-8">
            <h3><?php echo $data['title']; ?></h3>
            <a href="<?= URLROOT; ?>/rijles/create" class="btn btn-primary">Nieuwe rijles maken</a>
        </div>
        <div class="col-2"></div>
    </div>
=======
<!-- Voor het centreren van de container gebruiken we het bootstrap grid -->
<div class="container">
    <div class="row mt-3">

        <div class="col-2"></div>

        <div class="col-8">

            <h3><?php echo $data['title']; ?></h3>

            <a href="<?= URLROOT; ?>/smartphones/index">Overzicht smartphones</a> |
            <a href="<?= URLROOT; ?>/sneakers/index">Mooiste sneakers</a> | 
            <a href="<?= URLROOT; ?>/horloges/index">Duurste Horloges</a> | 
            <a href="<?= URLROOT; ?>/zangeressen/index">Rijkste Zangeressen</a> | 

        </div>
        
        <div class="col-2"></div>
        
    </div>

>>>>>>> 6822d2f3f5c4a53dc94754cb472eaef47753fdf9
</div>

<?php require_once APPROOT . '/views/includes/footer.php'; ?>