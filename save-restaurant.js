$(function () {
    // init list for global access.
    const newDLLPushFront = new DoublyLinkedList();
    const newDLLPushFront_2 = new DoublyLinkedList();

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
        }, 'json').done(function () {
            // $('#owner').html(response[0].restaurant_owner);
            // $('#id').html(response[0].restaurant_id);
            // $('#name').html(response[0].restaurant_name);
            // $('#meal').html(response[0].restaurant_meal);
            // $('#created').html(response[0].created);
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

                // add a status to end of list
                newDLLPushFront.push([status, value.restaurant_owner, value.restaurant_id, value.created]);

                newDLLPushFront_2.push([status, value.restaurant_owner, value.restaurant_id, value.created]);

                $("#status").append(`<div class='small'>
                    <p class="name">name: ${value.restaurant_name}</p>
                    <p class="meal">meal: ${value.restaurant_meal}</p>
                    <p class="id">id: ${value.restaurant_id}</p>
                </div>`);
            });

            $("#traverse").html(`<a id="${newDLLPushFront.length - 1}" class="traverse btn btn-sm btn-primary">traverse</a>`);

            $("#viewStatus").hide();

            $('.traverse').click(function () {
                let id = 0;

                $("#statusView").html(`
                <div class='small'>
                <div id='show'></div>
                <div id='hide'></div>
                <button class='prev'>prev</button>
                <button class='next'>next</button>
                </div>
                `);
                show30(id);

                $('.prev').click(function () {
                    --id;
                    if (id > newDLLPushFront.length - 1) {
                        id = newDLLPushFront.length - 2;
                        show30(id);
                        return;
                    }
                    show30(id);
                });
                $('.next').click(function () {
                    ++id;
                    if (id > newDLLPushFront.length - 1) {
                        id = newDLLPushFront.length;
                        // click double next for next user's status where if this status is for the last user in the list exit the modal completely
                        return;
                    }
                    show30(id);
                });
            });
        });

        jqxhr.always(function (response) {
            let date = new Date(),
                sec = Math.floor(date.getTime()/1000),
                expire48Hrs,
                restaurant_id;

            $.each(response, function (key, value) {
                expire48Hrs = value.created + 172800000;
                restaurant_id = value.restaurant_id;

                console.log('created: ' + value.created);
                console.log('sec: ' + sec);
                console.log('expire48Hrs: ' + expire48Hrs);
                if (sec > expire48Hrs) {
                    console.log('1st del48 run');
                    del48(value.restaurant_id);
                } else {
                    // don't delete or find a way to loop this check without overloading client and server
                    console.log('1st check1Hour run');
                    check1Hour(value.restaurant_id);
                }
            });

            function del48(restaurant_id) {
                $.post('functions/save-restaurant.php', { deleteStatus: true, restaurantId: restaurant_id }, function (response) {
                    console.log(response.message);
                }, 'json');
            }

            function check1Hour(restaurant_id) {
                setTimeout(function () {
                    if (sec > expire48Hrs) {
                        console.log('inside check1Hour, 1st timeout run');
                        $.post('functions/save-restaurant.php', { deleteStatus: true, restaurantId: restaurant_id }, function (response) {
                            console.log(response.message);
                        }, 'json');
                        return;
                    }
                    console.log('inside check1Hour, but outside 1st timeout conditional run');
                }, 0);

                setTimeout(function () {
                    console.log('inside check1Hour, 2nd timeout run');
                    check1Hour(restaurant_id);
                    // check every 1 hour
                }, 3600000);
                // 
            }
        });
    });
    function show30(index) {
        setTimeout(function () {
            // display the status starting from the first for 30  secs
            $("#show").html(
                `<p class="name">name: ${newDLLPushFront.get(index).value[0].restaurant_name}</p>
                <p class="meal">meal: ${newDLLPushFront.get(index).value[0].restaurant_meal}</p>`
            );
            $("#hide").html(index);
        }, 0);

        setTimeout(function () {
            // shift the node from the top and push to bottom
            newDLLPushFront.unshift(newDLLPushFront.shift().value);
            console.log(newDLLPushFront.get(index).value);
            $('.next').click();
            // when we get to newDLLPushFront.length, stop traversing
        }, 1000);
    }
});

// console.log('traversing ended');
// console.log("if other users have unseen status, begin traversing, but i doubt it will be inplemented here, instead, for each owner's status, put all status in a list in their order and loop, also on major next skip owner's status");