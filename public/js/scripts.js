$(function()
{
    // store all Products objects
    window.PRODUCTS = {};



    /* Shopping Bag
    ------------------------------------------ */

    var Bag = function ()
    {
        var _this = this;


        this.addItem = function ( pid )
        {
            localStorage[pid] = true;
        }

        this.removeItem = function ( pid )
        {
            localStorage[pid] = false;
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
        var _this = this;

        // shortcuts
        this.container = container;
        this.trash     = this.container.find('.remove');

        // product ID
        this.ID = parseInt(this.container.attr('data-pid'));

        // product selected yes/no
        this.active = false;


        this.construct = function ()
        {
            _this.container.on( 'click', _this.take );
            _this.trash.on( 'click', _this.drop );
        }

        // set active
        this.take = function ()
        {
            _this.container.addClass('selected');
            _this.active = true;

            BAG.addItem( _this.ID );
        }

        // unset active
        this.drop = function ()
        {
            if ( arguments.length )
            {
                arguments[0].stopPropagation();
            }

            _this.container.removeClass('selected');
            _this.active = false;

            BAG.removeItem( _this.ID );
        }

        this.construct();
    }




$('[data-pid]').each( function()
{
    var p   = $(this);
    var pid = parseInt(p.attr('data-pid'));

    // register product in global product list
    window.PRODUCTS[pid] = new Product( $(this) );
})





    /* Sections
    ------------------------------------------ */
/*
    var Section = function ( container )
    {
        var _this = this;

        // shortcuts
        this.container = container;
        this.toggle    = this.container.find('.toggle');

        // product list
        this.products  = [];


        this.construct = function ()
        {
            _this.container.find('.product').each( _this.registerProduct );
            _this.toggle.on( 'click', _this.toggleList );
        }

        // show/hide section content
        this.toggleList = function ()
        {
            _this.container.toggleClass('hide');
        }

        // add products to the global list
        this.registerProduct = function ( index, element )
        {
            var p   = $(element);
            var pid = parseInt(p.attr('data-pid'));

            // register product in global product list
            window.PRODUCTS[pid] = new Product( $(element) );

            // register pid in the section object
            _this.products.push(pid);
        }

        this.construct();
    }


    window.Sections = [];

    $('.section').each( function( i, item )
    {
        window.Sections.push( new Section($(item)) );
    })
*/


    /* Header
    ------------------------------------------ */

    $('#sidebar header .clear-all').on( 'click', window.BAG.clearAll );




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