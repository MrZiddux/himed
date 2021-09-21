const watchdog = new CKSource.EditorWatchdog();
  
  window.watchdog = watchdog;
  
  watchdog.setCreator( ( element, config ) => {
    return CKSource.Editor
      .create( element, config )
      .then( editor => {
        
        
        
  
        return editor;
      } )
  } );
  
  watchdog.setDestructor( editor => {
    
    
  
    return editor.destroy();
  } );
  
  watchdog.on( 'error', handleError );
  
  watchdog
    .create( document.querySelector( '.editor' ), {
      
    toolbar: {
      items: [
        'undo',
        'redo',
        'heading',
        '|',
        'textPartLanguage',
        'bold',
        'italic',
        'underline',
        'fontColor',
        'fontFamily',
        'fontSize',
        'fontBackgroundColor',
        'findAndReplace',
        'link',
        'bulletedList',
        'numberedList',
        'alignment',
        'todoList',
        '|',
        'outdent',
        'indent',
        '|',
        'imageUpload',
        'imageInsert',
        'blockQuote',
        'insertTable',
        'specialCharacters',
        'horizontalLine',
        'htmlEmbed',
        'sourceEditing',
        'codeBlock',
        'pageBreak'
      ]
    },
    language: 'id',
    image: {
      toolbar: [
        'imageTextAlternative',
        'imageStyle:inline',
        'imageStyle:block',
        'imageStyle:side',
        'linkImage'
      ]
    },
    table: {
      contentToolbar: [
        'tableColumn',
        'tableRow',
        'mergeTableCells',
        'tableCellProperties',
        'tableProperties'
      ]
    },
      licenseKey: '',
      
      
      
    } )
    .catch( handleError );
  
  function handleError( error ) {
    console.error( 'Oops, something went wrong!' );
    console.error( 'Please, report the following error on https://github.com/ckeditor/ckeditor5/issues with the build id and the error stack trace:' );
    console.warn( 'Build id: yjrj68rw1eve-mh57uhyptrc4' );
    console.error( error );
  }