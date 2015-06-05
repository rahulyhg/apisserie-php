var Trash = function ()
{
    var $this = this;

    // items to remove from localStorage
    this.items = [];

    this.fill = function ()
    {
        if ( localStorage.length )
        {
            // iterate through saved items
            for ( var i = 0 ; i < localStorage.length ; i++ )
            {
                var pid = parseInt(localStorage.key(i));

                if ( !isNaN(pid) )
                {
                    if ( localStorage.getItem(pid) !== 'false' )
                    {
                        // prevent crash if a deleted product is still in the bag
                        if ( !( pid in window.PRODUCTS ) )
                        {
                            $this.items.push(pid);
                            continue;
                        }

                        // pre-select item
                        window.PRODUCTS[pid]
                            .take()
                            .setNote(localStorage.getItem(pid))
                            .render();

                        if ( localStorage.getItem(pid) !== 'true' )
                        {
                            window.PRODUCTS[pid].setNote(localStorage.getItem(pid));
                        }
                    }
                    else
                    {
                        // add to trash list
                        $this.items.push(pid);
                    }
                }
            }
        }
    }

    // clean localStorage
    this.empty = function ()
    {
        if ( !$this.items.length )
        {
            $this.fill();
        }

        if ( $this.items.length )
        {
            for ( var i = 0 ; i < $this.items.length ; i++ )
            {
                localStorage.removeItem($this.items[i]);
            }
        }
    }
}
