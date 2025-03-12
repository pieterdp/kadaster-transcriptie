<h1>Nieuw perceel</h1>
<div class="alert alert-primary" role="alert">
  Artikel <?= esc($artikel['number']) ?>
</div>

<?= session()->getFlashdata('error') ?>
<?= validation_list_errors('error_list') ?>
<!--
        'number',
        'section',
        'usage',
        'size',
        'type',
        'income_unbuilt',
        'income_built',
        'artikel_id'
-->
<form action="/artikelen/<?= esc($artikel['id']) ?>/percelen" method="post">
    <?= csrf_field() ?>
    <div class="mb-3">
        <label for="section" class="form-label">Sectie</label>
        <input type="text" class="form-control" id="section" name="section" value="<?= set_value('section') ?>" />
    </div>
    <div class="mb-3">
        <label for="number" class="form-label">Nummer</label>
        <input type="text" class="form-control" id="number" name="number" value="<?= set_value('number') ?>" />
    </div>
    <div class="mb-3">
        <label for="usage" class="form-label">Grondgebruik</label>
        <select class="form-control" id="usage" name="usage">
            <option value="bouwland">Bouwland</option>
            <option value="tuin">Tuin</option>
            <option value="boomgaard">Boomgaard</option>
            <option value="hooiland">Hooiland</option>
            <option value="weiland">Weiland</option>
            <option value="bos">Bos</option>
            <option value="huis">Huis</option>
        </select>
    </div>
    <div class="mb-3">
        <label for="size" class="form-label">Totale oppervlakte</label>
        <input type="text" class="form-control" id="size" name="size" value="<?= set_value('size', 0) ?>" />
    </div>
    <div class="mb-3">
        <label for="type" class="form-label">Klasse</label>
        <select class="form-control" id="type" name="type">
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
        </select>
    </div>

    <div class="mb-3">
        <label for="income_unbuilt" class="form-label">Belastbaar inkomen (onbebouwd) - in fr.</label>
        <input type="text" class="form-control" id="income_unbuilt" name="income_unbuilt" value="<?= set_value('income_unbuilt', 0) ?>" />
    </div>
    <div class="mb-3">
        <label for="income_built" class="form-label">Belastbaar inkomen (bebouwd) - in fr.</label>
        <input type="text" class="form-control" id="income_built" name="income_built" value="<?= set_value('income_built', 0) ?>" />
    </div>
    
    <button type="submit" class="btn btn-primary">Toevoegen</button>
</form>