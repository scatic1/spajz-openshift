
 function prikazi(mSlika, vSlika) {
                document.getElementById('velikaslika').src = mSlika;
                prikaziSliku();
				
               
            }
            
               
			
			function prikaziSliku() {
                document.getElementById('velikaSlika').style.display = 'block';
            }
			document.onkeydown = function(evt) {
    evt = evt || window.event;
    if (evt.keyCode == 27) {
       
		document.getElementById('velikaSlika').style.display = 'none';
    }
};