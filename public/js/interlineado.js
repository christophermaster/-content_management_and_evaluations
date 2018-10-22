/**
 * Basic sample plugin inserting abbreviation elements into CKEditor editing area.
 */

// Register the plugin with the editor.
// http://docs.cksource.com/ckeditor_api/symbols/CKEDITOR.plugins.html
CKEDITOR.plugins.add('example', {
    /*
	(function()
		{
				function getState( editor, path )
				{
					var firstBlock = path.block || path.blockLimit;
			
					if ( !firstBlock || firstBlock.getName() == 'body' )
						return CKEDITOR.TRISTATE_OFF;
			
					return ( getAlignment( firstBlock, editor.config.useComputedState ) == this.value ) ?
						CKEDITOR.TRISTATE_ON :
						CKEDITOR.TRISTATE_OFF;
				}
				function getAlignment( element, useComputedState )
				{
					useComputedState = useComputedState === undefined || useComputedState;
			
					var align;
					if ( useComputedState )
						align = element.getComputedStyle( 'text-align' );
					else
					{
						while ( !element.hasAttribute || !( element.hasAttribute( 'align' ) || element.getStyle( 'text-align' ) ) )
						{
							var parent = element.getParent();
							if ( !parent )
								break;
							element = parent;
						}
						align = element.getStyle( 'text-align' ) || element.getAttribute( 'align' ) || '';
					}
			
					align && ( align = align.replace( /-moz-|-webkit-|start|auto/i, '' ) );
			
					!align && useComputedState && ( align = element.getComputedStyle( 'direction' ) == 'rtl' ? 'right' : 'left' );
			
					return align;
				}
			
				function onSelectionChange( evt )
				{
					if ( evt.editor.readOnly )
						return;
			
					var command = evt.editor.getCommand( this.name );
					command.state = getState.call( this, evt.editor, evt.data.path );
					command.fire( 'state' );
				}
			
				function justifyCommand( editor, name, value )
				{
					this.name = name;
					this.value = value;
			
					var classes = editor.config.justifyClasses;
					if ( classes )
					{
						switch ( value )
						{
							case 'left' :
								this.cssClassName = classes[0];
								break;
							case 'center' :
								this.cssClassName = classes[1];
								break;
							case 'right' :
								this.cssClassName = classes[2];
								break;
							case 'justify' :
								this.cssClassName = classes[3];
								break;
						}
			
						this.cssClassRegex = new RegExp( '(?:^|\\s+)(?:' + classes.join( '|' ) + ')(?=$|\\s)' );
					}
				}
			
				function onDirChanged( e )
				{
					var editor = e.editor;
			
					var range = new CKEDITOR.dom.range( editor.document );
					range.setStartBefore( e.data.node );
					range.setEndAfter( e.data.node );
			
					var walker = new CKEDITOR.dom.walker( range ),
						node;
			
					while ( ( node = walker.next() ) )
					{
						if ( node.type == CKEDITOR.NODE_ELEMENT )
						{
							// A child with the defined dir is to be ignored.
							if ( !node.equals( e.data.node ) && node.getDirection() )
							{
								range.setStartAfter( node );
								walker = new CKEDITOR.dom.walker( range );
								continue;
							}
			
							// Switch the alignment.
							var classes = editor.config.justifyClasses;
							if ( classes )
							{
								// The left align class.
								if ( node.hasClass( classes[ 0 ] ) )
								{
									node.removeClass( classes[ 0 ] );
									node.addClass( classes[ 2 ] );
								}
								// The right align class.
								else if ( node.hasClass( classes[ 2 ] ) )
								{
									node.removeClass( classes[ 2 ] );
									node.addClass( classes[ 0 ] );
								}
							}
			
							// Always switch CSS margins.
							var style = 'text-align';
							var align = node.getStyle( style );
			
							if ( align == 'left' )
								node.setStyle( style, 'right' );
							else if ( align == 'right' )
								node.setStyle( style, 'left' );
						}
					}
				}
		})();*/

    // The plugin initialization logic goes inside this method.
    // http://docs.cksource.com/ckeditor_api/symbols/CKEDITOR.pluginDefinition.html#init
    init: function(editor) {
        // Define an editor command that inserts an abbreviation. 
        // http://docs.cksource.com/ckeditor_api/symbols/CKEDITOR.editor.html#addCommand
        editor.addCommand('interlineadoDialog', new CKEDITOR.dialogCommand('interlineadoDialog'));
        // Create a toolbar button that executes the plugin command. 
        // http://docs.cksource.com/ckeditor_api/symbols/CKEDITOR.ui.html#addButton
        editor.ui.addButton('Interlineado', {
            // Toolbar button tooltip.
            label: 'Modificar Interlineado',
            // Reference to the plugin command name.
            command: 'interlineadoDialog',
            // Button's icon file path.
            icon: this.path + 'images/icon.png'
        });
        // Add a dialog window definition containing all UI elements and listeners.
        // http://docs.cksource.com/ckeditor_api/symbols/CKEDITOR.dialog.html#.add
        CKEDITOR.dialog.add('interlineadoDialog', function(editor) {
            return {
                // Basic properties of the dialog window: title, minimum size.
                // http://docs.cksource.com/ckeditor_api/symbols/CKEDITOR.dialog.dialogDefinition.html
                title: 'Propiedades',
                minWidth: 400,
                minHeight: 200,
                // Dialog window contents.
                // http://docs.cksource.com/ckeditor_api/symbols/CKEDITOR.dialog.definition.content.html
                contents: [{
                    // Definition of the Basic Settings dialog window tab (page) with its id, label, and contents.
                    // http://docs.cksource.com/ckeditor_api/symbols/CKEDITOR.dialog.contentDefinition.html
                    id: 'tab1',
                    label: 'Configuracion Basica',
                    elements: [{
                        // Dialog window UI element: a text input field for the abbreviation text.
                        // http://docs.cksource.com/ckeditor_api/symbols/CKEDITOR.ui.dialog.textInput.html
                        type: 'text',
                        id: 'interlineado',
                        // Text that labels the field.
                        // http://docs.cksource.com/ckeditor_api/symbols/CKEDITOR.ui.dialog.labeledElement.html#constructor
                        label: 'Interlineado (1, 1.5, 2, etc)',
                        // Validation checking whether the field is not empty.
                        validate: CKEDITOR.dialog.validate.notEmpty("Especificar un interlineado")
                    }]
                }],
                // This method is invoked once a user closes the dialog window, accepting the changes.
                // http://docs.cksource.com/ckeditor_api/symbols/CKEDITOR.dialog.dialogDefinition.html#onOk
                onOk: function() {
                    // A dialog window object.
                    // http://docs.cksource.com/ckeditor_api/symbols/CKEDITOR.dialog.html 
                    var dialog = this;
                    // Create a new abbreviation element and an object that will hold the data entered in the dialog window.
                    // http://docs.cksource.com/ckeditor_api/symbols/CKEDITOR.dom.document.html#createElement

                    //var interlineado = editor.document.createElement( 'interlineado' );

                    // Retrieve the value of the "title" field from the "tab1" dialog window tab.
                    // Send it to the created element as the "title" attribute.
                    // http://docs.cksource.com/ckeditor_api/symbols/CKEDITOR.dom.element.html#setAttribute

                    //interlineado.setAttribute( 'title', dialog.getValueOf( 'tab1', 'interlineado' ) );

                    // Set the element's text content to the value of the "abbr" dialog window field.
                    // http://docs.cksource.com/ckeditor_api/symbols/CKEDITOR.dom.element.html#setText

                    //interlineado.setText( dialog.getValueOf( 'tab1', 'interlineado' ) );


                    // Insert the newly created abbreviation into the cursor position in the document.					
                    // http://docs.cksource.com/ckeditor_api/symbols/CKEDITOR.editor.html#insertElement

                    //editor.insertElement( interlineado );
                    var selection = editor.getSelection(),
                        enterMode = editor.config.enterMode;

                    if (!selection)
                        return;

                    var bookmarks = selection.createBookmarks(),
                        ranges = selection.getRanges(true);

                    var cssClassName = this.cssClassName,
                        iterator,
                        block;

                    var useComputedState = editor.config.useComputedState;
                    useComputedState = useComputedState === undefined || useComputedState;

                    for (var i = ranges.length - 1; i >= 0; i--) {
                        iterator = ranges[i].createIterator();
                        iterator.enlargeBr = enterMode != CKEDITOR.ENTER_BR;

                        while ((block = iterator.getNextParagraph(enterMode == CKEDITOR.ENTER_P ? 'p' : 'div'))) {
                            block.removeAttribute('align');
                            block.removeStyle('text-align');

                            // Remove any of the alignment classes from the className.
                            var className = cssClassName && (block.$.className =
                                CKEDITOR.tools.ltrim(block.$.className.replace(this.cssClassRegex, '')));

                            var apply =
                                (this.state == CKEDITOR.TRISTATE_OFF) &&
                                (!useComputedState || (getAlignment(block, true) != this.value));

                            if (cssClassName) {
                                // Append the desired class name.
                                if (apply)
                                    block.addClass(cssClassName);
                                else if (!className)
                                    block.removeAttribute('class');
                            } else if (apply)
                                block.setStyle('text-align', this.value);
                        }

                    }

                    editor.focus();
                    editor.forceNextSelectionCheck();
                    selection.selectBookmarks(bookmarks);
                }
            };
        });
    }
});