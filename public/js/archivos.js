window.onload = function () {
    /* const div = document.getElementById("bloqueo");
    div.addEventListener("contextmenu", (e) => {e.preventDefault()}); */

    console.log('si cargo el js')
   
    var myState = {
        pdf: null,
        currentPage: 1,
        zoom: 1
    }
    document.addEventListener('livewire:load', () => {
        
 Livewire.on('cargar_pdf', url => {
        console.log('no entra aki');
        alert(url);

    });
        
 
    });
/*     pdfjsLib.getDocument().then((pdf) => {

        // more code here
    
    }); */
   

}