
$(document).ready(function(){
$('a[data-toggle="tab"]').on('shown.bs.tab', function (e) {
var target = $(e.target).attr("href") // activated tab
var fullid = target.lastIndexOf('-');
var gamename = target.substring(fullid + 1)
if(gamename == 'logologic'){
  gamename = 'Logo Logic'
}
else if(gamename == 'spellbinders'){
  gamename = 'Spell Binders'
}
else{
  gamename = 'Photo Finish'
}
gamename = gamename.concat(' Category Probabilities')
document.getElementById("settingsheader").innerHTML = gamename;
});
});
