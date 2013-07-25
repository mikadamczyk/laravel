/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
var hs = { hide : 'Hide', show : 'Show' };
var yn = { no : 'No', yes : 'Yes' };

$(document).ready(function() {
    $('.ajax-link').click(function(e){
        var link = $(this);
        $.ajax({
            url: $(this).attr('href'),
            type: 'POST',
            data: {id: 1, type: 'asd'},
            dataType: 'json',
            success: function(info){
                var text = info.actual ? hs.hide : hs.show;
                var info = info.actual ? yn.no : yn.yes;
                $(link).text(text);
                var hiddenCol = $(link).parent('td').siblings('.hiddenCol');
                $(hiddenCol).text(info);
//                console.log($(link).parent('td').siblings('.hiddenCol') );
            }
        });

        e.preventDefault();
    });
});