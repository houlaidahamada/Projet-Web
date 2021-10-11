

function showPass(){
	$('#oeil').toggleClass("bi-eye bi-eye-slash");
	var type = $('#mdp').attr("type");
	
	if(type === 'password')
	{
		$('#mdp').attr("type", "text");
	} 
	else
	{
		$('#mdp').attr("type", "password");
	}
};

function showPass2(){
	$('#oeil2').toggleClass("bi-eye bi-eye-slash");
	var type = $('#mdp2').attr("type");
	
	if(type === 'password')
	{
		$('#mdp2').attr("type", "text");
	} 
	else
	{
		$('#mdp2').attr("type", "password");
	}
};
