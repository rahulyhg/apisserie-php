var PrintFrame = function ()
{
    var $this = this;

    this.iframe = $('#print-frame')[0];


    this.refresh = function ()
    {
        var dfd = new $.Deferred();

        $this.iframe.src = $this.iframe.src;

        $($this.iframe).on( 'load', dfd.resolve );

        return dfd.promise();
    }

    this.print = function ()
    {
        $this.iframe.contentWindow.print();
    }
}