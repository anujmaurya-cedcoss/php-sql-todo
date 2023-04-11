// function to display (all by-default)
function display(param) {
    $.ajax({
        type: "POST",
        url: "handler.php",
        data: { 'type': 'display', 'param': param },
        dataType: 'text',
        success: function (res) {
            $('.incomplete-list').html(res);
        }
    })
}
display('all');
$(document).ready(function () {
    // to add in todo
    $(document).on('click', '.add-todo', function () {
        title = $('#form3').val();
        date = $('#datepicker').val();
        console.log(date);
        $.ajax({
            type: "POST",
            url: "handler.php",
            data: { 'type': 'add', 'title': title, 'date': date },
            dataType: 'text',
            success: function (res) {
                console.log(res);
                display('all');
            }
        })
    })

    // toggle the todo
    $(document).on('click', '.toggle-item', function () {
        idx = $(this).attr('id');
        $.ajax({
            type: "POST",
            url: "handler.php",
            data: { 'type': 'toggle', 'id': idx },
            dataType: 'text',
            success: function (res) {
                display('all');
            }
        })
    })
    // action on delete button
    $(document).on('click', '.delete-btn', function () {
        idx = $(this).attr('id');
        console.log(idx);
        $.ajax({
            type: "POST",
            url: "handler.php",
            data: { 'type': 'delete', 'id': idx },
            dataType: 'text',
            success: function (res) {
                display('all');
            }
        })
    })

    // action on display all button
    $(document).on('click', '.all', function () {
        display('all');
    })

    $(document).on('click', '#active', function () {
        display('incomplete');
    })

    $(document).on('click', '.completed', function () {
        display('complete');
    })
    // clear complete action
    $(document).on('click', '.clear-complete', function () {
        $.ajax({
            type: "POST",
            url: "handler.php",
            data: { 'type': 'clear_completed' },
            dataType: 'text',
            success: function (res) {
                display('all');
            }
        })
    });
    // count incomplete tasks











    // to edit
    $(".ip").keyup(function () {
        $val = $(this).val();
        console.log();
    });

});
