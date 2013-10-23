function showTab(tab){
document.getElementById(tab).style.display = 'block';
}
function hideTab(tab)
{
document.getElementById(tab).style.display = 'none';
}


$('.typeahead').typeahead({                                
  name: 'name',                                                          
  prefetch: '../json/usersname2.json',                                         
  limit: 10                                                                   
});