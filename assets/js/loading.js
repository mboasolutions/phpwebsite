// Define our button click listener
$('#getDataBtn').click(function () {

    // On click, execute the ajax call.
    $.ajax({
        type: "GET",
        url: "https://forbes400.herokuapp.com/api/forbes400?limit=400",
        dataType: 'json',
        beforeSend: function () { // Before we send the request, remove the .hidden class from the spinner and default to inline-block.
            $('#loader').removeClass('hidden')
        },
        success: function (data) {
            // On Success, build our rich list up and append it to the #richList div.
            if (data.length > 0) {
                let richList = "<ol>";
                for (let i = 0; i < data.length; i++) {
                    console.log(data[i].uri);
                    richList += "<li>" + data[i].uri + "</li>";
                }
                richList += "</ol>"
                $('#richList').html(richList);
            }
        },
        complete: function () { // Set our complete callback, adding the .hidden class and hiding the spinner.
            $('#loader').addClass('hidden')
        },
    });
});

$(document).ajaxStart(function() {
    $(".loading").show();
});

$(document).ajaxStop(function() {
    $(".loading").hide();
});