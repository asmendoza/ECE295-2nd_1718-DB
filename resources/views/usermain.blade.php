<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <title>Test</title>
    <link href="/css/app.css?v={{ rand() }}" rel="stylesheet">
</head>

<body>

<div class="container" id="app">
    <user-list v-if="showList"></user-list>
    <user-form v-if="showForm"></user-form>
</div>

<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="/js/app.js?v={{ rand() }}"></script>
</body>
</html>
