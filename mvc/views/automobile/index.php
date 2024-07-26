{{ include('layouts/header.php', {title:'Automobiles'})}}
    <h1>Automobiles</h1>
    <table>
        <thead>
            <tr>
                <th>Serial number</th>
                <th>Name</th>
                <th>Year</th>
                <th>Category</th>
                <th>Drive Train</th>
                <th>Type</th>
                <th>Price</th>
                <th>Description</th>
            </tr>
        </thead>
        <tbody>
          {% for automobile in automobiles %}
            <tr>
                <td>{{ automobile.serial_number }}</a></td>
                <td>{{ automobile.name }}</td>
                <td>{{ automobile.year }}</td>
                <td>{{ automobile.category }}</td>
                <td>{{ automobile.drive_train }}</td>
                <td>{{ automobile.type }}</td>
                <td>{{ automobile.price }}</td>
                <td>{{ automobile.description }}</td>
            </tr>
          {% endfor %}
        </tbody>
    </table>
{{ include('layouts/footer.php')}}