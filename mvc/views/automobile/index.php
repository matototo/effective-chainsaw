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
                <td>{{ automobile.price }}</td>
            </tr>
          {% endfor %}
        </tbody>
    </table>
{{ include('layouts/footer.php')}}

<!--
<th>Serial number</th>
<td>{{ automobile.serial_number }}</td>
<th>Drive Train</th>
<td>{{ automobile.drive_train }}</td>
<th>Description</th>
<td>{{ automobile.description }}</td>
-->