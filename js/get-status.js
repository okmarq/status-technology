$(function () {
    // let list = {},
    //     count = 0;

    // for (const key in list) {
    //     if (Object.hasOwnProperty.call(list, key)) {
    //         const element = list[key];

    //     }
    // }

    // $("#get-status").click(function () {
    //     $.get('functions/get-status.php', function () {

    //     }).done(function (response) {
    //         $.each(response, function (key, value) {
    //             // if value.restaurant_id is in object list,
    //             if (value.restaurant_id in list) {
    //                 list[restaurant_id]++;
    //             } else {
    //                 list[restaurant_id] = value.restaurant_id;
    //             }
    //             console.log(key, value.restaurant_id);
    //             // increment object list key, 
    //             // then add value.status to linked list owned by the key
    //             console.log(key, value);
    //         });

    //         return;
    //     }).fail(function (error) {
    //         console.log(error);

    //         return;
    //     });

    //     console.log(list);
    // });

    // init list for global access.
    const newDLLPushFront = new DoublyLinkedList();
    const newDLLPushFront_2 = new DoublyLinkedList();

    $("#show-status").click(function () {
        let jqxhr = $.get('functions/get-status.php', function () {
        }).done(function (response) {
            // display each status
            $.each(response, function (key, value) {
                const status = new Status(value.id, value.restaurant_id, value.status, value.created);

                // add a status to end of list
                newDLLPushFront.push(status);

                newDLLPushFront_2.push(status);

                $("#display").removeClass('d-none');

                $("#display-status").append(`<div class='mb-1'>
                <small class="text-muted" style="font-size:12px;">Restaurant name: ${value.restaurant_id}</small><br>
                <small style="font-size:13px;font-weight:500;">Restaurant status: ${value.status}</small>
                </div>`);
            });
        }).fail(function (error) {
        });

        jqxhr.always(function (response) {
            let date = new Date(),
                sec = Math.floor(date.getTime() / 1000),
                delIn48Hrs,
                id;

            $.each(response, function (key, value) {
                delIn48Hrs = value.created + 172800000;
                id = value.id;

                console.log('status: ' + value.status);
                console.log('created: ' + value.created);
                console.log('sec: ' + sec);
                console.log('delIn48Hrs: ' + delIn48Hrs);
                if (sec >= delIn48Hrs) {
                    console.log('1st del48 run');

                    del48(value.id);
                } else {
                    // don't delete or find a way to loop this check without overloading client and server
                    console.log('1st check1Hour run');

                    check1Hour(value.id);
                }
            });

            function del48(id) {
                $.post('functions/save-status.php', { delete_status: true, status_id: id }, function (response) {
                    console.log(response.message);
                }, 'json');
            }

            function check1Hour(id) {
                setTimeout(function () {
                    if (sec >= delIn48Hrs) {
                        console.log('inside check1Hour, 1st timeout run');

                        $.post('functions/save-restaurant.php', { delete_status: true, status_id: id }, function (response) {
                            console.log(response.message);
                        }, 'json');

                        return;
                    }
                    console.log("inside check1Hour and 1st timeout, conditional didn't run, but will run second timeout after 1 hour");
                }, 0);

                setTimeout(function () {
                    // check every 1 hour
                    console.log('inside check1Hour, 2nd timeout run to call check1Hour again since last 1 hour');

                    check1Hour(id);
                }, 3600000);
                // 
            }
        });
    });
});