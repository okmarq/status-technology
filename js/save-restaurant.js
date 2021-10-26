$(function () {
    $('#restaurant-form').submit(function (event) {
        event.preventDefault();

        let formData = {
            restaurant_name: $('#restaurant').val(),
            save_restaurant: true,
        };

        $.post('functions/save-restaurant.php', formData, function (response) {

        }, 'json').done(function (response) {
            if (!response.success) {
                $("#restaurantResponse").html("<span class='text-danger'>submit unsuccessful</span>");
            }

            $("#restaurantResponse").html("<span class='text-success'>submit successful</span>");
        }).fail(function () {
            $("#restaurantResponse").html("<span class='text-info'>something went wrong, try later</span>");
        });
    });
});