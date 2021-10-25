$(function () {
    // init list for global access.
    const newDLL = new DoublyLinkedList();

    $('#form').submit(function (event) {
        event.preventDefault();

        let formData = {
            // restaurantOwner: ''
            restaurantName: $('#restaurantName').val(),
            restaurantMeal: $('#restaurantMeal').val(),
            saveRestaurant: true,
        };

        $.post('functions/save-restaurant.php', formData, function (response) {
            $("#response").html('successfully submitted');

            $('#owner').html(response[0].restaurant_owner);
            $('#id').html(response[0].restaurant_id);
            $('#name').html(response[0].restaurant_name);
            $('#meal').html(response[0].restaurant_meal);
            $('#created').html(response[0].created);
            $('#expire48Hrs').html(response[0].created + 172800000);
            $('#expire30Secs').html(response[0].created + 30000);

        }, 'json').done(function () {
            let jqxhr = $.get('functions/status.php', function () {
                $("#response").html('successfully received');
            }, 'json').done(function (response) {
                // add a status
                $.each(response, function (key, value) {

                    // if user has status in db, append to old, else push new
                    const status = new Status(value.restaurant_name, value.restaurant_meal);

                    newDLL.push([status, value.restaurant_owner, value.restaurant_id, value.created, value.created + 172800000, value.created + 30000]);


                    $("#status").append(`<div class='small'>
                        <p class="owner">${value.restaurant_owner}</p>
                        <p class="id">${value.restaurant_name}</p>
                        <p class="name">${value.restaurant_meal}</p>
                        <p class="meal">${value.restaurant_id}</p>
                        <p class="created">${value.created}</p>
                        <p class="expire48Hrs">${value.created + 172800000}</p>
                        <p class="expire30Secs">${value.created + 30000}</p>
                        <button id='${value.restaurant_id}' type="button" class="btn btn-outline-primary">View status</button>
                    </div>`);
                });
            });
        });
    });

    $("#viewStatus").click(function (data) {
        // if user has status in db get all,
        let jqxhr = $.get('functions/status.php', function () {
            $("#response").html('successfully received');
        }, 'json').done(function (response) {
            // display each status
            $.each(response, function (key, value) {
                const status = new Status(value.restaurant_name, value.restaurant_meal);
                // add a status to list
                newDLL.push([status, value.restaurant_owner, value.restaurant_id, value.created, value.created + 172800000, value.created + 30000]);

                $("#status").append(`<div class='small'>
                    <p class="name">name: ${value.restaurant_name}</p>
                    <p class="meal">meal: ${value.restaurant_meal}</p>
                    <p class="id">id: ${value.restaurant_id}</p>
                    
                    <a id="${newDLL.length - 1}" class="dll btn btn-sm btn-primary">traverse</a>
                </div>`);
            });

            $('.dll').click(function () {
                let id = $(this).attr('id');
                console.log('id: ' + id);
                console.log(newDLL.get(id).value);
                // console.log(newDLL.get(id-1));
                // console.log(newDLL.get(id-1).value);

                $("#statusView").html(`
                <div class='small'>
                <div id='show'></div>
                <button class='prev'>prev</button>
                <button class='next'>next</button>
                </div>
                `);
                show(id);

                $('.prev').click(function () {
                    if (id < 0) {
                        id = newDLL.length - 1;
                    } else if (id > newDLL.length - 1) {
                        id = 0;
                    }
                    show(id);
                    --id;
                    console.log(id + ' id now');
                });
                $('.next').click(function () {
                    if (id < 0) {
                        id = newDLL.length - 1;
                    } else if (id > newDLL.length - 1) {
                        id = 0;
                    }
                    show(id);
                    ++id;
                    console.log(id + ' id now');
                });
            });
        });

        // jqxhr.always(function () {
        //     let currentSecs = new Date();
        //     let expire48Hrs = response.created + 172800000;
        //     let expire30Secs = response.created + 30000;
        //     // set 30 secs duration for status display
        //     display30Secs = window.onload = setTimeout(function () {
        //         document.getElementById('statusView').innerHTML = `displayed display30Secs`;
        //         $("#id").html('id: ' + response.restaurant_id);
        //         $("#name").html('name: ' + response.restaurant_name);
        //         $("#meal").html('meal: ' + response.restaurant_meal);
        //         $("#created").html('created: ' + response.created);
        //     }, 0);

        //     // delete 30secs status from database after 30 secs
        //     remove30Secs = window.onload = setTimeout(function () {
        //         document.getElementById('statusView').innerHTML = `removed display30Secs`;
        //         $("#id").html('');
        //         $("#name").html('');
        //         $("#meal").html('');
        //         $("#created").html('');
        //         $.post('functions/save-restaurant.php', { deleteStatus: true, restaurantId: response.restaurant_id }, function (response) {
        //             console.log(response.message);
        //         }, 'json');
        //     }, 172800000);
        // });
    });
    function show(index) {
        $("#show").html(
            `<p class="name">name: ${newDLL.get(index).value[0].restaurant_name}</p>
            <p class="meal">meal: ${newDLL.get(index).value[0].restaurant_meal}</p>`
        );
    }
});