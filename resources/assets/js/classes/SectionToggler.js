

var SectionToggler = function ()
{
    var $this = this;

    // shortcuts
    this.container = $('main');
    this.trigger   = $('#sidebar li.sections');

    // properties
    this.visible = false;

    this.construct = function ()
    {
        $this.trigger.on( 'click', $this.onTriggerClick )
    }

    this.onTriggerClick = function ( e )
    {
        e.preventDefault();

        $this.toggle();
    }

    this.toggle = function ()
    {
        var state = $this.visible ? 0 : 1;

        $this.container.attr( 'data-sections', state );
        $this.trigger.find('a').css({ display : 'block' }).filter( $this.visible ? '.off' : '.on' ).hide();

        $this.visible = !$this.visible;
    }

    this.construct();
}