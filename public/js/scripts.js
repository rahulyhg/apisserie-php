$(function()
{
    // store all Products objects
    window.PRODUCTS = {};



    var PrintFrame = function ()
    {
        var $this = this;

        this.iframe = $('#print-frame')[0];


        this.refresh = function ()
        {
            $this.iframe.src = $this.iframe.src;
        }

        this.print = function ()
        {
            $this.iframe.contentWindow.print();
        }
    }

    // register print iframe
    window.printFrame = new PrintFrame();






    /* Shopping Bag
    ------------------------------------------ */

    var Bag = function ()
    {
        var $this = this;


        this.addItem = function ( pid )
        {
            localStorage[pid] = true;
            window.printFrame.refresh();
        }

        this.removeItem = function ( pid )
        {
            localStorage[pid] = false;
            window.printFrame.refresh();
        }

        this.clearAll = function ( e )
        {
            e.preventDefault();

            for ( var pid in window.PRODUCTS )
            {
                window.PRODUCTS[pid].drop();
            }
        }
    }

    window.BAG = new Bag();








    /* Products
    ------------------------------------------ */

    var Product = function ( container )
    {
        var $this = this;

        // shortcuts
        this.container = container;
        this.trash     = this.container.find('.remove');

        // product ID
        this.ID = parseInt(this.container.attr('data-pid'));

        // product selected yes/no
        this.active = false;


        this.construct = function ()
        {
            $this.container.on( 'click', $this.take );
            $this.trash.on( 'click', $this.drop );
        }

        // set active
        this.take = function ()
        {
            $this.container.addClass('selected');
            $this.active = true;

            BAG.addItem( $this.ID );
        }

        // unset active
        this.drop = function ()
        {
            if ( arguments.length )
            {
                arguments[0].stopPropagation();
            }

            $this.container.removeClass('selected');
            $this.active = false;

            BAG.removeItem( $this.ID );
        }

        this.construct();
    }


/* -------- */

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

        window.printFrame.print();
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