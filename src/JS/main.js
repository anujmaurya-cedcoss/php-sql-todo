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

// function to count remaining
function countRemaining() {
    $.ajax({
        type: "POST",
        url: "handler.php",
        data: { 'type': 'count_completed' },
        dataType: 'text',
        success: function (res) {
            // display('all');
            $('.todo-left').html("Remaining : " + res);
        }
    });
}

$(document).ready(function () {
    // to add in todo
    $(document).on('click', '.add-todo', function () {
        title = $('#form3').val();
        date = $('#datepicker').val();
        $.ajax({
            type: "POST",
            url: "handler.php",
            data: { 'type': 'add', 'title': title, 'date': date },
            dataType: 'text',
            success: function (res) {
                display('all');
                countRemaining();
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
                countRemaining();
            }
        })
    })
    // action on delete button
    $(document).on('click', '.delete-btn', function () {
        idx = $(this).attr('id');
        $.ajax({
            type: "POST",
            url: "handler.php",
            data: { 'type': 'delete', 'id': idx },
            dataType: 'text',
            success: function (res) {
                display('all');
                countRemaining();
            }
        })
    })

    // action on display all button
    $(document).on('click', '.all', function () {
        display('all');
        countRemaining();
    })

    $(document).on('click', '#active', function () {
        display('incomplete');
        countRemaining();
    })

    $(document).on('click', '.completed', function () {
        display('complete');
        countRemaining();
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
                countRemaining();
            }
        })
    });


    // to edit
    $(document).on('keyup', '.ip', function () {
        val = $(this).val();
        id = $(this).attr('id');
        console.log(val);
        $.ajax({
            type: "POST",
            url: "handler.php",
            data: { 'type': 'update', 'val': val, 'id': id },
            dataType: 'text',
        })
    })
    display('all');
    countRemaining();
});
