
var DeleteProductForm = function ()
{
    var $this = this;

    this.formItems = $('.DeleteProductForm');

    this.construct = function ()
    {
        $this.formItems.on( 'submit', $this.onFormSubmit );
    }

    this.onFormSubmit = function (e)
    {
        if ( !$(this).hasClass('warning') )
        {
            e.preventDefault();
            $(this).addClass('warning');
        }
    }

    this.construct();
}