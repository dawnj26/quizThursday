$(function () {
    let table = $('#table')
    let dropdown = $('#category')
    let query = $('#query')
    let search = ''
    let condition = ''

    table.DataTable();
    table.hide();

    dropdown.on('change', function () {
        if ($(this).val() === '') {
            query.prop('disabled', true)
            return
        }
        condition = $(this).val()
        query.prop('disabled', false)
    })

    query.on('keydown', function (e) {
        
        // para makuha niya yung kumpletong value
        setTimeout(() => {
            search = $(this).val()
            if (search === '') table.hide()
            else table.show()
            displayAuthor(search, condition)
            displayPublisher(search, condition)
        }, 50)
        

    })
})

function displayAuthor(s, c) {
    $.ajax({
        url: "search1.php",
        method: "GET",
        data: {
            search: s,
            condition: c
        },
        success: function(response) {
            $('#search1').html(response)
        }
    })
}

function displayPublisher(s, c) {
    $.ajax({
        url: "search2.php",
        method: "GET",
        data: {
            search: s,
            condition: c
        },
        success: function(response) {
            $('#body').html(response)
        }
    })
}