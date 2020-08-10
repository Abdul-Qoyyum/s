<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>

    <!-- Vuetify font -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700,900" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/@mdi/font@5.x/css/materialdesignicons.min.css" rel="stylesheet">  
    
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
   
</head>
<body>
    <div id="app">
       <admin-component slug="{{ $slug }}"></admin-component>
    </div>
</body>
</html>
