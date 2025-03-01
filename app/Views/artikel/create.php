<h1>Nieuw artikel</h1>
<?= session()->getFlashdata('error') ?>
<?= validation_list_errors('error_list') ?>

<form action="/artikelen" method="post">
    <?= csrf_field() ?>
    <div class="mb-3">
        <label for="number" class="form-label">Nummer van het artikel</label>
        <input type="text" class="form-control" id="number" name="number" value="<?= set_value('number') ?>" />
    </div>
    <div class="mb-3">
        <label for="written_size" class="form-label">Totale oppervlakte - in a (bron)</label>
        <input type="text" class="form-control" id="written_size" name="written_size" value="<?= set_value('written_size', 0) ?>" />
    </div>
    <div class="mb-3">
        <label for="written_income" class="form-label">Totaal belastbaar inkomen (onbebouwd) - in fr. (bron)</label>
        <input type="text" class="form-control" id="written_income" name="written_income" value="<?= set_value('written_income', 0) ?>" />
    </div>
    <div class="mb-3">
        <label for="written_income_built" class="form-label">Totaal belastbaar inkomen (bebouwd) - in fr. (bron)</label>
        <input type="text" class="form-control" id="written_income_built" name="written_income_built" value="<?= set_value('written_income_built', 0) ?>" />
    </div>
    <div class="mb-3">
        <label for="kadaster_id" class="form-label">Kadaster</label>
        <select class="form-control" id="kadaster_id" name="kadaster_id">
        <?php if ($kadasters !== []): ?>
            <?php foreach ($kadasters as $kadaster): ?>
                <option value="<?= esc($kadaster['id']) ?>"><?= esc($kadaster['name']) ?></option>
            <?php endforeach ?>
        <?php endif ?>
        </select>
    </div>
    <div class="mb-3">
        <label for="eigenaar_name" class="form-label">Eigenaar</label>
        <input type="text" name="eigenaar_name" id="eigenaar_name" class="form-control" value="" />
    </div>
    <div class="mb-3">
        <label for="eigenaar_city" class="form-label">Woonplaats</label>
        <input type="text" name="eigenaar_city" id="eigenaar_city" class="form-control" value="" />
    </div>
    <div class="mb-3">
        <label for="eigenaar_occupation" class="form-label">Beroep</label>
        <input type="text" name="eigenaar_occupation" id="eigenaar_occupation" class="form-control" value="" />
    </div>
    <button type="submit" class="btn btn-primary">Toevoegen</button>
</form>