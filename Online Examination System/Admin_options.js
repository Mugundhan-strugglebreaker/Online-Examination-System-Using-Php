  	var tabButtons=document.querySelectorAll("button");
var tabPanels=document.querySelectorAll(".tabPanel");
function showPanel(panelIndex,colorCode)
{
	tabButtons.forEach(function(node)
	{
		node.style.backgroundColor="";
		node.style.color="";
	});
	tabButtons[panelIndex].style.backgroundColor=colorCode;
	tabButtons[panelIndex].style.color="white";
	tabPanels.forEach(function(node)
	{
		node.style.display="none";
	});
	tabPanels[panelIndex].style.backgroundColor=colorCode;
	tabPanels[panelIndex].style.display="block";

}
  