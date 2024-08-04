{{ include('layouts/header.php', {title:'Show Automobile'})}}
    <div class="container">
        <h3>Automobile</h3>
        <p><strong>Serial number : </strong>{{ automobile.serial_number }}</p>
        <p><strong>Name : </strong>{{ automobile.name }}</p>
        <p><strong>Year : </strong>{{ automobile.year }}</p>
        <p><strong>Category : </strong>{{ automobile.category }}</p>
        <p><strong>Drive Train : </strong>{{ automobile.drive_train }}</p>
        <p><strong>Type : </strong>{{ automobile.type }}</p>
        <p class="money"><strong>Price : </strong>{{ automobile.price }} $</p>
        <p><strong>Description : </strong>{{ automobile.description }}</p>
        {% if automobile.manufacturer_id == 1 %}
            <p><strong>Manufacturer : </strong><a href="{{base}}/manufacturer/show?id=1">Toyota</a></p>
        {% elseif automobile.manufacturer_id == 2 %}
            <p><strong>Manufacturer : </strong><a href="{{base}}/manufacturer/show?id=2">Ford</a></p>
        {% elseif automobile.manufacturer_id == 3 %}
            <p><strong>Manufacturer : </strong><a href="{{base}}/manufacturer/show?id=3">BMW</a></p>
        {% elseif automobile.manufacturer_id == 4 %}
            <p><strong>Manufacturer : </strong><a href="{{base}}/manufacturer/show?id=4">Honda</a></p>
        {% elseif automobile.manufacturer_id == 5 %}
            <p><strong>Manufacturer : </strong><a href="{{base}}/manufacturer/show?id=5">Renault</a></p>
        {% else %}
            <p>woy</p>
        {% endif%}
        <div class="buttons">
            <a href="{{base}}/automobile" class="btn">Back</a>
        </div>
    </div>
{{ include('layouts/footer.php')}}