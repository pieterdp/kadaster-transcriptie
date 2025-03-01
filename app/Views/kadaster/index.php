<h1>Overzicht alle getranscribreerde kadasterboeken</h1>

<?php if ($kadasters !== []): ?>
    <?php foreach ($kadasters as $kadaster): ?>
        <h2><?= esc($kadaster['name']) ?></h2>
        <table class="table">
            <tbody>
                <tr>
                    <th scope="row">Naam</th>
                    <td><?= esc($kadaster['name']) ?></td>
                </tr>
                <tr>
                    <th scope="row">Gemeente</th>
                    <td><?= esc($kadaster['city']) ?></td>
                </tr>
                <tr>
                    <th scope="row">Link</th>
                    <td></td>
                </tr>
                <tr>
                    <th scope="row">Artikelen</th>
                    <td>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">Nummer</th>
                                    <th scope="col">Oppervlakte berekend (bron)</th>
                                    <th scope="col">Inkomsten berekend (onbebouwd) (bron)</th>
                                    <th scope="col">Inkomsten berekend (bebouwd) (bron)</th>
                                    <th scope="col">Eigenaar</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($kadaster['artikels'] as $artikel): ?>
                                    <tr>
                                        <td><?= esc($artikel['number']) ?></td>
                                        <td><?= esc($artikel['computed_size']) ?> a (<?= esc($artikel['written_size']) ?> a)</td>
                                        <td><?= esc($artikel['computed_income']) ?> fr (<?= esc($artikel['written_income']) ?> fr)</td>
                                        <td><?= esc($artikel['computed_income_built']) ?> fr (<?= esc($artikel['written_income_built']) ?> fr)</td>
                                        <td><?= esc($artikel['eigenaar']['name']) ?> (<?= esc($artikel['eigenaar']['occupation']) ?>, <?= esc($artikel['eigenaar']['city']) ?>)</td>
                                    </tr>
                                <?php endforeach ?>
                            </tbody>
                        </table>
                    </td>
                </tr>
            </tbody>
        </table>
    <?php endforeach ?>
<?php endif ?>