function validarn(e) { // 1
    tecla = (document.all) ? e.keyCode : e.which; // 2
	//if(tecla==8) return true; // 3
    //if(tecla==9) return true; // 3
    //if(tecla==11) return true; // 3
    if(tecla==48) return true; // 3
    if(tecla==49) return true; // 3
    if(tecla==50) return true; // 3
    if(tecla==51) return true; // 3
    if(tecla==52) return true; // 3
    if(tecla==53) return true; // 3
    if(tecla==54) return true; // 3
    if(tecla==55) return true; // 3
    if(tecla==56) return true; // 3
    if(tecla==57) return true; // 3
    patron = /[A-Za-z-1234567890\s\t]/; // 4
 
    te = String.fromCharCode(tecla); // 5
    return patron.test(te); // 6
}