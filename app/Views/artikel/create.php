<h1>Nieuw artikel</h1>
<?= session()->getFlashdata('error') ?>
<?= validation_list_errors('error_list') ?>

<form>
    <?= csrf_field() ?>
    <input type="hidden" id="percelen_count" value="1" />
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
    <div id="percelen">
        <div class="row mb-3">
            <div class="col">
                <label for="section_1" class="form-label">Sectie</label>
                <input type="text" class="form-control" id="section_1" name="section" />
            </div>
            <div class="col">
                <label for="number_1" class="form-label">Nummer</label>
                <input type="text" class="form-control" id="number_1" name="number" />
            </div>
            <div class="col">
                <label for="usage_1" class="form-label">Grondgebruik</label>
                <select class="form-control" id="usage_1" name="usage">
                    <option value="bouwland">Bouwland</option>
                    <option value="tuin">Tuin</option>
                    <option value="boomgaard">Boomgaard</option>
                    <option value="hooiland">Hooiland</option>
                    <option value="weiland">Weiland</option>
                    <option value="bos">Bos</option>
                    <option value="huis">Huis</option>
                </select>
            </div>
            <div class="col">
                <label for="size_1" class="form-label">Totale oppervlakte</label>
                <input type="text" class="form-control" id="size_1" name="size" />
            </div>
            <div class="col">
                <label for="type_1" class="form-label">Klasse</label>
                <select class="form-control" id="type_1" name="type">
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                </select>
            </div>

            <div class="col">
                <label for="income_unbuilt_1" class="form-label">Belastbaar inkomen (onbebouwd) - in fr.</label>
                <input type="text" class="form-control" id="income_unbuilt_1" name="income_unbuilt" />
            </div>
            <div class="col">
                <label for="income_built_1" class="form-label">Belastbaar inkomen (bebouwd) - in fr.</label>
                <input type="text" class="form-control" id="income_built_1" name="income_built" />
            </div>
            <div class="col">
                <button type="button" id="perceel_1" class="btn btn-primary">Nieuw perceel</button>
            </div>
        </div>
    </div>
    <button type="button" id="submit" class="btn btn-primary">Toevoegen</button>
</form>