$(function()
{

    for ( var i = 0 ; i < localStorage.length ; i++ )
    {
        var pid = parseInt(localStorage.key(i));

        if ( localStorage[pid] === 'true' )
        {
            $('.product[data-pid=' + pid + ']')
                .addClass('selected')
                .parents('.section')
                .addClass('selected')
        }
    }

})