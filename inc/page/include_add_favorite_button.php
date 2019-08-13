<button id="add_favorite_button" type="button" class="btn btn-primary btn-lg">Add Favorite</button>

<div id="favorite_card" class="card text-white bg-dark mb-3" style="max-width: 18rem;">
    <div class="card-header">
        Favorite List
        <input id="favorite_input" placeholder="Enter label">
    </div>
    <div id="favorite_card_body" class="card-body">
        <div class="favorite_label_row" data-favorite_label="birinci etiket">
            <label>
                <input type="checkbox">
                Birinci etiket
            </label>
        </div>
        <div class="favorite_label_row" data-favorite_label="ikinci etiket">
            <label>
                <input type="checkbox">
                İkinci etiket
            </label>
        </div>
        <div class="favorite_label_row" data-favorite_label="üçüncü etiket">
            <label>
                <input type="checkbox">
                Üçüncü etiket
            </label>
        </div>

        <div id="favorite_label_create_message">
            <i class="fa fa-plus"></i> <label></label>
        </div>
    </div>
</div>