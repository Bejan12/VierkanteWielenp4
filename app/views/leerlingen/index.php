<?php require_once APPROOT . '/views/includes/header.php'; ?>

<div class="container d-flex flex-column justify-content-center align-items-center" style="min-height: 60vh;">
    <div class="d-flex justify-content-center align-items-center w-100 mb-3">
        <h2 class="text-center mb-5 flex-grow-1"><?php echo $data['title']; ?></h2>
        <a href="<?= URLROOT; ?>/leerlingen/add" class="btn btn-primary">Leerling Toevoegen</a>
    </div>
    <table class="table table-striped w-100" style="font-size: 1.2rem;">
        <thead>
            <tr>
                <th>Naam</th>
                <th>Geboortedatum</th>
                <th>Klas</th>
                <th>Email</th>
                <th>Acties</th>
            </tr>
        </thead>
        <tbody>
            <?php if (empty($data['leerlingen'])): ?>
                <tr>
                    <td colspan="5" class="text-center">Geen Leerlingen  beschikbaar</td>
                </tr>
            <?php else: ?>
                <?php foreach ($data['leerlingen'] as $leerling): ?>
                    <tr>
                        <td><?php echo $leerling->Naam; ?></td>
                        <td><?php echo $leerling->Leeftijd; ?></td>
                        <td><?php echo $leerling->Klas; ?></td>
                        <td><?php echo $leerling->Email; ?></td>
                        <td>
                            <a href="<?= URLROOT; ?>/leerlingen/edit/<?php echo $leerling->Id; ?>" class="btn btn-sm btn-warning">
                                <i class="fas fa-pencil-alt"></i>
                            </a>
                            <a href="<?= URLROOT; ?>/leerlingen/delete/<?php echo $leerling->Id; ?>" class="btn btn-sm btn-danger" onclick="return confirm('Weet je zeker dat je deze leerling wilt verwijderen?');">
                                <i class="fas fa-trash-alt"></i>
                            </a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php endif; ?>
        </tbody>
    </table>
    <div class="w-100 d-flex justify-content-start mt-3">
        <a href="<?= URLROOT; ?>" class="btn btn-secondary">Terug naar Homepage</a>
    </div>
</div>

<?php require_once APPROOT . '/views/includes/footer.php'; ?>
