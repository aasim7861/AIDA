<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>jQuery UI Accordion - Default functionality</title>
  <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
  <script src="//code.jquery.com/jquery-1.10.2.js"></script>
  <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
  <link rel="stylesheet" href="/resources/demos/style.css">
  <script>
  $(function() {
    $( "#accordion" ).accordion();
  });
  </script>
</head>
<body>
      <<div id="accordion">
  <h3>Section 1</h3>
  <div>
    <p>
    Testing 1
    </p>
  </div>
  <h3>Section 2</h3>
  <div>
    <p>
    Testing 2
    </p>
  </div>
  <h3>Section 3</h3>
  <div>
    <p>
     Testing 3
    </p>
    <ul>
      <li>List item one</li>
      <li>List item two</li>
      <li>List item three</li>
    </ul>
  </div>
  <h3>Section 4</h3>
  <div>
    <p>
   Testing 4
    </p>
    <p>
    Friday Today!
    </p>
  </div>
</div>
 
</body>
</html>