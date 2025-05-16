<?php require_once APPROOT . '/views/includes/header.php'; ?>

<!-- Voor het centreren van de container gebruiken we het bootstrap grid -->
<div class="container">
    <div class="row mt-3">

        <div class="col-2"></div>

        <div class="col-8">

            <h3><?php echo $data['title']; ?></h3>

        </div>
        
        <div class="col-2"></div>
        <nav>
        <ul>
        <li><a href="<?= URLROOT; ?>/leerlingen/index">Overzicht Leerlingen</a></li>
        <li><a href="<?= URLROOT; ?>/instructeurs/index">Overzicht Instructeurs</a></li>
    </ul>
    </nav>
    </div>

</div>

<?php require_once APPROOT . '/views/includes/footer.php'; ?>