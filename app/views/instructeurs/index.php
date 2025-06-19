<?php require_once APPROOT . '/views/includes/header.php'; ?>

<div class="container d-flex flex-column justify-content-center align-items-center" style="min-height: 60vh;">
    <?php if (isset($_SESSION['success_message'])): ?>
        <div class="alert alert-success w-100 text-center">
            <?php 
                echo $_SESSION['success_message']; 
                unset($_SESSION['success_message']); // Verwijder de melding na weergave
            ?>
        </div>
    <?php endif; ?>

    <div class="d-flex justify-content-between align-items-center w-100 mb-3">
        <h2 class="text-center mb-0 flex-grow-1"><?php echo $data['title']; ?></h2>
        <a href="<?= URLROOT; ?>/instructeurs/add" class="btn btn-primary">Nieuwe Instructeur</a>
    </div>
    <table class="table table-striped w-100" style="font-size: 1.2rem;">
        <thead>
            <tr>
                <th>Naam</th>
                <th>Geboortedatum</th>
                <th>Instructeursnummer</th>
                <th>Email</th>
                <th>Acties</th>
            </tr>
        </thead>
        <tbody>
            <?php if (empty($data['instructeurs'])): ?>
                <tr>
                    <td colspan="5" class="text-center">Geen Instructeurs beschikbaar</td>
                </tr>
            <?php else: ?>
                <?php foreach ($data['instructeurs'] as $instructeur): ?>
                    <tr>
                        <td><?php echo $instructeur->Naam; ?></td>
                        <td><?php echo $instructeur->Leeftijd; ?></td>
                        <td><?php echo $instructeur->Instructeursnummer; ?></td>
                        <td><?php echo $instructeur->Email; ?></td>
                        <td>
                            <a href="<?= URLROOT; ?>/instructeurs/edit/<?php echo $instructeur->Id; ?>" class="btn btn-sm btn-warning">
                                <i class="fas fa-pencil-alt"></i>
                            </a>
                            <a href="<?= URLROOT; ?>/instructeurs/delete/<?php echo $instructeur->Id; ?>" class="btn btn-sm btn-danger" onclick="return confirm('Weet je zeker dat je deze instructeur wilt verwijderen?');">
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