*
{
	margin: 0;
	padding: 0;
	box-sizing: border-box;
}

.header
{
	min-height: 100vh;
	width: 100%;
	background-image: url('C:/Users/Adlin/Downloads/html gp/interface1.jpg');
	background-position: center;
	background-size: cover;
	position: relative;
}	

nav
{
	display:flex;
	padding: 2% 6%;
	justify-content: space-between;
	align-items: center;
}

nav img
{
	width: 150px;
}

.nav-links
{
	flex: 1;
	text-align: right;
}

.nav-links ul li
{
	list-style: none;
	display: inline-block;
	padding: 8px 12px;
	position: relative;
}

.nav-links ul li:after
{
	content:'';
	width: 0%;
	height: 2px;
	background-color:#c7ddeb;
	display: block;
	margin: auto;
	transition: 0.5s;
}

.nav-links ul li:hover::after
{
	width: 100%;
}

.nav-links ul li a
{
	text-decoration: none;
	color: black;
	font-size: 20px;
	font-family: fantasy ;
}

.nav-links ul li a:hover
{
	color:#d4d6db;
}

.text-box
{
	width: 90%;
	color: black;
	position: absolute;
	top: 40%;
	left: 5%;
	trasnform: translate(-50%, -50%);
	text-align: center;
}

.text-box h1
{
	font-size: 70px;
}

.text-box p
{
	margin: 10px 40px;
	font-size: 26px;
	color: black;
}

.login-button
{
	margin-top: 5px;
}

.login-button button 
{
	background-color: #8098ae;
    color: black;
    font-family: 'Roboto Condensed', sans-serif;
    font-size: 22px;
    font-weight: bold;
    padding: 15px 30px;
    border: 2px solid black;
    border-radius: 50px;
    cursor: pointer;
    transition: 0.5;
}

.login-button button:hover {
    background-color: #d4d6db;
    color: black;
}