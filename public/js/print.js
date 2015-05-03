$(function()
{

    for ( var i = 0 ; i < localStorage.length ; i++ )
    {
        var pid = parseInt(localStorage.key(i));

        $('.product[data-pid=' + pid + ']')
            .addClass('selected')
            .parents('.section')
            .addClass('selected')
    }

})