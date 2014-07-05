var displayPopup =  function()
{
	var currentDisplay = window.getComputedStyle(document.getElementById('popup')).display;
	if(currentDisplay=='none')
		document.getElementById('popup').style.display = 'block';
	else
		document.getElementById('popup').style.display = 'none';
};