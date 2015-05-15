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