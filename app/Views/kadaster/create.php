<h1>Nieuw kadasterboek</h1>
<?= session()->getFlashdata('error') ?>
<?= validation_list_errors('error_list') ?>

<form action="/kadasters" method="post">
    <?= csrf_field() ?>
    <div class="mb-3">
        <label for="name" class="form-label">Naam van het kadasterboek</label>
        <input type="text" class="form-control" id="name" name="name" value="<?= set_value('name') ?>" />
    </div>
    <div class="mb-3">
        <label for="city" class="form-label">Gemeente</label>
        <input type="text" class="form-control" id="city" name="city" value="<?= set_value('city') ?>" />
    </div>
    <div class="mb-3">
        <label for="period" class="form-label">Datering</label>
        <input type="text" class="form-control" id="period" name="period" value="<?= set_value('period') ?>" />
    </div>
    <button type="submit" class="btn btn-primary">Toevoegen</button>
</form>