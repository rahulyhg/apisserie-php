/* Shopping Bag
------------------------------------------ */

var Bag = function ()
{
    var $this = this;


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