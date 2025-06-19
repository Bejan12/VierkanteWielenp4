<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

<a href="<?= URLROOT; ?>/auto/overzicht" class="back-arrow" title="Terug naar overzicht">
    <i class="bi bi-arrow-left"></i>
</a>

<div class="addcar-page">
    <h2>Auto toevoegen</h2>

    <?php if (!empty($data['error'])): ?>
        <div class="alert alert-danger"><?= htmlspecialchars($data['error']); ?></div>
    <?php endif; ?>
    <?php if (!empty($data['success'])): ?>
        <div class="alert alert-success"><?= htmlspecialchars($data['success']); ?></div>
    <?php endif; ?>

    <form method="post" class="addcar-form">
        <div class="form-group">
            <label for="merk">Merk <span style="color:red">*</span></label>
            <select id="merk" name="merk" required onchange="toggleMerkInput(this)">
                <option value="">-- Kies merk --</option>
                <option value="Volkswagen" <?= (isset($data['merk']) && $data['merk'] == 'Volkswagen') ? 'selected' : '' ?>>Volkswagen</option>
                <option value="Tesla" <?= (isset($data['merk']) && $data['merk'] == 'Tesla') ? 'selected' : '' ?>>Tesla</option>
                <option value="Ford" <?= (isset($data['merk']) && $data['merk'] == 'Ford') ? 'selected' : '' ?>>Ford</option>
                <option value="Renault" <?= (isset($data['merk']) && $data['merk'] == 'Renault') ? 'selected' : '' ?>>Renault</option>
                <option value="BMW" <?= (isset($data['merk']) && $data['merk'] == 'BMW') ? 'selected' : '' ?>>BMW</option>
                <option value="Toyota" <?= (isset($data['merk']) && $data['merk'] == 'Toyota') ? 'selected' : '' ?>>Toyota</option>
                <option value="Peugeot" <?= (isset($data['merk']) && $data['merk'] == 'Peugeot') ? 'selected' : '' ?>>Peugeot</option>
                <option value="Opel" <?= (isset($data['merk']) && $data['merk'] == 'Opel') ? 'selected' : '' ?>>Opel</option>
                <option value="Mercedes" <?= (isset($data['merk']) && $data['merk'] == 'Mercedes') ? 'selected' : '' ?>>Mercedes</option>
                <option value="Audi" <?= (isset($data['merk']) && $data['merk'] == 'Audi') ? 'selected' : '' ?>>Audi</option>
                <option value="Anders" <?= (isset($data['merk']) && $data['merk'] && !in_array($data['merk'], [
                    'Volkswagen','Tesla','Ford','Renault','BMW','Toyota','Peugeot','Opel','Mercedes','Audi'
                ])) ? 'selected' : '' ?>>Anders</option>
            </select>
            <input type="text" id="merk_anders" name="merk_anders"
                placeholder="Voer merk in"
                style="margin-top:8px; display:none;"
                value="<?= (isset($data['merk']) && !in_array($data['merk'], [
                    'Volkswagen','Tesla','Ford','Renault','BMW','Toyota','Peugeot','Opel','Mercedes','Audi'
                ]) ? htmlspecialchars($data['merk']) : '') ?>">
        </div>
        <div class="form-group">
            <label for="type">Type <span style="color:red">*</span></label>
            <input type="text" id="type" name="type" required value="<?= htmlspecialchars($data['type'] ?? '') ?>">
        </div>
        <div class="form-group">
            <label for="kenteken">Kenteken <span style="color:red">*</span></label>
            <input type="text" id="kenteken" name="kenteken" required value="<?= htmlspecialchars($data['kenteken'] ?? '') ?>">
        </div>
        <div class="form-group">
            <label for="brandstof">Brandstof <span style="color:red">*</span></label>
            <select id="brandstof" name="brandstof" required>
                <option value="">-- Kies brandstof --</option>
                <option value="benzine" <?= (isset($data['brandstof']) && $data['brandstof'] == 'benzine') ? 'selected' : '' ?>>Benzine</option>
                <option value="elektrisch" <?= (isset($data['brandstof']) && $data['brandstof'] == 'elektrisch') ? 'selected' : '' ?>>Elektrisch</option>
            </select>
        </div>
        <div class="form-group">
            <label for="opmerking">Opmerking</label>
            <textarea id="opmerking" name="opmerking"><?= htmlspecialchars($data['opmerking'] ?? '') ?></textarea>
        </div>
        <button type="submit" class="btn-green">Toevoegen</button>
    </form>
</div>

<script>
function toggleMerkInput(select) {
    var anders = select.value === 'Anders';
    document.getElementById('merk_anders').style.display = anders ? 'block' : 'none';
    if (!anders) {
        document.getElementById('merk_anders').value = '';
    }
}
// Bij laden pagina: toon input als nodig
document.addEventListener('DOMContentLoaded', function() {
    toggleMerkInput(document.getElementById('merk'));
});
</script>

<style>
    /* Terug-pijl styling */
    .back-arrow {
        position: fixed;
        top: 20px;
        left: 20px;
        font-size: 48px;
        color: #ccc;
        text-decoration: none;
        z-index: 1100;
        transition: color 0.3s ease;
    }
    .back-arrow:hover {
        color: #fff;
    }

    body {
        background-color: #1e1e2f;
        color: #f0f0f0;
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        margin: 0;
        padding: 0;
    }

    .addcar-page {
        padding: 60px 40px;
        max-width: 500px;
        margin: 60px auto 0 auto;
        background: #2b2b3d;
        border-radius: 16px;
        box-shadow: 0 4px 24px rgba(0,0,0,0.18);
        color: #f0f0f0;
        display: flex;
        flex-direction: column;
        align-items: center;
    }

    .addcar-page h2 {
        margin-bottom: 30px;
        color: #fff;
        text-shadow: 1px 1px 3px #000;
        width: 100%;
        text-align: center;
        font-size: 2rem;
    }

    .addcar-form {
        width: 100%;
        display: flex;
        flex-direction: column;
        gap: 18px;
    }

    .form-group {
        display: flex;
        flex-direction: column;
        gap: 6px;
    }

    label {
        font-weight: 600;
        color: #ccc;
    }

    input[type="text"], select, textarea {
        padding: 10px;
        border-radius: 6px;
        border: none;
        font-size: 1rem;
        background: #23233a;
        color: #fff;
        margin-bottom: 2px;
    }

    textarea {
        min-height: 60px;
        resize: vertical;
    }

    .btn-green {
        display: inline-block;
        background-color: #28a745;
        color: #fff;
        font-weight: 600;
        padding: 12px 24px;
        border-radius: 6px;
        border: none;
        font-size: 1.1rem;
        cursor: pointer;
        transition: background 0.2s, color 0.2s;
        margin-top: 10px;
        box-shadow: 0 2px 8px rgba(40,167,69,0.15);
        text-decoration: none;
    }
    .btn-green:hover {
        background-color: #218838;
        color: #fff;
        text-decoration: none;
    }

    .alert {
        width: 100%;
        padding: 12px;
        border-radius: 6px;
        margin-bottom: 16px;
        text-align: center;
        font-weight: bold;
    }
    .alert-danger {
        background: #e74c3c;
        color: #fff;
    }
    .alert-success {
        background: #27ae60;
        color: #fff;
    }
</style>
