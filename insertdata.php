<?php

pagedirection();


function pagedirection()
{

print_r($_SERVER['REQUEST_METHOD']);
if ($_SERVER['REQUEST_METHOD'] === 'POST')
{

	//goes to breed search 
	if(isset($POST['Yesbutton']))
	{
		header('Location: https://uadopt.netlify.com/breed_search.html');
	}
	//goes to most important traits selection
	else 
	{
		header('Location: https://uadopt.netlify.com/most_important_traits_selection.html');
	}
}



}



?>