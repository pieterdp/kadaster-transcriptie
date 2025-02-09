<h1>Overzicht alle getranscribreerde kadasterboeken</h1>

<?php if ($kadaster_list !== []): ?>
    <?php foreach ($kadaster_list as $kadaster): ?>
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
            </tbody>
        </table>
    <?php endforeach ?>
<?php endif ?>