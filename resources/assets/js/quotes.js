$( document ).ready(function() {
    $('.quote-row').click(function(){
        var ship_id = $(this).attr('id');
        //console.log("Clicked on " + ship_id);
        if ($.isNumeric(ship_id)) {
            window.location.href = "/data/quotes/ship/" + ship_id;
        } else {
            window.location.href = "/data/quotes/npc/" + ship_id;
        }
    });

    var $tbody = $('table#quote-table tbody');
    $tbody.find('tr').sort(function(a,b){ 
        var tda = $(a).find('th').text(); // can replace 1 with the column you want to sort on
        var tdb = $(b).find('th').text(); // this will sort on the second column
        if ($.isNumeric(tda) && $.isNumeric(tdb)){
            return parseInt(tda) - parseInt(tdb);
        } else if ($.isNumeric(tda)) {
            return 1;
        } else {
            return -1;
        }
    }).appendTo($tbody);
});