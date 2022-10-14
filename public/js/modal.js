function showTransactionModal(id){
    
    $.ajax('http://127.0.0.1:8000/api/showTransactionModal', {
        type: 'POST',
        data: { id : id },
        dataType: 'json',
        success: function (data, status, xhr, response, json) {
        
        // handle the success part
        
        $('#txid').val(data[0]['id']);
        $('#uid').val(data[0]['uid']);
        $('#image-url').attr("href", data[0]['image_url']);
        $('#username').val(data[0]['username']);
        
        $('#amount').val(data[0]['amount']);
        
        $('#method').val(data[0]['method']);
        
        $('#status').val(data[0]['status']);
  
    },
        error: function (xhr, textStatus, errorMessage) {
        console.log(xhr.errorMessage);
    }
    });
}

function displaySuccessMessage(message) {
    $('#message').html(`
        <div class="alert alert-success" role="alert">
            <strong>Success!</strong> ${message}
        </div>
    `);
}

function displayErrorMessage(message) {
    $('#message').html(`
        <div class="alert alert-danger" role="alert">
            <strong>Failed!</strong> ${message}
        </div>
    `);
}

function updateTransaction() {
    var myform = $("#update-form");
    var disabled = myform.find(':input:disabled').removeAttr('disabled');
    var datastring = myform.serialize();
    disabled.attr('disabled', 'disabled');
    $.ajax('http://127.0.0.1:8000/api/updateTransaction', {
        type: 'POST',
        data: datastring ,
        dataType: 'json',
        success: function (data) {
            if(data['status'] == 'Approved' || data['status'] == 'Rejected')
                $('#status').attr('disabled', 'disabled');
            displaySuccessMessage('Transaction is updated sucesssfully!');
        },
        error: function (errorMessage) {
            console.log(errorMessage);
            displayErrorMessage('Transaction is failed to update!');
        }
    })
}



$(document).ready(function () {
    var trans_table = $('#transaction-table');
    if(trans_table) 
        trans_table.DataTable({
            "pageLength" : 50
        });
});

$(document).ready(function () {
    var bets_table = $('#bets-management-table');
    if(bets_table) 
        bets_table.DataTable({
            "pageLength" : 50
        });
});

$(document).ready(function () {
    var crash_table = $('#crash-table');
    if(crash_table) 
        crash_table.DataTable({
            "pageLength" : 50
        });
});

$(document).ready(function () {
    var user_table = $('#user-table');
    if(user_table) 
        user_table.DataTable({
            "pageLength" : 50
        });
});