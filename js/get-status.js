$(function () {
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

            show30();

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
                if (sec >= delIn48Hrs) {
                    del48(value.id);
                } else {
                    // don't delete or find a way to loop this check without overloading client and server
                    check1Hour(value.id);
                }
            });

            function del48(id) {
                $.post('functions/save-status.php', { delete_status: true, status_id: id }, function (response) {
                    // console.log(response.message);
                }, 'json');
            }

            function check1Hour(id) {
                setTimeout(function () {
                    if (sec >= delIn48Hrs) {
                        $.post('functions/save-restaurant.php', { delete_status: true, status_id: id }, function (response) {
                            // console.log(response.message);
                        }, 'json');

                        return;
                    }
                }, 0);

                setTimeout(function () {
                    // check every 1 hour
                    check1Hour(id);
                }, 3600000);
                // 
            }
        });


        $('.prev').click(function () {
            // counter--;

            // show30(counter);

            // if (id > newDLLPushFront.length - 1) {
            //     id = newDLLPushFront.length - 2;
            //     show30(id);
            //     return;
            // }
        });

        $('.next').click(function () {
            // counter++;

            // show30(counter);

            // if (id > newDLLPushFront.length - 1) {
            //     id = newDLLPushFront.length;
            //     // click double next for next user's status where if this status is for the last user in the list exit the modal completely
            //     return;
            // }
        });
    });

    let counter = 0;
    function show30() {
        $("#loop").removeClass('d-none');

        // loop through the list and display the status
        if (counter < newDLLPushFront.length) {
            let data = newDLLPushFront.get(counter).value;

            setTimeout(function () {
                // display the status starting from the first for 30  secs
                $("#looping-status").html(`<div class='mb-1'>
                    <small class="text-muted" style="font-size:12px;">Restaurant name: ${data.restaurant_id}</small><br>
                    <small style="font-size:13px;font-weight:500;">Restaurant status: ${data.status}</small><br>
                    <a id="" class="prev btn btn-sm btn-secondary">prev</a>
                    <a id="" class="next btn btn-sm btn-secondary">next</a>
                </div>`);

                // $('.next').click();
                counter++;

            }, 0);

            setTimeout(function () {
                show30(counter);

                // shift the node from the top and push to bottom
                // newDLLPushFront.unshift(newDLLPushFront.shift().value);

                // $('.next').click();
                // when we get to newDLLPushFront.length, stop traversing
            }, 1000);


            console.log('shifted: ', newDLLPushFront.shift().value, newDLLPushFront.length);
            console.log('head: ', newDLLPushFront.head.value);
            // console.log(newDLLPushFront.head);
            console.log('tail: ', newDLLPushFront.tail.value);
            // console.log(newDLLPushFront.tail);
            console.log('\n');
            // 30000
        } else {
            $("#looping-status").html(`<div class='mb-1'>
                <small class="text-muted" style="font-size:12px;">No status to display</small><br>
            </div>`);
        }
    }
});