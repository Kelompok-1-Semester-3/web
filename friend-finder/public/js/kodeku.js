$(document).ready(function () {

    $('.event-category').change(function (e) {
        let category_id = $(this).children('option:selected').val();
        $('.row-event').html('');

        $.ajax({
            type: "post",
            url: "http://localhost/friend-finder/public/event/getEventByCategory",
            data: {
                category_id: category_id
            },
            dataType: "json",
            success: function (result) {
                // console.log(result);
                let content = '';
                if (result.length == 0) {
                    $('.row-event').append('<div class="col-md-12"><h3 class="text-center">No Event Here!</h3></div>');
                } else {
                    $.each(result, function (indexInArray, data) {
                        content += `<div class="col-md-6 col-lg-4"><div class="card-box"><div class="card-thumbnail"><img src="http://localhost/friend-finder/public/img/${data.event_picture}" class="img-fluid" alt=""></div><div class="row mt-4"><div class="col-md-12"><span class="color-danger fw-semibold">${data.name}</span><h4 class="mt-1"><strong>${data.name_event}</strong></h4><span class="color-secondary mt-0 py-0">${data.event_owner}</span><ul class="list-unstyled mt-3"><li><div class="d-flex align-items-center"><i class="me-2 color-primary fas fa-tag"></i>IDR ${data.price}</div></li><li><div class="d-flex align-items-center"><i class="me-2 color-primary fas fa-map"></i>${data.location}</div></li><li><div class="d-flex align-items-center"><i class="me-2 color-primary fas fa-calendar"></i>${data.event_start_date}</div></li></ul></div></div><div class="row mt-3"><div class="col"><a href="<?= BASE_URL ?>/event/detail/<?= $event['id'] ?>" class="btn btn-primary btn-shadow">JOIN</a></div></div></div></div>`;

                        $('.row-event').html(content);
                    });
                }
            }
        });
    });


    $('.search-event').on('keyup', function (e) {
        if (e.keyCode == 13) {
            $('.row-event').html('');
            keyword = $('.search-event').val();
            if (keyword.length == 0) {
                document.location.href = "http://localhost/friend-finder/public/event";
            } else {
                $.ajax({
                    type: "post",
                    url: "http://localhost/friend-finder/public/event/getEvenyByKeyword",
                    data: {
                        keyword: keyword
                    },
                    dataType: "json",
                    success: function (result) {
                        let event = result[0];
                        $('.row-event').html(`<div class="col-md-6 col-lg-4"><div class="card-box"><div class="card-thumbnail"><img src="http://localhost/friend-finder/public/img/${event.event_picture}" class="img-fluid" alt=""></div><div class="row mt-4"><div class="col-md-12"><span class="color-danger fw-semibold">${event.name}</span><h4 class="mt-1"><strong>${event.name_event}</strong></h4><span class="color-secondary mt-0 py-0">${event.event_owner}</span><ul class="list-unstyled mt-3"><li><div class="d-flex align-items-center"><span data-feather="tag" class="me-2 color-primary"></span>IDR ${event.price}</div></li><li><div class="d-flex align-items-center"><span data-feather="map-pin" class="me-2 color-primary"></span>${event.location}</div></li><li><div class="d-flex align-items-center"<span data-feather="calendar" class="me-2 color-primary"></span>${event.event_start_date}</div></li></ul></div></div><div class="row mt-3"><div class="col"><a href="<?= BASE_URL ?>/event/detail/<?= $event['id'] ?>" class="btn btn-primary btn-shadow">JOIN</a></div></div></div></div>`);
                    }
                });
            }
        }
    });

    $('#btn_print').on('click', function () {
        $('#invoice_card').print();
    });

    $('.buttonEditTransaction').on('click', function () {
        // clear all field
        $('#customer_name').val('');
        $('#place_id').val('');
        $('#contact_person').val('');
        $('#start_date').val('');
        $('#end_date').val('');
        $('#price').val('');
        $('#play_time').val('');
        $('#total').val('');
        $('#id').val('');

        let id = $(this).data('id');
        // console.log(time_estimates_helper.length);
        $.ajax({
            type: "post",
            url: "http://localhost/friend-finder/public/transaction/getSingleTransaction",
            data: {
                id: id
            },
            dataType: "json",
            success: function (response) {
                console.log(response.place_id);
                $('#customer_name').val(response.customer_name);
                $('#place_id').val(response.place_id);
                $('#contact_person').val(response.contact_person);
                let start = response.start.slice(0, 5);
                let end = response.end.slice(0, 5);
                $('#start').val(start);
                $('#end').val(end);
                $('#start_time').html(start);
                $('#end_time').html(end);
                $('#total').val(response.total);
                $('#id').val(response.id);

                // event
                let starttime, endtime, price;
                price = response.price;
                $('#start').keyup(function (e) {
                    let val = $(this).val();
                    if (val.length > 0) {
                        starttime = val.slice(0, 2);
                    }
                });

                $('#end').keyup(function (e) {
                    let val = $(this).val();
                    if (val.length > 0) {
                        endtime = val.slice(0, 2);
                        let res = parseInt(endtime) - parseInt(starttime);
                        $('span#total').html(`${res * price}`);
                        $('input#total').val(`${res * price}`);
                    }
                });
            }
        });
    });

    $('.addNewTransactionButton').on('click', function () {
        let id = $(this).data('id');
        $.ajax({
            type: "post",
            url: "http://localhost/friend-finder/public/place/getDetailPlace",
            data: {
                id: id
            },
            dataType: "json",
            success: function (data) {
                console.log(data);
                let price = data.price;
                console.log(price);

                // init start & end
                let start, end;
                $('#start').keyup(function (e) {
                    let val = $(this).val();
                    if (val.length > 0) {
                        start = val.slice(0, 2);
                    }
                });

                $('#end').keyup(function (e) {
                    let val = $(this).val();
                    if (val.length > 0) {
                        end = val.slice(0, 2);
                        let res = parseInt(end) - parseInt(start);
                        $('span#total').html(`${res * price}`);
                        $('input#total').val(`${res * price}`);
                    }
                });
            }
        });
    });
});