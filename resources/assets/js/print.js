$(function()
{

    for ( var i = 0 ; i < localStorage.length ; i++ )
    {
        var pid = parseInt(localStorage.key(i));

        if ( localStorage.getItem(pid) !== null )
        {
            $('.product[data-pid=' + pid + ']')
                .addClass('selected')
                .parents('.section')
                .addClass('selected')

            if ( localStorage.getItem(pid) !== '' )
            {
                $('.product[data-pid=' + pid + ']')
                    .find('.note')
                        .text('('+localStorage.getItem(pid)+')')
            }

        }
    }

})