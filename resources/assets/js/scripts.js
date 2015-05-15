$(function()
{
    // store all Products objects
    window.PRODUCTS = {};

    // register print iframe
    window.printFrame = new PrintFrame();

    // register Bag object
    window.BAG = new Bag();


/* --- @todo refactor ---- */

    $('[data-pid]').each( function()
    {
        var p   = $(this);
        var pid = parseInt(p.attr('data-pid'));

        // register product in global product list
        window.PRODUCTS[pid] = new Product( $(this) );
    })

    if ( $('.ui-notification').length )
    {
        $('#addProductForm [name=name]').focus();
    }






    /* Header
    ------------------------------------------ */

    $('#sidebar header .clear-all').on( 'click', window.BAG.clearAll );

    $('#sidebar .print a').on('click',function(e)
    {
        e.preventDefault();

        window.printFrame.refresh().done( function() { window.printFrame.print() } );
    })




    /* onLoad Storage Management
    ----------------------------------------------- */

    if ( localStorage.length )
    {
        // prep list of items to remove from localStorage
        var trash = [];

        // iterate through saved items
        for ( var i = 0 ; i < localStorage.length ; i++ )
        {
            var pid = parseInt(localStorage.key(i));

            if ( !isNaN(pid) )
            {
                if ( localStorage[pid] === 'true' )
                {
                    // prevent crash if a deleted product is still in the bag
                    if ( !( pid in window.PRODUCTS ) )
                    {
                        trash.push(pid);
                        continue;
                    }

                    // pre-select item
                    window.PRODUCTS[pid].take();
                }
                else
                {
                    // add to trash list
                    trash.push(pid);
                }
            }
        }

        // cleaning localStorage
        if ( trash.length )
        {
            for ( var i = 0 ; i < trash.length ; i++ )
            {
                localStorage.removeItem(trash[i]);
            }
        }
    }

})