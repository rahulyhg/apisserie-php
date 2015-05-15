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

    var trash = new Trash();
    trash.empty();

})