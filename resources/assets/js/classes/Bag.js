/* Shopping Bag
------------------------------------------ */

var Bag = function ()
{
    var $this = this;

    this.clearAll = function ( e )
    {
        e.preventDefault();

        for ( var pid in window.PRODUCTS )
        {
            window.PRODUCTS[pid].drop().render();
        }

        localStorage.clear();
    }
}