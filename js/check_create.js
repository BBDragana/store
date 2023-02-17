var check_items = [];
var create_check_item_form = document.getElementById("create_check_item_form");

function add_item(event) {
    event.preventDefault();
    var form_data = new FormData(create_check_item_form); //uzme podatke iz forme //podatke iz forme pretvori u objekat
    check_items.push(Object.fromEntries(form_data));
    write_table();
    create_check_item_form.reset();

}

function write_table() {
    var tbody = document.getElementById("check_items");
    tbody.innerHTML= "";
    for (var i = 0; i < check_items.length; i++) {
        tbody.innerHTML+="<tr><td>"+ check_items[i].ArticleId+"</td><td>"+check_items[i].Quantity+"</td><td>"+check_items[i].Price+"</td></tr>";

    }
}

