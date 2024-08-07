{{ include('layouts/header.php', {title:'Show Automobile'})}}
    <div class="container">
        <h3>{{ automobile.name }}</h3>
        <div class="show">
            <p><strong>Serial number : </strong>{{ automobile.serial_number }}</p>
            <p><strong>Year : </strong>{{ automobile.year }}</p>
            <p><strong>Category : </strong>{{ automobile.category }}</p>
            <p><strong>Drive Train : </strong>{{ automobile.drive_train }}</p>
            <p><strong>Type : </strong>{{ automobile.type }}</p>
            <p class="money"><strong>Price : </strong>{{ automobile.price }} $</p>
            <p><strong>Description : </strong>{{ automobile.description }}</p>
            <p><strong>Manufacturer : </strong><a href="{{base}}/manufacturer/show?id={{automobile.manufacturer_id}}">{{name}}</a></p>
        </div>
    </div>
{{ include('layouts/footer.php')}}