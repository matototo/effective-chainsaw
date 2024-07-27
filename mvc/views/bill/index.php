{{ include('layouts/header.php', {title:'Bills'})}}
    <h1>Automobile Bills</h1>
    <table>
        <thead>
            <tr>
                <th>Bill number</th>
                <th>Car</th>
                <th>Total</th>

            </tr>
        </thead>
        <tbody>
          {% for bill in bills %}
            <tr>
                <td><a href="{{base}}/bill/show?id={{bill.bill_number}}">{{ bill.bill_number }}</td>
                <td>
                    {% if bill.serial_number ==  "1HGBH41JXMN109186" %}
                        <p><a href="{{base}}/automobile/show?serial_number={{ bill.serial_number }}">Toyota Camry</a></p>
                    {% elseif bill.serial_number == "1HGCM82633A123456" %}
                        <p><a href="{{base}}/automobile/show?serial_number={{ bill.serial_number }}">Ford Mustang</a></p>
                    {% elseif bill.serial_number == "2HGFA16508H123456" %}
                        <p><a href="{{base}}/automobile/show?serial_number={{ bill.serial_number }}">Honda Civic</a></p>
                    {% elseif bill.serial_number == "VF1RFA00663412345" %}
                        <p><a href="{{base}}/automobile/show?serial_number={{ bill.serial_number }}">Renault Clio</a></p>
                    {% elseif bill.serial_number == "WBA3A5C50DF123456" %}
                        <p><a href="{{base}}/automobile/show?serial_number={{ bill.serial_number }}">BMW 3 Series</a></p>
                    {% else %}
                        <p>woy</p>
                    {% endif%}
                </td>
                <td>{{ bill.total }}</td>
            </tr>
          {% endfor %}
        </tbody>
    </table>
    <a href="{{base}}/bill/create" class="btn">New Bill</a>
{{ include('layouts/footer.php')}}