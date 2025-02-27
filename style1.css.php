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
  background-image: url('C:/Users/Adlin/Downloads/html gp/backInfo.jpg');
  background-position: center;
  background-size: cover;
  position: relative;
}

.header h1
{
  font-family:"Impact", Charcoal, sans-serif;
  font-size:45px;
  font-weight: normal;
  text-align: center;
  flex:1;
  color:black;
  margin-bottom: 20px;
  margin-top: 30px;
}

.navbar {
    width: 100%;
    height: 75px; /* Fixed height for the navbar */
    display: flex;
    align-items: center;
    justify-content: space-between;
    padding: 0 20px;
    background-color: transparent;
    position: relative; /* Ensure it doesn’t overlap */
    z-index: 10; /* Keep it above other elements */
}

.leftFunction {
    display: flex;
    align-items: center;
    gap: 5px; /* Reduces space between icons and text */
}

.leftFunction img:first-child {
    margin-right: 10px; /* Moves the home button slightly away from the leftmost edge */
}

.leftFunction a {
    text-decoration: none; /* Removes underline from links */
    color: black;
    font-size: 20px;
    font-family: fantasy ;
    transition: color 0.3s ease; /* Smooth hover effect */
}

.leftFunction a:hover {
    color: #d4d6db;
}

a img {
    display: block; /* Ensures the image behaves like a button */
}

a img {
    cursor: pointer; /* Makes the images behave like buttons */
    transition: transform 0.2s ease; /* Smooth hover effect */
}

a img:hover {
    transform: scale(1.1); /* Slight zoom-in effect on hover */
}

.rightFunction {
    display: flex;
    align-items: center;
    gap: 20px; /* Space between links */
}

.rightFunction a {
    text-decoration: none; /* Removes underline from links */
    color: black;
    font-size: 20px;
    font-family: fantasy ;
    transition: color 0.3s ease; /* Smooth hover effect */
}

.rightFunction a:hover {
    color: #d4d6db;
}

.rightFunction img {
    width: 45px;
    height: 45px;
}

/* Form Section */
.form-stdInfo {
  width: 100%;
}

table {
  width: 100%;
  border-spacing: 15px;
  margin: 0 auto;
}

td {
  padding: 10px;
  vertical-align: middle;
  font-family: 'Norwester', sans-serif;
  font-weight: bold;
}

input, select {
  width: 100%;
  padding: 10px;
  font-size: 14px;
  border: 1px solid #ccc;
  border-radius: 5px;
  outline: none;
}

input:focus, select:focus {
  border-color: #0056b3;
  box-shadow: 0 0 5px rgba(0, 86, 179, 0.5);
}

input[type="radio"] {
  margin-right: 5px;
  margin-left: 2px;
  width: auto;
}

.form-buttons {
  display: flex;
  justify-content: center; 
  align-items: center;
  gap: 30px;
  margin: 25px auto;
  width: fit-content; 
}

form button {
  padding: 10px 20px;
  font-size: 16px;
  font-weight: bold;
  border: none;
  border-radius: 5px;
  cursor: pointer;
}

form .clear {
  background-color: #0c7adf;
  color: black;
}

form .save {
  background-color: #0c7adf;
  color: black;
}

form .next {
  background-color: #0c7adf;
  color: black;
}

form button:hover {
  opacity: 0.8;
}