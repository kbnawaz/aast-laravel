<!DOCTYPE html>
<html lang="en">
<head>
  <title>Products</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
  <h2>Products</h2>
  <div class="text-right">
    <div class="checkbox">
        <label><input class="status" type="checkbox" value="1" checked="checked">Active</label>
        <label><input class="status" type="checkbox" value="0">InActive</label>
    </div>
  </div>
  <table class="table table-striped table-responsive">
    <thead>
      <tr>
        <th>Product name</th>
        <th>Product sku</th>
        <th>Product description</th>
        <th>Product price</th>
        <th>Product Status</th>
      </tr>
    </thead>
    <tbody id="products">
    </tbody>
  </table>
</div>

</body>
</html>

<script>

    $(document).ready(function() {
        getProducts('1');
        $(".checkbox").change(function() {
            var status = [];
            $('input.status:checkbox:checked').each(function () {
                status.push($(this).val());
            });
            getProducts(status);
        });
    });

    function getProducts(status){
        var link = 'api/products?is_active='+status;
        $.ajax({
            url: link,
            data: '_token = <?php echo csrf_token() ?>',
            type: 'get',            
            success: function (result) {
                $('#products').html(result.data);
            }
        });
    }

    
</script>

