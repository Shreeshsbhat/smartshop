
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
            <div class="card">
       
                <div class="card-header">
                  <div class="card-title h5 text-center">Add Product</div>
                </div>
                <div class="card-body">
                    <form class="form-horizontal" action="http://localhost:5000/smartshop/api/product/create.php" method="post">
                        <div class="form-group my-4">
                            <div class="column col-3 col-sm-12">
                                <label class="form-label text-right" for="input-example-1">Name</label>
                            </div>
                            <div class="column col-9 col-sm-12">
                                <input class="form-input" type="text" id="input-example-1" name="name" placeholder="Name">
                            </div>
                        </div>

                        <div class="form-group my-4">
                            <div class="column col-3 col-sm-12">
                                <label class="form-label text-right" for="input-example-1">Price</label>
                            </div>
                            <div class="column col-9 col-sm-12">
                                <input class="form-input" type="text"  name="price" placeholder="Price">
                            </div>
                        </div>
                        <div class="form-group my-4">
                            <div class="column col-3 col-sm-12">
                                <label class="form-label text-right" >Barcode</label>
                            </div>
                            <div class="column col-9 col-sm-12">
                                <input class="form-input" type="text"  name="barcode" placeholder="barcode">
                            </div>
                        </div>
                        <div class="form-group my-4">
                            <div class="col-3"></div>       
                            <div class="col-9">
                                <button class="btn btn-primary exp-100" type="submit">
                                    ADD PRODUCT
                                </button>
                            </div>
                        </div>
                        </div>
                        <!-- form structure -->
                      </form>
                </div>
        </div>
    </div>

    <div class="columns">
        <div class="column col-10 col-mx-auto">
        <table class="table">
            <thead>
                <tr>
                <th>name</th>
                <th>price</th>
                <th>barcode</th>
                </tr>
            </thead>
            <tbody id="data">
                <tr class="active" v-for="product in products">
               <td>{{ product.name }}</td>
               <td>{{ product.price }}</td>
               <td>{{ product.barcode }}</td>

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
            products : []
        },
        created(){
            fetch("/api/product/read.php").then(response => response.json())
                                          .then(json => this.products = json.products);
        }
    })
    </script>
        
    </div>
</body>
</html>
</body>
</html>