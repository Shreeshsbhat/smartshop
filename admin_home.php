
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title></title>
</head>
<body>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://unpkg.com/spectre.css/dist/spectre.min.css">
<link rel="stylesheet" href="https://unpkg.com/spectre.css/dist/spectre-exp.min.css">
<link rel="stylesheet" href="https://unpkg.com/spectre.css/dist/spectre-icons.min.css">
<style>
    :root{
        --dark-text:#130f40;
        --light-bg:#7ed6df;
    }
.navbar-colored{
    background-color: var(--light-bg);
}


.navbar img{
    height:100px;
}

.navbar .btn-link{
    color:var(--dark-text);
}
body{
    background-color:#eeeeee;
}
.exp-100{
    width:90%;
}
</style>
</head>
<body>
    <header class="navbar navbar-colored">
        <section class="navbar-section">
          <a href="#" class="btn btn-link">Home</a>
          <a href="add_product.php" class="btn btn-link">Add Product</a>
        </section>
        <section class="navbar-center">
          <img src="static/img/logo.png" alt="">
        </section>
        <section class="navbar-section">
          <a href="index.html" class="btn btn-link">logout</a>
        </section>
    </header>

    <div class="columns">
        <div class="column col-10 col-mx-auto">
        <table class="table">
            <thead>
                <tr>
                <th>user name</th>
                <th>total price</th>
                <th>date</th>
		<th>action</th>
                </tr>
            </thead>
            <tbody id="data">
                <tr class="active" v-for="purchase in purchases">
               <td>{{ purchase.fname }}</td>
               <td>{{ purchase.total }}</td>
               <td>{{ purchase.date }}</td> 
		<td><a :href="`api/product/finalize_purchase.php?purchase_id=${purchase.purchase_id}`" class="btn btn-primary" >Complete</a>

                </tr>
            </tbody>
        </table>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/vue"></script>
    <script>
    var app4 = new Vue({
        el: '#data',
        data: {
            purchases : []
        },
        created(){
            fetch("api/product/pending_purchases.php").then(response => response.json())
                                          .then(json => this.purchases = json.purchases);
        }
    })
    </script>
        
    </div>
</body>
</html>
</body>
</html>
