<div id="zone_notation">
<form id="form_notation">
<legend>Afin de nous aider à vous fournir un meilleur contenu indiquez-nous ce que vous avez pensé de cet article ?</legend>
<input type="hidden" id="id_article" value="<?php echo $_GET['article']; ?>" />
<input type="hidden" id="ip_vote" value="<?php echo $_SERVER['REMOTE_ADDR']; ?>" />
<input type="radio" name="note" id="note_art" value="4"> Très intéressant<br />
<input type="radio" name="note" id="note_art" value="3" checked="checked"> Intéressant<br />
<input type="radio" name="note" id="note_art" value="2"> Peu intéressant<br />
<input type="radio" name="note" id="note_art" value="1"> Pas du tout intéressant<br />
<input type="submit" value="Submit">
</form>
</div>

<script>
    var id_art = document.getElementById('id_article').value;
    var ip_vote = document.getElementById('ip_vote').value;
    var zone_note = document.getElementById('zone_notation');
    
    var leform = document.getElementById('form_notation');
    leform.addEventListener('submit', function(evt) {        
        evt.preventDefault();
        saveNote(getNote());    
    })
    
    function getNote() {        
        var lesinputs = leform.getElementsByTagName('input');        
        for (var i = 0, imax = lesinputs.length; i < imax; i++) {
            if (lesinputs[i].checked) {
                return lesinputs[i].value;
                break;
            }
        }
    }
    
    function saveNote(lanote) {
        var xhr = new XMLHttpRequest();
        xhr.open('GET', './modules/notation/save_note.php?lanote='+encodeURIComponent(lanote)+'&lid='+encodeURIComponent(id_art)+'&lip='+encodeURIComponent(ip_vote));
        
        xhr.onreadystatechange = function() {            
            // console.log('xhr.readyState : ' + xhr.readyState);
            // console.log('xhr.status : ' + xhr.status);
            if (xhr.readyState == 4 && xhr.status == 200) {                
                // console.log(xhr.responseText);
                console.log(xhr.response);                
                // displayResults(xhr.responseXML);
                zone_note.removeChild(leform);
                zone_note.innerHTML = xhr.response;
            }
        };        
        xhr.send(null);
        return xhr;        
    }    
</script>