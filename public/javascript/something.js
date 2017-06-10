function showDiv( id ) {
   document.getElementById( id ).style.display = "block";
   window.scrollBy(0, 500);
}

function hideAllTables(id1,id2,id3){
    document.getElementById( id1 ).style.display = "none";
    document.getElementById( id2 ).style.display = "none";
    document.getElementById( id3 ).style.display = "none";
}

function showTable( id,img5,img6,img2,img3,img4,pageNavPosition,pageNavPosition2,pageNavPosition3){
	 document.getElementById( id ).style.display = "inline-table";

	 document.getElementById( img2 ).style.display = "none";
	 document.getElementById( img3 ).style.display = "none";
	 document.getElementById( img4 ).style.display = "none";
	 document.getElementById( img5 ).style.display = "block";
	 document.getElementById( img6 ).style.display = "block";
	 document.getElementById( pageNavPosition).style.display = "block"
    document.getElementById( pageNavPosition2).style.display = "none";
    document.getElementById( pageNavPosition3).style.display = "none";
}
