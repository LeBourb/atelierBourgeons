$(function(){
	var aBackgrounds = $( 'section > .bg' )
	  ,     $content = $( '#home-content' )
	  ;

	function measureBackgrounds(){
		var i, l, oData, $item, $section, fRW, fRH;

		for( i=0, l=aBackgrounds.length; i<l; i++ ){
			$item    = aBackgrounds.eq(i);
			oData    = $item.data();
			$section = $item.parent();
			$section.appendTo( $content );

			if( !oData.width ){
				oData.width  = $item.width();
				oData.height = $item.height();
			}

			fRW = $section.width()  / oData.width;
			fRH = $section.height() / oData.height;

			$item.css( { width: 'auto', height: 'auto' } ).css( fRW > fRH ? 'width' : 'height', 'auto' );

			//$section.detach();
		}
	}

	$( window ).bind( 'post-resize-anim', measureBackgrounds );
});