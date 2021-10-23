$(function () {
    $('#form').submit(function (event) {
        event.preventDefault();

        let formData = {
            restaurantName: $('#restaurantName').val(),
            restaurantMeal: $('#restaurantMeal').val(),
            saveRestaurant: true,
        };

        $.post('functions/save-restaurant.php', formData, function (response) {
            $("#id").html('id: ' + response.restaurant_id);
            $("#name").html('name: ' + response.restaurant_name);
            $("#meal").html('meal: ' + response.restaurant_meal);
            $("#created").html('created: ' + response.created);
        }, 'json');
    });
});
