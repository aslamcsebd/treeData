<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Tree map</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
  </head>
  <body class="container mt-5">

    <table class="table table-bordered border border-dark">        
        <tbody>
            <tr>
                <x-parent :parent="$parent" />
            </tr>
        </tbody>
    </table>

    <table class="table table-bordered border border-dark text-center" style="vertical-align: middle;">
        <tbody>
            <tr>
                <td rowspan="5">Bangladesh</td>
                <td rowspan="3">Chittagong</td>
                <td>Halishar</td>
            </tr>
            <tr>               
                <td>New market</td>
            </tr>
            <tr>
                <td>Agrabad</td>
            </tr>
            <tr>
                <td>Dhaka</td>
            </tr>
            <tr>
                <td>Sylhet</td>
            </tr>
        </tbody>
    </table>

    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
  </body>
</html>
