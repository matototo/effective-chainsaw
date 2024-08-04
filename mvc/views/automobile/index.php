{{ include('layouts/header.php', {title:'Automobiles'})}}
    <h1>Automobiles</h1>
    <table>
        <thead>
            <tr>
                <th>Name</th>
                <th>Year</th>
                <th>Category</th>
                <th>Type</th>
                <th>Price</th>
                
            </tr>
        </thead>
        <tbody>
          {% for automobile in automobiles %}
            <tr> 
                <td><a href="{{base}}/automobile/show?serial_number={{automobile.serial_number}}">{{ automobile.name }}</a></td>
                <td>{{ automobile.year }}</td>
                <td>{{ automobile.category }}</td>
                <td>{{ automobile.type }}</td>
                <td class="money">{{ automobile.price }} $</td>
            </tr>
          {% endfor %}
        </tbody>
    </table>
    <a href="{{base}}/client" class="btn">Back</a>
{{ include('layouts/footer.php')}}
