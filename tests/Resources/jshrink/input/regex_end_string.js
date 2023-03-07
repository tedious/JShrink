escapeCssMeta: function( string ) {
    return (string || '').replace( /([\\!"#$%&'()*+,./:;<=>?@\[\]^`{|}~])/g, "\\$1" );
},