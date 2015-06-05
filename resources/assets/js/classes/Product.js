/* Products
------------------------------------------ */

var Product = function ( container )
{
    var $this = this;

    // shortcuts
    this.container     = container;
    this.trash         = this.container.find('.remove');
    this.noteContainer = this.container.find('.note');
    this.note          = this.noteContainer.find('input');

    // product ID
    this.ID = parseInt(this.container.attr('data-pid'));

    // product selected yes/no
    this.active = false;

    // product note
    this.noteContent = '';


    this.construct = function ()
    {
        $this.container.on( 'click', $this.onItemClick );
        $this.trash.on( 'click', $this.onTrashClick );
        $this.note.on( 'blur', $this.onNoteBlur );
    }

    this.take = function ()
    {
        $this.active = true;

        return $this;
    }

    this.drop = function ()
    {
        $this.active = false;

        return $this;
    }

    this.setNote = function ()
    {
        var content = arguments.length ? arguments[0] : $this.note.val();

        $this.noteContent = content;

        return $this;
    }

    // propagate all object data to frontend
    this.render = function ()
    {
        if ( $this.active )
        {
            $this.container.addClass('selected');

            localStorage.setItem( $this.ID, $this.noteContent );

            $this.note.val($this.noteContent);
        }
        else
        {
            $this.container.removeClass('selected');

            localStorage.removeItem( $this.ID );
        }
    }

    this.onNoteBlur = function (e)
    {
        e.preventDefault();

        var note = $this.note.val();

        if ( note !== $this.noteContent )
        {
            $this.setNote(note).render();
        }
    }

    this.onItemClick = function (e)
    {
        e.preventDefault();

        $this.note.focus();

        $this.take().render();
    }

    this.onTrashClick = function (e)
    {
        e.preventDefault();
        e.stopPropagation();

        $this.drop().render();
    }

    this.construct();
}