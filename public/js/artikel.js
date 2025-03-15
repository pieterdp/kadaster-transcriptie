

function row(row_id)
{
    row = `<div class="row mb-3">
<div class="col">
                <label for="section_${row_id}" class="form-label">Sectie</label>
                <input type="text" class="form-control" id="section_${row_id}" name="section" />
            </div>
            <div class="col">
                <label for="number_${row_id}" class="form-label">Nummer</label>
                <input type="text" class="form-control" id="number_${row_id}" name="number" />
            </div>
            <div class="col">
                <label for="usage_${row_id}" class="form-label">Grondgebruik</label>
                <select class="form-control" id="usage_${row_id}" name="usage">
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
                <label for="size_${row_id}" class="form-label">Totale oppervlakte</label>
                <input type="text" class="form-control" id="size_${row_id}" name="size" />
            </div>
            <div class="col">
                <label for="type_${row_id}" class="form-label">Klasse</label>
                <select class="form-control" id="type_${row_id}" name="type">
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                </select>
            </div>

            <div class="col">
                <label for="income_unbuilt_${row_id}" class="form-label">Belastbaar inkomen (onbebouwd) - in fr.</label>
                <input type="text" class="form-control" id="income_unbuilt_${row_id}" name="income_unbuilt" />
            </div>
            <div class="col">
                <label for="income_built_${row_id}" class="form-label">Belastbaar inkomen (bebouwd) - in fr.</label>
                <input type="text" class="form-control" id="income_built_${row_id}" name="income_built" />
            </div>
            <div class="col">
                <button type="button" id="perceel_${row_id}" class="btn btn-primary">Nieuw perceel</button>
            </div>
</div>`;
}
