function showDiv( id ) {
   document.getElementById( id ).style.display = "block";
   window.scrollBy(0, 500);
}

function showTable( id,img5,img6,img2,img3,img4){
	 document.getElementById( id ).style.display = "inline-table";
	 document.getElementById( img2 ).style.display = "none";
	 document.getElementById( img3 ).style.display = "none";
	 document.getElementById( img4 ).style.display = "none";
	 document.getElementById( img5 ).style.display = "block";
	 document.getElementById( img6 ).style.display = "block";
	 document.getElementById(  'pageNavPosition' ).style.display = "block";
}
