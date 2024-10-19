
// Thanks, ChatGPT :)

function fetchOptions(callback) {
    $.ajax({
        url: '../../backend/all_tickers.txt', 
        method: 'GET',
        dataType: 'text',
        success: function(data) {
            const codes = data.split('\n').map(line => line.trim()).filter(line => line !== '');
            callback(codes);
        },
        error: function(jqXHR, textStatus, errorThrown) {
            console.error('AJAX Error:', textStatus, errorThrown);
            $('#error-message').show();
        }
    });
}

$(document).ready(function() {
    $('#error-message').hide();
    $('#loading-message').show();

    fetchOptions(function(codes) {
        $("#code-input").autocomplete({
            source: function(request, response) {
                
                const filteredResults = $.ui.autocomplete.filter(codes, request.term);
                response(filteredResults.slice(0, 5));
            },
            minLength: 1,
            delay: 100,
            select: function(event, ui) {
                console.log("Selected: " + ui.item.value);
            }
        });

        $('#loading-message').hide();
    });
});
