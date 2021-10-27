let list = {},
    count = 0;

for (const key in list) {
    if (Object.hasOwnProperty.call(list, key)) {
        const element = list[key];

    }
}

$("#get-status").click(function () {
    $.get('functions/get-status.php', function () {

    }).done(function (response) {
        $.each(response, function (key, value) {
            // if value.restaurant_id is in object list,
            if (value.restaurant_id in list) {
                list[restaurant_id]++;
            } else {
                list[restaurant_id] = value.restaurant_id;
            }
            console.log(key, value.restaurant_id);
            // increment object list key, 
            // then add value.status to linked list owned by the key
            console.log(key, value);
        });

        return;
    }).fail(function (error) {
        console.log(error);

        return;
    });

    console.log(list);
});